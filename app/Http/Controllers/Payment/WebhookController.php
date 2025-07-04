<?php

namespace App\Http\Controllers\Payment;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Events\WebhookHandled;
use Laravel\Cashier\Events\WebhookReceived;
use Laravel\Cashier\Http\Middleware\VerifyWebhookSignature;
use Laravel\Cashier\Payment;
use Laravel\Cashier\Subscription;
use Stripe\Stripe;
use Stripe\Subscription as StripeSubscription;
use Symfony\Component\HttpFoundation\Response;

class WebhookController extends Controller
{
    /**
     * Create a new WebhookController instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (config('cashier.webhook.secret')) {
            $this->middleware(VerifyWebhookSignature::class);
        }
        // Add this line to set Stripe API key
        // Stripe::setApiKey(config('cashier.secret'));
    }

    /**
     * Handle a Stripe webhook call.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleWebhook(Request $request)
    {
        $payload = json_decode($request->getContent(), true);
        $method = 'handle' . Str::studly(str_replace('.', '_', $payload['type']));
        Log::info('Stripe Webhook:', ['type' => $payload['type'], 'payload' => $payload]);

        WebhookReceived::dispatch($payload);

        if (method_exists($this, $method)) {
            $this->setMaxNetworkRetries();

            $response = $this->{$method}($payload);

            WebhookHandled::dispatch($payload);

            return $response;
        }
        // Add these additional event handlers
        switch ($payload['type']) {
            case 'invoice.payment_succeeded':
                return $this->handleInvoicePaymentSucceeded($payload);
            case 'invoice.paid': // Add this to handle both event types
                return $this->handleInvoicePaymentSucceeded($payload);
            case 'payment_intent.succeeded':
                return $this->handlePaymentIntentSucceeded($payload);
            case 'charge.succeeded':
                return $this->handleChargeSucceeded($payload);
            case 'invoice.payment_failed':
                return $this->handleInvoicePaymentFailed($payload);
        }

        return $this->missingMethod($payload);
    }

    /**
     * Handle customer subscription created.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleCustomerSubscriptionCreated(array $payload)
    {
        $user = $this->getUserByStripeId($payload['data']['object']['customer']);

        if ($user) {
            $data = $payload['data']['object'];

            if (! $user->subscriptions->contains('stripe_id', $data['id'])) {
                if (isset($data['trial_end'])) {
                    $trialEndsAt = Carbon::createFromTimestamp($data['trial_end']);
                } else {
                    $trialEndsAt = null;
                }

                $firstItem = $data['items']['data'][0];
                $isSinglePrice = count($data['items']['data']) === 1;

                $subscription = $user->subscriptions()->create([
                    'type' => $data['metadata']['type'] ?? $data['metadata']['name'] ?? $this->newSubscriptionType($payload),
                    'stripe_id' => $data['id'],
                    'stripe_status' => $data['status'],
                    'stripe_price' => $isSinglePrice ? $firstItem['price']['id'] : null,
                    'quantity' => $isSinglePrice && isset($firstItem['quantity']) ? $firstItem['quantity'] : null,
                    'trial_ends_at' => $trialEndsAt,
                    'ends_at' => null,
                ]);

                foreach ($data['items']['data'] as $item) {
                    $subscription->items()->create([
                        'stripe_id' => $item['id'],
                        'stripe_product' => $item['price']['product'],
                        'stripe_price' => $item['price']['id'],
                        'quantity' => $item['quantity'] ?? null,
                    ]);
                }
            }

            // Terminate the billable's generic trial if it exists...
            if (! is_null($user->trial_ends_at)) {
                $user->trial_ends_at = null;
                $user->save();
            }
        }

        return $this->successMethod();
    }

    /**
     * Determines the type that should be used when new subscriptions are created from the Stripe dashboard.
     *
     * @param  array  $payload
     * @return string
     */
    protected function newSubscriptionType(array $payload)
    {
        return 'default';
    }

