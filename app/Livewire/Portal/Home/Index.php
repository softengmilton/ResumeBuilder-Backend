<?php

namespace App\Livewire\Portal\Home;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $setting = \App\Models\Setting::all()->pluck('value', 'key')->toArray();
        return view('livewire.portal.home.index', compact('setting'));
    }
}
