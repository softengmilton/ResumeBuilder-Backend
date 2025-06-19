<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request, $pricing)
    {
        $user = $request->user();
        $pricing = \App\Models\Pricing::where('name', $pricing)->firstOrFail();

        $planPrice = $pricing->stripe_price_id;

        return $request->user()
            ->newSubscription('default', $planPrice)
            ->allowPromotionCodes()
            ->checkout([
                'success_url' => route('payment.success'),
                'cancel_url' => route('payment.cancel'),
            ]);
    }

    public function success(Request $request)
    {
        return view('payment.success');
    }
    public function cancel(Request $request)
    {
        return view('payment.failed');
    }
}
