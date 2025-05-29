<?php

namespace App\View\Components\Templates;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

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

    /**
     * Create a new component instance.
     */
    public function __construct(
        $personalInfo = [],
        $experiences = [],
        $educations = [],
        $skills = [],
        $projects = [],
        $languages = [],
        $certifications = [],
        $currentStep = null
    ) {
        $this->personal_info = $personalInfo;
        $this->experiences = $experiences;
        $this->educations = $educations;
        $this->skills = $skills;
        $this->projects = $projects;
        $this->languages = $languages;
        $this->certifications = $certifications;
        $this->currentStep = $currentStep;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.templates.template1', [
            'personal_info' => $this->personal_info,
            'experiences' => $this->experiences,
            'educations' => $this->educations,
            'skills' => $this->skills,
            'projects' => $this->projects,
            'languages' => $this->languages,
            'certifications' => $this->certifications,
            'currentStep' => $this->currentStep,
        ]);
    }
}
