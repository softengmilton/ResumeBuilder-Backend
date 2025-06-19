<?php

namespace App\Livewire\Portal\Profile;

use App\Models\Pricing;
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
        $plan = auth()->user()->subscription()->stripe_price ?? null;
        // dd($plan);
        $activePlan = Pricing::where('stripe_price_id', $plan)->first();


        $resumes = Resume::where('user_id', auth()->id())->with('user', 'template')->get();
        // dd($activePlan);
        $user = auth()->user();
        return view('livewire.portal.profile.index', compact('resumes', 'user', 'activePlan'));
    }
}
