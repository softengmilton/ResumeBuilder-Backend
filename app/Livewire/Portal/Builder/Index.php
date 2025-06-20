<?php

namespace App\Livewire\Portal\Builder;

use Livewire\Component;
use App\Models\Resume;
use App\Models\Template;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use OpenAI\Laravel\Facades\OpenAI;

class Index extends Component
{
    use WithFileUploads;
    public $rules = [];
    public $currentStep = 1;
    public $toggleModal = false;

    public $template = null;

    public $resume = null;
    public $isEditing   = false;


    public function mount($template = null, $resume = null)
    {
        if ($resume) {
            // dd($resume);
            $this->resume = Resume::where('uuid', $resume)
                ->where('user_id', auth()->id())
                ->firstOrFail();
            // dd($this->resume);
            $this->isEditing = true;
            $this->loadData($this->resume);
        } else {
            $this->slug = Str::slug($this->title);
            $this->template = Template::where('uuid', $template)->firstOrFail();
        }
    }

    public function loadData($resume)
    {
        $this->template = Template::where('id', $resume->template_id)->firstOrFail();
        $this->title = $resume->title;
        $this->slug = $resume->slug;
        $this->personal_info = $resume->personal_info ?? [];
        $this->experiences = $resume->experiences ?? [];

        $this->educations = $resume->educations ?? [];
        $this->skills = $resume->skills ?? [];
        $this->projects = $resume->projects ?? [];
        $this->languages = $resume->languages ?? [];
        $this->certifications = $resume->certifications ?? [];
        $this->is_public = $resume->is_public;
    }


    public function toggleModal()
    {
        // dd('hi');
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
        'photo' => null,
        'occupation' => '',
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

    public $isGeneratingSummary = false;

    // ... existing methods ...

    public function generateSummary()
    {
        $this->isGeneratingSummary = true;

        try {
            // Occupation fallback: try personal_info, then first job title, else generic
            $occupation = $this->personal_info['occupation'] ?? null;

            if (!$occupation && !empty($this->experiences)) {
                $occupation = $this->experiences[0]['job_title'] ?? null;
            }

            if (!$occupation) {
                $occupation = 'professional';
            }

            // Start building the prompt
            $prompt = "Generate a professional resume summary for a {$occupation} based on the following information:\n\n";

            if (!empty($this->skills)) {
                $skillsList = implode(', ', array_column($this->skills, 'name'));
                $prompt .= "Key Skills: {$skillsList}\n";
            }

            if (!empty($this->experiences)) {
                $prompt .= "Professional Experience Highlights:\n";
                foreach ($this->experiences as $exp) {
                    $jobTitle = $exp['job_title'] ?? 'Role';
                    $employer = $exp['employer'] ?? 'Employer';
                    $description = $exp['description'] ?? '';
                    $prompt .= "- As {$jobTitle} at {$employer}: {$description}\n";
                }
            }

            if (!empty($this->educations)) {
                $prompt .= "Education Background:\n";
                foreach ($this->educations as $edu) {
                    $degree = $edu['degree'] ?? '';
                    $field = $edu['field_of_study'] ?? '';
                    $institution = $edu['institution'] ?? '';
                    $prompt .= "- {$degree} in {$field} from {$institution}\n";
                }
            }

            $prompt .= "\nWrite a compelling 3-4 sentence professional summary specifically tailored for a {$occupation}. ";
            $prompt .= "Highlight relevant skills, experience, and achievements. ";
            $prompt .= "Use industry-specific terminology and active voice. ";
            $prompt .= "Make it sound professional but not overly formal.";

            // Call OpenAI chat completion API
            $response = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
                'temperature' => 0.7,  // add some creativity if you want
            ]);

            // Assign the summary from API response
            $this->personal_info['summary'] = trim($response->choices[0]->message->content);
        } catch (\Exception $e) {
            $this->addError('summary', 'Failed to generate summary. Please try again or write your own.');
            // Fallback summary with some safety checks
            $skillsSample = implode(', ', array_slice(array_column($this->skills ?? [], 'name'), 0, 3));
            $this->personal_info['summary'] = "Experienced {$occupation} with a proven track record in the field. " .
                (!empty($skillsSample) ? "Skilled in {$skillsSample}. " : "") .
                "Committed to delivering high-quality results and continuous professional development.";
        } finally {
            $this->isGeneratingSummary = false;
        }
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
            'title' => 'required|string|max:255|unique:resumes,title,' . ($this->isEditing ? $this->resume->id : 'NULL') . ',id',
            'slug' => 'required|string|max:255|unique:resumes,slug,' . ($this->isEditing ? $this->resume->id : 'NULL') . ',id',
        ]);

        // Handle photo upload if exists
        if (is_object($this->personal_info['photo'])) {
            $photoPath = $this->personal_info['photo']->store('resume-photos', 'public');
            $this->personal_info['photo'] = $photoPath;
        }

        $data = [
            'user_id' => auth()->id(),
            'template_id' => $this->template->id,
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
        ];

        if ($this->isEditing) {
            // Update existing resume
            $this->resume->update($data);
            session()->flash('message', 'Resume updated successfully!');
        } else {
            // Create new resume
            $data['uuid'] = Str::uuid();
            $this->resume = Resume::create($data);
            session()->flash('message', 'Resume created successfully!');
            $this->isEditing = true;
        }

        $this->toggleModal = true;
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
                $rules['title'] = 'required|string|max:255|unique:resumes,title,' . ($this->isEditing ? $this->resume->id : '');
                $rules['slug'] = 'required|string|unique:resumes,slug,' . ($this->isEditing ? $this->resume->id : '');
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
