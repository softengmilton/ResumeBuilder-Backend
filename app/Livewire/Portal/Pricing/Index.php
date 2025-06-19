<?php

namespace App\Livewire\Portal\Pricing;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $pricings = \App\Models\Pricing::all();
        return view('livewire.portal.pricing.index', compact('pricings'));
    }
}
