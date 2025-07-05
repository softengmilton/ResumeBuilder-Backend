<?php

namespace App\Livewire\Portal\Partial;

use Livewire\Component;

class Header extends Component
{


    public function render()
    {
        $setting = \App\Models\Setting::all()->pluck('value', 'key')->toArray();
        // dd($setting);
        return view(
            'livewire.portal.partial.header',
            compact('setting')
        );
    }
}
