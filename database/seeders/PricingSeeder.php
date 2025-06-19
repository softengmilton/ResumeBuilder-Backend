<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $pricings = [
            [
                'name' => 'Basic',
                'slug' => 'basic',
                'price' => '20',
                'plan_duration' => 'Monthly',
                'stripe_plan_id' => 'prod_SWj5HQ0eilfPwn',
                'stripe_price_id' => 'price_1RbfdRRtF6dA8BwN925c3bdG',
            ],
            [
                'name' => 'Pro',
                'slug' => 'pro',
                'price' => '59',
                'plan_duration' => '6 Months',
                'stripe_plan_id' => 'prod_SWj6ZSYVW7kR0h',
                'stripe_price_id' => 'price_1RbfeTRtF6dA8BwNRvWkFgFo',
            ],
            [
                'name' => 'Enterprise',
                'slug' => 'enterprise',
                'price' => '99',
                'plan_duration' => 'Yearly',
                'stripe_plan_id' => 'prod_SWj8SmFFD2kvkk',
                'stripe_price_id' => 'price_1RbffrRtF6dA8BwNwnh2Yx0o',
            ]
        ];

        foreach ($pricings as $pricing) {
            \App\Models\Pricing::create($pricing);
        }
    }
}