    /**
     * Handle customer subscription updated.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleCustomerSubscriptionUpdated(array $payload)
    {
        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {
            $data = $payload['data']['object'];

            $subscription = $user->subscriptions()->firstOrNew(['stripe_id' => $data['id']]);

            if (
                isset($data['status']) &&
                $data['status'] === StripeSubscription::STATUS_INCOMPLETE_EXPIRED
            ) {
                $subscription->items()->delete();
                $subscription->delete();

                return;
            }

            $subscription->type = $subscription->type ?? $data['metadata']['type'] ?? $data['metadata']['name'] ?? $this->newSubscriptionType($payload);

            $firstItem = $data['items']['data'][0];
            $isSinglePrice = count($data['items']['data']) === 1;

            // Price...
            $subscription->stripe_price = $isSinglePrice ? $firstItem['price']['id'] : null;

            // Quantity...
            $subscription->quantity = $isSinglePrice && isset($firstItem['quantity']) ? $firstItem['quantity'] : null;

            // Trial ending date...
            if (isset($data['trial_end'])) {
                $trialEnd = Carbon::createFromTimestamp($data['trial_end']);

                if (! $subscription->trial_ends_at || $subscription->trial_ends_at->ne($trialEnd)) {
                    $subscription->trial_ends_at = $trialEnd;
                }
            }

            // Cancellation date...
            if ($data['cancel_at_period_end'] ?? false) {
                $subscription->ends_at = $subscription->onTrial()
                    ? $subscription->trial_ends_at
                    : Carbon::createFromTimestamp($data['current_period_end']);
            } elseif (isset($data['cancel_at']) || isset($data['canceled_at'])) {
                $subscription->ends_at = Carbon::createFromTimestamp($data['cancel_at'] ?? $data['canceled_at']);
            } else {
                $subscription->ends_at = null;
            }

            // Status...
            if (isset($data['status'])) {
                $subscription->stripe_status = $data['status'];
            }

            $subscription->save();

            // Update subscription items...
            if (isset($data['items'])) {
                $subscriptionItemIds = [];

                foreach ($data['items']['data'] as $item) {
                    $subscriptionItemIds[] = $item['id'];

                    $subscription->items()->updateOrCreate([
                        'stripe_id' => $item['id'],
                    ], [
                        'stripe_product' => $item['price']['product'],
                        'stripe_price' => $item['price']['id'],
                        'quantity' => $item['quantity'] ?? null,
                    ]);
                }

                // Delete items that aren't attached to the subscription anymore...
                $subscription->items()->whereNotIn('stripe_id', $subscriptionItemIds)->delete();
            }
        }

        return $this->successMethod();
    }

    /**
     * Handle the cancellation of a customer subscription.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleCustomerSubscriptionDeleted(array $payload)
    {
        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {
            $user->subscriptions->filter(function ($subscription) use ($payload) {
                return $subscription->stripe_id === $payload['data']['object']['id'];
            })->each(function ($subscription) {
                $subscription->skipTrial()->markAsCanceled();
            });
        }

        return $this->successMethod();
    }

    /**
     * Handle customer updated.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleCustomerUpdated(array $payload)
    {
        if ($user = $this->getUserByStripeId($payload['data']['object']['id'])) {
            $user->updateDefaultPaymentMethodFromStripe();
        }

        return $this->successMethod();
    }

    /**
     * Handle deleted customer.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleCustomerDeleted(array $payload)
    {
        if ($user = $this->getUserByStripeId($payload['data']['object']['id'])) {
            $user->subscriptions->each(function (Subscription $subscription) {
                $subscription->skipTrial()->markAsCanceled();
            });

            $user->forceFill([
                'stripe_id' => null,
                'trial_ends_at' => null,
                'pm_type' => null,
                'pm_last_four' => null,
            ])->save();
        }

        return $this->successMethod();
    }

    /**
     * Handle payment method automatically updated by vendor.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handlePaymentMethodAutomaticallyUpdated(array $payload)
    {
        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {
            $user->updateDefaultPaymentMethodFromStripe();
        }

        return $this->successMethod();
    }

    /**
     * Handle payment action required for invoice.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleInvoicePaymentActionRequired(array $payload)
    {
        if (is_null($notification = config('cashier.payment_notification'))) {
            return $this->successMethod();
        }

        if ($payload['data']['object']['metadata']['is_on_session_checkout'] ?? false) {
            return $this->successMethod();
        }

        if ($payload['data']['object']['subscription_details']['metadata']['is_on_session_checkout'] ?? false) {
            return $this->successMethod();
        }

        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {
            if (in_array(Notifiable::class, class_uses_recursive($user))) {
                $payment = new Payment($user->stripe()->paymentIntents->retrieve(
                    $payload['data']['object']['payment_intent']
                ));

                $user->notify(new $notification($payment));
            }
        }

        return $this->successMethod();
    }

    /**
     * Get the customer instance by Stripe ID.
     *
     * @param  string|null  $stripeId
     * @return \Laravel\Cashier\Billable|null
     */
    protected function getUserByStripeId($stripeId)
    {
        return Cashier::findBillable($stripeId);
    }

