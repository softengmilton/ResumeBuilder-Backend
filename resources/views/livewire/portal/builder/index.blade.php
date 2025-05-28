<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-green-600 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z"
                        clip-rule="evenodd"></path>
                </svg>
                Enhancv
            </a>
            <div class="flex items-center space-x-3">
                <button
                    class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors text-sm font-medium">
                    <svg class="w-4 h-4 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                        </path>
                    </svg>
                    Save & Exit
                </button>
                <button
                    class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors text-sm font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download PDF
                </button>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <div class="flex">
            <!-- Left Side - Stepper Form -->
            <div class="lg:w-1/2 bg-white p-8 rounded-xl shadow-lg border border-gray-200">
                <!-- Stepper Header -->
                <div class="mb-12">
                    <ol class="flex items-center w-full">
                        @foreach ($steps as $stepNumber => $stepName)
                            <li class="flex-1 mb-3">
                                <div
                                    class="flex items-center font-medium px-3 py-3 w-full rounded-md {{ $currentStep >= $stepNumber ? 'bg-indigo-50' : 'bg-gray-100' }}">
                                    <span
                                        class="w-6 h-6 {{ $currentStep >= $stepNumber ? 'bg-indigo-600 text-white' : 'bg-gray-300 text-gray-600' }} rounded-full flex justify-center items-center mr-2 text-xs lg:w-8 lg:h-8">
                                        {{ str_pad($stepNumber, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                    <h4
                                        class="text-sm {{ $currentStep >= $stepNumber ? 'text-indigo-600' : 'text-gray-500' }}">
                                        {{ $stepName }}
                                    </h4>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>

                <!-- Step Content -->
                <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm transition-all duration-300">
                    @if ($currentStep == 1)
                        <div class="space-y-6">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-2xl font-semibold text-gray-800">Personal Information</h2>
                                <span class="text-sm text-gray-500">Step 1 of {{ count($steps) }}</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full
                                        Name</label>
                                    <input type="text" wire:model="personal_info.name" id="name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                    @error('personal_info.name')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" wire:model="personal_info.email" id="email"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                    @error('personal_info.email')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label for="phone"
                                        class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                    <input type="tel" wire:model="personal_info.phone" id="phone"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <!-- Address -->
                                <div>
                                    <label for="address"
                                        class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                    <input type="text" wire:model="personal_info.address" id="address"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <!-- LinkedIn -->
                                <div>
                                    <label for="linkedin"
                                        class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
                                    <input type="url" wire:model="personal_info.linkedin" id="linkedin"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <!-- GitHub -->
                                <div>
                                    <label for="github"
                                        class="block text-sm font-medium text-gray-700 mb-1">GitHub</label>
                                    <input type="url" wire:model="personal_info.github" id="github"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <!-- Website -->
                                <div>
                                    <label for="website"
                                        class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                                    <input type="url" wire:model="personal_info.website" id="website"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <!-- Photo Upload -->
                                <div class="md:col-span-2">
                                    <label for="photo"
                                        class="block text-sm font-medium text-gray-700 mb-1">Photo</label>
                                    <input type="file" wire:model="personal_info.photo" id="photo"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                    @error('personal_info.photo')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Summary -->
                                <div class="md:col-span-2">
                                    <label for="summary"
                                        class="block text-sm font-medium text-gray-700 mb-1">Professional
                                        Summary</label>
                                    <textarea wire:model="personal_info.summary" id="summary" rows="4"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                    @error('personal_info.summary')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @elseif($currentStep == 2)
                        <div class="space-y-8">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-2xl font-semibold text-gray-800">Work Experience</h2>
                                <span class="text-sm text-gray-500">Step 2 of {{ count($steps) }}</span>
                            </div>

                            @foreach ($experiences as $index => $experience)
                                <div class="border border-gray-200 rounded-lg p-6 mb-6"
                                    wire:key="experience-{{ $index }}">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-medium text-gray-800">Experience #{{ $index + 1 }}
                                        </h3>
                                        @if ($index > 0)
                                            <button type="button" wire:click="removeExperience({{ $index }})"
                                                class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Remove
                                            </button>
                                        @endif
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Job Title -->
                                        <div>
                                            <label for="experiences-{{ $index }}-job_title"
                                                class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                                            <input type="text"
                                                wire:model="experiences.{{ $index }}.job_title"
                                                id="experiences-{{ $index }}-job_title"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                            @error("experiences.$index.job_title")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Employer -->
                                        <div>
                                            <label for="experiences-{{ $index }}-employer"
                                                class="block text-sm font-medium text-gray-700 mb-1">Employer</label>
                                            <input type="text"
                                                wire:model="experiences.{{ $index }}.employer"
                                                id="experiences-{{ $index }}-employer"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                            @error("experiences.$index.employer")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Start Date -->
                                        <div>
                                            <label for="experiences-{{ $index }}-start_date"
                                                class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                                            <input type="date"
                                                wire:model="experiences.{{ $index }}.start_date"
                                                id="experiences-{{ $index }}-start_date"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                            @error("experiences.$index.start_date")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- End Date -->
                                        <div>
                                            <label for="experiences-{{ $index }}-end_date"
                                                class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                                            <input type="date"
                                                wire:model="experiences.{{ $index }}.end_date"
                                                id="experiences-{{ $index }}-end_date"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>

                                        <!-- Description -->
                                        <div class="md:col-span-2">
                                            <label for="experiences-{{ $index }}-description"
                                                class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                            <textarea wire:model="experiences.{{ $index }}.description" id="experiences-{{ $index }}-description"
                                                rows="3"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <button type="button" wire:click="addExperience"
                                class="mt-4 px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Another Experience
                            </button>
                        </div>
                    @elseif($currentStep == 3)
                        <div class="space-y-8">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-2xl font-semibold text-gray-800">Education</h2>
                                <span class="text-sm text-gray-500">Step 3 of {{ count($steps) }}</span>
                            </div>

                            @foreach ($educations as $index => $education)
                                <div class="border border-gray-200 rounded-lg p-6 mb-6"
                                    wire:key="education-{{ $index }}">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-medium text-gray-800">Education #{{ $index + 1 }}
                                        </h3>
                                        @if ($index > 0)
                                            <button type="button" wire:click="removeEducation({{ $index }})"
                                                class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Remove
                                            </button>
                                        @endif
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Degree -->
                                        <div>
                                            <label for="educations-{{ $index }}-degree"
                                                class="block text-sm font-medium text-gray-700 mb-1">Degree</label>
                                            <input type="text" wire:model="educations.{{ $index }}.degree"
                                                id="educations-{{ $index }}-degree"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                            @error("educations.$index.degree")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Institution -->
                                        <div>
                                            <label for="educations-{{ $index }}-institution"
                                                class="block text-sm font-medium text-gray-700 mb-1">Institution</label>
                                            <input type="text"
                                                wire:model="educations.{{ $index }}.institution"
                                                id="educations-{{ $index }}-institution"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                            @error("educations.$index.institution")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Field of Study -->
                                        <div>
                                            <label for="educations-{{ $index }}-field_of_study"
                                                class="block text-sm font-medium text-gray-700 mb-1">Field of
                                                Study</label>
                                            <input type="text"
                                                wire:model="educations.{{ $index }}.field_of_study"
                                                id="educations-{{ $index }}-field_of_study"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>

                                        <!-- Start Date -->
                                        <div>
                                            <label for="educations-{{ $index }}-start_date"
                                                class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                                            <input type="date"
                                                wire:model="educations.{{ $index }}.start_date"
                                                id="educations-{{ $index }}-start_date"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                            @error("educations.$index.start_date")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- End Date -->
                                        <div>
                                            <label for="educations-{{ $index }}-end_date"
                                                class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                                            <input type="date"
                                                wire:model="educations.{{ $index }}.end_date"
                                                id="educations-{{ $index }}-end_date"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <a href="#" wire:click.prevent="addEducation"
                                class="mt-4 px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Another Education
                            </a>

                        </div>
                    @elseif($currentStep == 4)
                        <div class="space-y-6">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-2xl font-semibold text-gray-800">Skills</h2>
                                <span class="text-sm text-gray-500">Step 4 of {{ count($steps) }}</span>
                            </div>

                            @foreach ($skills as $index => $skill)
                                <div class="border border-gray-200 rounded-lg p-6 mb-6"
                                    wire:key="skill-{{ $index }}">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-medium text-gray-800">Skill #{{ $index + 1 }}</h3>
                                        @if ($index > 0)
                                            <button type="button" wire:click="removeSkill({{ $index }})"
                                                class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Remove
                                            </button>
                                        @endif
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Skill Name -->
                                        <div>
                                            <label for="skills-{{ $index }}-name"
                                                class="block text-sm font-medium text-gray-700 mb-1">Skill Name</label>
                                            <input type="text" wire:model="skills.{{ $index }}.name"
                                                id="skills-{{ $index }}-name"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                            @error("skills.$index.name")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Skill Level -->
                                        <div>
                                            <label for="skills-{{ $index }}-level"
                                                class="block text-sm font-medium text-gray-700 mb-1">Proficiency
                                                Level</label>
                                            <select wire:model="skills.{{ $index }}.level"
                                                id="skills-{{ $index }}-level"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                                <option value="">Select level</option>
                                                <option value="Beginner">Beginner</option>
                                                <option value="Intermediate">Intermediate</option>
                                                <option value="Advanced">Advanced</option>
                                                <option value="Expert">Expert</option>
                                            </select>
                                            @error("skills.$index.level")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <button type="button" wire:click="addSkill"
                                class="mt-4 px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Another Skill
                            </button>
                        </div>
                    @elseif($currentStep == 5)
                        <div class="space-y-6">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-2xl font-semibold text-gray-800">Projects</h2>
                                <span class="text-sm text-gray-500">Step 5 of {{ count($steps) }}</span>
                            </div>

                            @foreach ($projects as $index => $project)
                                <div class="border border-gray-200 rounded-lg p-6 mb-6"
                                    wire:key="project-{{ $index }}">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-medium text-gray-800">Project #{{ $index + 1 }}
                                        </h3>
                                        @if ($index > 0)
                                            <button type="button" wire:click="removeProject({{ $index }})"
                                                class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Remove
                                            </button>
                                        @endif
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Project Name -->
                                        <div>
                                            <label for="projects-{{ $index }}-name"
                                                class="block text-sm font-medium text-gray-700 mb-1">Project
                                                Name</label>
                                            <input type="text" wire:model="projects.{{ $index }}.name"
                                                id="projects-{{ $index }}-name"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                            @error("projects.$index.name")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Project Link -->
                                        <div>
                                            <label for="projects-{{ $index }}-link"
                                                class="block text-sm font-medium text-gray-700 mb-1">Project Link
                                                (URL)
                                            </label>
                                            <input type="url" wire:model="projects.{{ $index }}.link"
                                                id="projects-{{ $index }}-link"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>

                                        <!-- Description -->
                                        <div class="md:col-span-2">
                                            <label for="projects-{{ $index }}-description"
                                                class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                            <textarea wire:model="projects.{{ $index }}.description" id="projects-{{ $index }}-description"
                                                rows="3"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <a href="#" wire:click.prevent="addProject"
                                class="mt-4 px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Another Project
                            </a>
                        </div>
                    @elseif($currentStep == 6)
                        <div class="space-y-6">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-2xl font-semibold text-gray-800">Languages</h2>
                                <span class="text-sm text-gray-500">Step 6 of {{ count($steps) }}</span>
                            </div>

                            @foreach ($languages as $index => $language)
                                <div class="border border-gray-200 rounded-lg p-6 mb-6"
                                    wire:key="language-{{ $index }}">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-medium text-gray-800">Language #{{ $index + 1 }}
                                        </h3>
                                        @if ($index > 0)
                                            <button type="button" wire:click="removeLanguage({{ $index }})"
                                                class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Remove
                                            </button>
                                        @endif
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Language Name -->
                                        <div>
                                            <label for="languages-{{ $index }}-name"
                                                class="block text-sm font-medium text-gray-700 mb-1">Language</label>
                                            <input type="text" wire:model="languages.{{ $index }}.name"
                                                id="languages-{{ $index }}-name"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                            @error("languages.$index.name")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Proficiency -->
                                        <div>
                                            <label for="languages-{{ $index }}-proficiency"
                                                class="block text-sm font-medium text-gray-700 mb-1">Proficiency</label>
                                            <select wire:model="languages.{{ $index }}.proficiency"
                                                id="languages-{{ $index }}-proficiency"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                                <option value="">Select proficiency</option>
                                                <option value="Elementary">Elementary</option>
                                                <option value="Limited Working">Limited Working</option>
                                                <option value="Professional Working">Professional Working</option>
                                                <option value="Full Professional">Full Professional</option>
                                                <option value="Native/Bilingual">Native/Bilingual</option>
                                            </select>
                                            @error("languages.$index.proficiency")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <button type="button" wire:click="addLanguage"
                                class="mt-4 px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Another Language
                            </button>
                        </div>
                    @elseif($currentStep == 7)
                        <div class="space-y-6">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-2xl font-semibold text-gray-800">Certifications</h2>
                                <span class="text-sm text-gray-500">Step 7 of {{ count($steps) }}</span>
                            </div>

                            @foreach ($certifications as $index => $certification)
                                <div class="border border-gray-200 rounded-lg p-6 mb-6"
                                    wire:key="certification-{{ $index }}">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-medium text-gray-800">Certification
                                            #{{ $index + 1 }}</h3>
                                        @if ($index > 0)
                                            <button type="button"
                                                wire:click="removeCertification({{ $index }})"
                                                class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Remove
                                            </button>
                                        @endif
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Certification Name -->
                                        <div>
                                            <label for="certifications-{{ $index }}-name"
                                                class="block text-sm font-medium text-gray-700 mb-1">Certification
                                                Name</label>
                                            <input type="text"
                                                wire:model="certifications.{{ $index }}.name"
                                                id="certifications-{{ $index }}-name"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                            @error("certifications.$index.name")
                                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Issuer -->
                                        <div>
                                            <label for="certifications-{{ $index }}-issuer"
                                                class="block text-sm font-medium text-gray-700 mb-1">Issuing
                                                Organization</label>
                                            <input type="text"
                                                wire:model="certifications.{{ $index }}.issuer"
                                                id="certifications-{{ $index }}-issuer"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>

                                        <!-- Date Issued -->
                                        <div>
                                            <label for="certifications-{{ $index }}-date_issued"
                                                class="block text-sm font-medium text-gray-700 mb-1">Date
                                                Issued</label>
                                            <input type="date"
                                                wire:model="certifications.{{ $index }}.date_issued"
                                                id="certifications-{{ $index }}-date_issued"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <a href="#" wire:click.prevent="addCertification"
                                class="mt-4 px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Another Certification
                            </a>
                        </div>
                    @elseif($currentStep == 8)
                        <div class="space-y-6">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-2xl font-semibold text-gray-800">Confirmation</h2>
                                <span class="text-sm text-gray-500">Step 8 of {{ count($steps) }}</span>
                            </div>

                            <!-- Resume Title -->
                            <div class="mb-6">
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Resume
                                    Title</label>
                                <input type="text" wire:model="title" id="title"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                @error('title')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Resume Slug -->
                            <div class="mb-6">
                                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Resume URL
                                    Slug</label>
                                <input type="text" wire:model="slug" id="slug"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                @error('slug')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Visibility -->
                            <div class="mb-6">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" wire:model="is_public"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <span class="ml-2 text-sm text-gray-600">Make this resume public</span>
                                </label>
                            </div>

                        </div>
                    @endif

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between mt-12 pt-6 border-t border-gray-200">
                        @if ($currentStep > 1)
                            <a href="#" wire:click.prevent="prevStep"
                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-colors flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Back
                            </a>
                        @else
                            <div></div> <!-- Empty div to maintain space -->
                        @endif

                        @if ($currentStep < count($steps))
                            <a href="#" wire:click.prevent="nextStep"
                                class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-colors flex items-center">
                                Continue
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @else
                            <button type="button" wire:click="submit"
                                class="px-6 py-3 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition-colors flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Submit Resume
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            @if (session()->has('message'))
                <div class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Right Side - Template Preview -->
            <div class="lg:w-1/2">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 sticky top-4">
                    <div class="flex justify-between items-center mb-5">
                        <h3 class="text-lg font-semibold text-gray-800">Template Preview</h3>
                        <button class="text-sm text-green-600 hover:text-green-700 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Change Template
                        </button>
                    </div>

                    <!-- Selected Template Preview -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden shadow-xs">
                        <!-- Template Header -->
                        <div class="bg-gray-800 text-white p-6">
                            <h1 class="text-2xl font-bold tracking-tight">John Doe</h1>
                            <p class="text-gray-300 font-medium">Software Engineer</p>
                        </div>

                        <!-- Template Content -->
                        <div class="p-6 space-y-6">
                            <!-- Contact Info -->
                            <div class="flex flex-wrap gap-x-4 gap-y-2 text-sm text-gray-600">
                                <span class="flex items-center">
                                    <svg class="w-3 h-3 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    john@example.com
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-3 h-3 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                    (123) 456-7890
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-3 h-3 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    San Francisco, CA
                                </span>
                            </div>

                            <!-- Summary -->
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-1.5 mb-3">
                                    Summary</h2>
                                <p class="text-gray-700 text-sm leading-relaxed">Experienced software engineer with 5+
                                    years of expertise in full-stack development. Specialized in JavaScript frameworks
                                    and cloud architecture. Passionate about building scalable web applications that
                                    deliver exceptional user experiences.</p>
                            </div>

                            <!-- Experience -->
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-1.5 mb-3">
                                    Experience</h2>
                                <div class="space-y-4">
                                    <div>
                                        <h3 class="font-medium text-gray-800">Senior Software Engineer</h3>
                                        <p class="text-gray-500 text-xs font-medium">Tech Company Inc. • 2020 - Present
                                            • San Francisco, CA</p>
                                        <ul class="list-disc list-inside text-gray-700 text-sm mt-2 space-y-1 ml-4">
                                            <li>Led development of customer portal using React and Node.js, improving
                                                user engagement by 35%</li>
                                            <li>Optimized application performance by 40% through code refactoring and
                                                database improvements</li>
                                            <li>Mentored 3 junior developers, improving team productivity by 25%</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">Software Engineer</h3>
                                        <p class="text-gray-500 text-xs font-medium">Startup Solutions • 2018 - 2020 •
                                            New York, NY</p>
                                        <ul class="list-disc list-inside text-gray-700 text-sm mt-2 space-y-1 ml-4">
                                            <li>Developed RESTful APIs that served 10,000+ daily requests</li>
                                            <li>Implemented CI/CD pipeline reducing deployment time by 60%</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Education -->
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-1.5 mb-3">
                                    Education</h2>
                                <div>
                                    <h3 class="font-medium text-gray-800">B.S. in Computer Science</h3>
                                    <p class="text-gray-500 text-xs font-medium">Stanford University • 2015 - 2019 •
                                        Palo Alto, CA</p>
                                    <p class="text-gray-700 text-sm mt-1">GPA: 3.8/4.0</p>
                                </div>
                            </div>

                            <!-- Skills -->
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-1.5 mb-3">
                                    Skills</h2>
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="px-2.5 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">JavaScript</span>
                                    <span
                                        class="px-2.5 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">React</span>
                                    <span
                                        class="px-2.5 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">Node.js</span>
                                    <span
                                        class="px-2.5 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">TypeScript</span>
                                    <span
                                        class="px-2.5 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">AWS</span>
                                    <span
                                        class="px-2.5 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">Docker</span>
                                    <span
                                        class="px-2.5 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">Git</span>
                                    <span
                                        class="px-2.5 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">Agile</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-center text-xs text-gray-500">
                        Changes update in real-time as you fill the form
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
