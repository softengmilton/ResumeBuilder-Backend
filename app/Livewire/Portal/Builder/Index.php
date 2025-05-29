<?php

namespace App\Livewire\Portal\Builder;

use Livewire\Component;
use App\Models\Resume;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $rules = [];
    public $currentStep = 1;
    public $toggleModal = false;


    public function toggleModal()
    {
        dd('hi');
        $this->toggleModal = !$this->toggleModal;
    }

    public function toggleClose()
    {
        $this->toggleModal = false;
    }

    public $steps = [
        1 => 'Personal Info',
        2 => 'Experience',
        3 => 'Education',
        4 => 'Skills',
        5 => 'Projects',
        6 => 'Languages',
        7 => 'Certifications',
        8 => 'Confirmation'
    ];

    // Personal Info
    public $personal_info = [
        'name' => '',
        'email' => '',
        'phone' => '',
        'address' => '',
        'linkedin' => '',
        'github' => '',
        'website' => '',
        'summary' => '',
        'photo' => null
    ];

    // Experience (array of experiences)
    public $experiences = [
        ['job_title' => '', 'employer' => '', 'start_date' => '', 'end_date' => '', 'description' => '']
    ];

    // Education (array of education entries)
    public $educations = [
        ['degree' => '', 'institution' => '', 'field_of_study' => '', 'start_date' => '', 'end_date' => '']
    ];

    // Skills (array of skills)
    public $skills = [
        ['name' => '', 'level' => '']
    ];

    // Projects (array of projects)
    public $projects = [
        ['name' => '', 'description' => '', 'link' => '']
    ];

    // Languages (array of languages)
    public $languages = [
        ['name' => '', 'proficiency' => '']
    ];

    // Certifications (array of certifications)
    public $certifications = [
        ['name' => '', 'issuer' => '', 'date_issued' => '']
    ];

    // Resume metadata
    public $title = 'My Resume';
    public $slug = '';
    public $is_public = false;
    public $template_id = null;
    public $resumeCompleteness = 0;

    public function goToStep($step)
    {
        // $this->currentStep = $step;
        // $this->resumeCompleteness = round(($step - 1) / (count($this->steps) - 1) * 100);
    }
    public function mount()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function nextStep()
    {
        $this->validateCurrentStep();

        $this->currentStep++;
        $this->resumeCompleteness = round((($this->currentStep - 1) / (count($this->steps) - 1)) * 100);
    }

    public function prevStep()
    {
        $this->currentStep--;
        $this->resumeCompleteness = round((($this->currentStep - 1) / (count($this->steps) - 1)) * 100);
    }

    public function addExperience()
    {
        $this->experiences[] = ['job_title' => '', 'employer' => '', 'start_date' => '', 'end_date' => '', 'description' => ''];
    }

    public function removeExperience($index)
    {
        unset($this->experiences[$index]);
        $this->experiences = array_values($this->experiences);
    }

    public function addEducation()
    {
        $this->educations[] = array_merge($this->educations, ['degree' => '', 'institution' => '', 'field_of_study' => '', 'start_date' => '', 'end_date' => '']);
    }


    public function removeEducation($index)
    {
        unset($this->educations[$index]);
        $this->educations = array_values($this->educations);
    }

    public function addSkill()
    {
        $this->skills[] = ['name' => '', 'level' => ''];
    }

    public function removeSkill($index)
    {
        unset($this->skills[$index]);
        $this->skills = array_values($this->skills);
    }

    public function addProject()
    {
        $this->projects[] = ['name' => '', 'description' => '', 'link' => ''];
    }

    public function removeProject($index)
    {
        unset($this->projects[$index]);
        $this->projects = array_values($this->projects);
    }

    public function addLanguage()
    {
        $this->languages[] = ['name' => '', 'proficiency' => ''];
    }

    public function removeLanguage($index)
    {
        unset($this->languages[$index]);
        $this->languages = array_values($this->languages);
    }

    public function addCertification()
    {
        $this->certifications[] = ['name' => '', 'issuer' => '', 'date_issued' => ''];
    }

    public function removeCertification($index)
    {
        unset($this->certifications[$index]);
        $this->certifications = array_values($this->certifications);
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:255|unique:resumes,title',
            'slug' => 'required|string|max:255|unique:resumes,slug',
        ]);

        // Handle photo upload if exists
        $photoPath = null;
        if ($this->personal_info['photo']) {
            $photoPath = $this->personal_info['photo']->store('resume-photos', 'public');
            $this->personal_info['photo'] = $photoPath;
        }

        // Create the resume
        $resume = Resume::create([
            'user_id' => 1,
            'template_id' => $this->template_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'is_public' => $this->is_public,
            'personal_info' => $this->personal_info,
            'experiences' => $this->experiences,
            'educations' => $this->educations,
            'skills' => $this->skills,
            'projects' => $this->projects,
            'languages' => $this->languages,
            'certifications' => $this->certifications,
        ]);
        // dd('hi');

        $this->toggleModal = true;
        // Redirect or show success message
        session()->flash('message', 'Resume created successfully!');
    }

    protected function validateCurrentStep()
    {
        $rules = [];

        switch ($this->currentStep) {
            case 1:
                $rules = [
                    'personal_info.name' => 'required|string|max:255',
                    'personal_info.email' => 'required|email',
                    'personal_info.phone' => 'nullable|string',
                    'personal_info.summary' => 'required|string',
                ];
                break;
            case 2:
                foreach ($this->experiences as $index => $experience) {
                    $rules["experiences.$index.job_title"] = 'required|string';
                    $rules["experiences.$index.employer"] = 'required|string';
                    $rules["experiences.$index.start_date"] = 'required|date';
                }
                break;
            case 3:
                foreach ($this->educations as $index => $education) {
                    $rules["educations.$index.degree"] = 'required|string';
                    $rules["educations.$index.institution"] = 'required|string';
                    $rules["educations.$index.start_date"] = 'required|date';
                }
                break;
            case 4:
                foreach ($this->skills as $index => $skill) {
                    $rules["skills.$index.name"] = 'required|string';
                    $rules["skills.$index.level"] = 'required|string';
                }
                break;
            case 5:
                foreach ($this->projects as $index => $project) {
                    $rules["projects.$index.name"] = 'required|string';
                    $rules["projects.$index.description"] = 'required|string';
                    $rules["projects.$index.link"] = 'required|string';
                }
                break;
            case
            6:
                foreach ($this->languages as $index => $language) {
                    $rules["languages.$index.name"] = 'required|string';
                    $rules["languages.$index.proficiency"] = 'required|string';
                }
                break;
            case 7:
                foreach ($this->certifications as $index => $certification) {
                    $rules["certifications.$index.name"] = 'required|string';
                    $rules["certifications.$index.issuer"] = 'required|string';
                    $rules["certifications.$index.date_issued"] = 'required|date';
                }
                break;
            case 8:
                $rules['title'] = 'required|string|max:255';
                $rules['slug'] = 'required|string|unique:resumes,slug';
                break;
                break;
            default:
                // Handle other steps if needed
                break;

                // Add validation for other steps if needed
        }

        $this->validate($rules);
    }
    public function newClick()
    {
        $this->toggleModal = !$this->toggleModal;
    }

    public function render()
    {
        return view('livewire.portal.builder.index');
    }
}