    /**
     * Handle successful calls on the controller.
     *
     * @param  array  $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function successMethod($parameters = [])
    {
        return new Response('Webhook Handled', 200);
    }

    /**
     * Handle calls to missing methods on the controller.
     *
     * @param  array  $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function missingMethod($parameters = [])
    {
        return new Response;
    }

    /**
     * Set the number of automatic retries due to an object lock timeout from Stripe.
     *
     * @param  int  $retries
     * @return void
     */
    protected function setMaxNetworkRetries($retries = 3)
    {
        Stripe::setMaxNetworkRetries($retries);
    }







    //
    // Add this method to handle successful payments
    /**
     * Handle successful invoice payments (for subscriptions)
     */
    protected function handleInvoicePaymentSucceeded(array $payload)
    {
        try {
            $invoice = $payload['data']['object'] ?? [];

            if (!isset($invoice['customer'])) {
                Log::warning('Invoice payment succeeded but no customer found', ['invoice' => $invoice]);
                return $this->successMethod();
            }

            $user = $this->getUserByStripeId($invoice['customer']);

            if (!$user) {
                Log::warning('User not found for customer', ['customer' => $invoice['customer']]);
                return $this->successMethod();
            }

            // Get subscription if this is a subscription payment
            $subscription = null;
            if (isset($invoice['subscription'])) {
                $subscription = Subscription::where('stripe_id', $invoice['subscription'])->first();
            }

            // Create transaction record
            $transactionData = [
                'stripe_id' => $invoice['payment_intent'] ?? $invoice['charge'] ?? Str::uuid(),
                'user_id' => $user->id,
                'subscription_id' => $subscription->id ?? null,
                'type' => 'subscription',
                'amount' => $invoice['amount_paid'] ?? $invoice['amount_due'] ?? 0,
                'currency' => $invoice['currency'] ?? 'usd',
                'status' => 'succeeded',
                'payment_method' => $invoice['payment_method'] ?? null,
                'description' => $invoice['description'] ?? 'Subscription payment',
                'receipt_url' => $invoice['hosted_invoice_url'] ?? null,
                'invoice_id' => $invoice['id'] ?? null,
                'metadata' => $invoice['metadata'] ?? null,
            ];

            $transaction = Transaction::create($transactionData);
            Log::info('Transaction created from invoice payment:', $transaction->toArray());

            return $this->successMethod();
        } catch (\Exception $e) {
            Log::error('Failed to handle invoice payment succeeded:', [
                'error' => $e->getMessage(),
                'payload' => $payload
            ]);
            return $this->successMethod(); // Still return 200 to prevent retries
        }
    }

    protected function handleChargeSucceeded(array $payload)
    {
        try {
            $charge = $payload['data']['object'] ?? [];

            if (!isset($charge['customer'])) {
                Log::warning('Charge succeeded but no customer found', ['charge' => $charge]);
                return $this->successMethod();
            }

            $user = $this->getUserByStripeId($charge['customer']);

            if (!$user) {
                Log::warning('User not found for customer', ['customer' => $charge['customer']]);
                return $this->successMethod();
            }

            // Check if this is a subscription payment
            $subscription = null;
            if (isset($charge['invoice'])) {
                try {
                    $invoice = \Stripe\Invoice::retrieve($charge['invoice']);
                    if (isset($invoice['subscription'])) {
                        $subscription = Subscription::where('stripe_id', $invoice['subscription'])->first();
                    }
                } catch (\Exception $e) {
                    Log::error('Failed to retrieve invoice:', ['error' => $e->getMessage()]);
                }
            }

            $transactionData = [
                'stripe_id' => $charge['id'] ?? Str::uuid(),
                'user_id' => $user->id,
                'subscription_id' => $subscription->id ?? null,
                'type' => isset($charge['invoice']) ? 'subscription' : 'charge',
                'amount' => $charge['amount'] ?? 0,
                'currency' => $charge['currency'] ?? 'usd',
                'status' => $charge['status'] ?? 'succeeded',
                'payment_method' => $charge['payment_method'] ?? $charge['source']['id'] ?? null,
                'description' => $charge['description'] ?? null,
                'receipt_url' => $charge['receipt_url'] ?? null,
                'invoice_id' => $charge['invoice'] ?? null,
                'metadata' => $charge['metadata'] ?? null,
            ];

            $transaction = Transaction::create($transactionData);
            Log::info('Transaction created from charge:', $transaction->toArray());

            return $this->successMethod();
        } catch (\Exception $e) {
            Log::error('Failed to handle charge succeeded:', [
                'error' => $e->getMessage(),
                'payload' => $payload
            ]);
            return $this->successMethod();
        }
    }
}
