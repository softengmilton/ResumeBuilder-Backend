<?php

namespace App\Livewire\Portal\Templates;

use Livewire\Component;

class Template1 extends Component
{
    public $personal_info;
    public $experiences;
    public $educations;
    public $skills;
    public $projects;
    public $languages;
    public $certifications;

    // currentStep
    public $currentStep = null;

    public function mount(
        $personal_info = [],
        $experiences = [],
        $educations = [],
        $skills = [],
        $projects = [],
        $languages = [],
        $certifications = []
    ) {

        $this->personal_info = $personal_info;
        $this->experiences = $experiences;
        $this->educations = $educations;
        $this->skills = $skills;
        $this->projects = $projects;
        $this->languages = $languages;
        $this->certifications = $certifications;
    }
    public function render()
    {
        return view('livewire.portal.templates.template1');
    }
}
