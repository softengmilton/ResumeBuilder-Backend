<?php

namespace App\Livewire\Portal\Resume;

use App\Models\Template;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $templates = Template::all();

        return view('livewire.portal.resume.index', compact('templates'));
    }
}
