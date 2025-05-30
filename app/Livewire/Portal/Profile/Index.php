<?php

namespace App\Livewire\Portal\Profile;

use App\Models\Resume;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $resumes = Resume::where('user_id', auth()->id())->with('user', 'template')->get();

        return view('livewire.portal.profile.index', compact('resumes'));
    }
}
