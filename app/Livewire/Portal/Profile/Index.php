<?php

namespace App\Livewire\Portal\Profile;

use App\Models\Resume;
use Livewire\Component;

class Index extends Component
{

    public function newClick()
    {
       dd('hi');
    }
    
    public function deleteResume()
    {
        dd('hi');
        try {
            $resume = Resume::find($id);
            $resume->delete();
           session()->flash('message', 'Resume deleted successfully!');
        } catch (\Throwable $th) {
            session()->flash('error', 'Something went wrong!'); 
        }

    }
    public function render()
    {
        $resumes = Resume::where('user_id', auth()->id())->with('user', 'template')->get();
        $user = auth()->user();  
        return view('livewire.portal.profile.index', compact('resumes','user'));
    }


   


}
