<?php

namespace App\Livewire\Portal\Partial;

use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $setting = \App\Models\Setting::all()->pluck('value', 'key')->toArray();
        return view('livewire.portal.partial.footer', compact('setting'));
    }
}
