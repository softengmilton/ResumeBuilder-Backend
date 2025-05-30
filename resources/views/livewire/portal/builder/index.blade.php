<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="w-[20rem] bg-[#052659] text-white h-[100vh] fixed flex flex-col justify-between">
        <!-- Header -->
        <div class="p-6">
            <div class="flex items-center mb-6">
                <div class="w-6 h-6 bg-gradient-to-tr from-pink-500 to-purple-600 rounded-md mr-2"></div>
                <h1 class="text-lg font-bold text-purple-400"><a href="{{ route('home') }}">Enhance CV</a></h1>
            </div>

            <!-- Stepper Navigation -->
            <ol class="space-y-6 text-sm font-medium">
                @foreach ($steps as $stepNumber => $stepName)
                    <li class="flex items-center">
                        <a href="#" wire:click.prevent="goToStep({{ $stepNumber }})" class="flex items-center">
                            <div
                                class="w-6 h-6 rounded-full mr-3 flex items-center justify-center text-xs font-semibold
                                @if ($currentStep == $stepNumber) bg-orange-500 text-white
                                @elseif ($currentStep > $stepNumber) bg-white text-black
                                @else border-2 border-white text-white @endif">
                                {{ $stepNumber }}
                            </div>
                            <span
                                class="@if ($currentStep == $stepNumber) text-white font-bold @else text-white @endif">
                                {{ $stepName }}
                            </span>
                        </a>
                    </li>
                @endforeach
            </ol>

            <!-- Progress bar -->
            <div class="mt-8">
                <p class="text-xs font-semibold mb-1 text-white">RESUME COMPLETENESS:</p>
                <div class="w-full bg-white bg-opacity-20 rounded-full h-2">
                    <div class="bg-white h-2 rounded-full transition-all duration-300"
                        style="width: {{ $resumeCompleteness }}%;"></div>
                </div>
                <p class="text-xs mt-1 text-white">{{ $resumeCompleteness }}%</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="p-4 text-lg text-white space-y-2">
            <a href="#" class="text-green-400 hover:underline block">Terms & Conditions</a>
            <a href="#" class="text-green-400 hover:underline block">Privacy Policy</a>
            <a href="#" class="text-green-400 hover:underline block">Accessibility</a>
            <a href="#" class="text-green-400 hover:underline block">Contact Us</a>
            <p class="text-gray-400 mt-2 text-sm">© 2025, Bold Limited. All rights reserved.</p>
        </div>
    </div>


    <main class="container mx-auto px-4 py-8 ms-[15rem] scroll-m-0 overflow-y-auto max-h-screen">
        <div class="flex">
            <!-- Left Side - Stepper Form -->
            <div class="lg:w-1/2  p-8 rounded-xl px-32">

                <!-- Step Content -->
                <div class=" p-8 rounded-xl  transition-all duration-300">
                    <!-- Header with back button and step indicator -->
                    <div class="flex justify-between items-center mb-6">
                        @if ($currentStep > 1)
                            <button class="text-blue-600 flex items-center" wire:click.prevent="prevStep">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                Go Back
                            </button>
                        @else
                            <a class="text-blue-600 flex items-center" href="{{ route('resume') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                Go Back
                            </a>
                        @endif
                        <span class="text-sm text-gray-500">Step 1 of 5</span>
                    </div>
                    @if ($currentStep == 1)

                        <div class="space-y-6 ">
                            <!-- Title and description -->
                            <h1 class="text-6xl font-bold text-gray-800 mb-2">What's the best way for employers to
                                contact you?</h1>
                            <p class="text-gray-600 mb-4">We suggest including an email and phone number.</p>
                            <p class="text-sm text-gray-500 mb-6">* Indicates a required field</p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full
                                        Name</label>
                                    <input type="text" wire:model="personal_info.name" id="name"
                                        class="w-full px-4 py-2 border border-gray-300  focus:ring-indigo-500 focus:border-indigo-500">
                                    @error('personal_info.name')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" wire:model="personal_info.email" id="email"
                                        class="w-full px-4 py-2 border border-gray-300  focus:ring-indigo-500 focus:border-indigo-500">
                                    @error('personal_info.email')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label for="phone"
                                        class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                    <input type="tel" wire:model="personal_info.phone" id="phone"
                                        class="w-full px-4 py-2 border border-gray-300  focus:ring-indigo-500 focus:border-indigo-500">
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
                            <!-- Title and description -->
                            <h1 class="text-6xl font-bold text-gray-800 mb-2">Tell us about your experience</h1>
                            <p class="text-gray-600 mb-4">Start with your most recent experience and work backward.</p>
                            <p class="text-sm text-gray-500 mb-6">* Indicates a required field</p>

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
                            <!-- Title and description -->
                            <h1 class="text-6xl font-bold text-gray-800 mb-2">Tell us about your education
                            </h1>
                            <p class="text-gray-600 mb-4">Enter your education experience so far, even if you are a
                                current student or did not graduate.
                            </p>
                            <p class="text-sm text-gray-500 mb-6">* Indicates a required field</p>

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
                            <!-- Title and description -->
                            <h1 class="text-6xl font-bold text-gray-800 mb-2">What skills would you like to highlight?
                            </h1>
                            <p class="text-gray-600 mb-4">Choose from our pre-written examples below or write your own.
                            </p>
                            <p class="text-sm text-gray-500 mb-6">* Indicates a required field</p>
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
                            <!-- Title and description -->
                            <h1 class="text-6xl font-bold text-gray-800 mb-2">What Project would you like to highlight?
                            </h1>
                            <p class="text-gray-600 mb-4">Choose from our pre-written examples below or write your own.
                            </p>
                            <p class="text-sm text-gray-500 mb-6">* Indicates a required field</p>

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
                            <!-- Title and description -->
                            <h1 class="text-6xl font-bold text-gray-800 mb-2">What Language would you like to
                                highlight?
                            </h1>
                            <p class="text-gray-600 mb-4">Choose from our pre-written examples below or write your own.
                            </p>
                            <p class="text-sm text-gray-500 mb-6">* Indicates a required field</p>

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
                            <!-- Title and description -->
                            <h1 class="text-6xl font-bold text-gray-800 mb-2">What Certification would you like to
                                highlight?
                            </h1>
                            <p class="text-gray-600 mb-4">Choose from our pre-written examples below or write your own.
                            </p>
                            <p class="text-sm text-gray-500 mb-6">* Indicates a required field</p>

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
                            <!-- Title and description -->
                            <h1 class="text-6xl font-bold text-gray-800 mb-2">What skills would you like to highlight?
                            </h1>
                            <p class="text-gray-600 mb-4">Choose from our pre-written examples below or write your own.
                            </p>
                            <p class="text-sm text-gray-500 mb-6">* Indicates a required field</p>

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
                    <div class="flex justify-end mt-12 pt-6 border-t border-gray-200">

                        <a href="#" wire:click="newClick"
                            class="px-6 py-3 border bg-red-400 text-white border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-colors flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Preview
                        </a>


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
            <div class="lg:w-1/2 max-w-6xl">
                <div class="p-6 sticky top-4">

                    <div class="  rounded-lg overflow-hidden h-[50vh] mt-36 p-10 px-[20rem]">
                        <div class="border border-blue-800 h-[45vh] overflow-hidden relative">
                            <!-- Fixed scaling (no JS needed) -->
                            <div class="absolute top-0 left-0 w-50 h-50 origin-top-left scale-[0.82] ">
                                <!-- Adjust this value -->

                                <x-dynamic-component :component="$template->view_component" :personal_info="$personal_info" :experiences="$experiences"
                                    :educations="$educations" :skills="$skills" :projects="$projects" :languages="$languages"
                                    :certifications="$certifications" :currentStep="$currentStep" />

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

    <!-- Extra Large Modal -->
    @if ($toggleModal)
        <div id="extralarge-modal" tabindex="-1"
            class="fixed inset-0 z-50 flex items-center justify-center w-full p-4 overflow-x-hidden overflow-y-auto bg-[#052659] bg-opacity-50">
            <div class="relative w-full max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative rounded-lg shadow-sm bg-[#052659]">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Resume Preview
                        </h3>
                        <button type="button" wire:click="toggleClose"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="extralarge-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div id="pdf-content" class="p-4 md:p-5 space-y-4 overflow-y-auto max-h-[80vh]">
                        <x-dynamic-component :component="$template->view_component" :personal_info="$personal_info" :experiences="$experiences" :educations="$educations"
                            :skills="$skills" :projects="$projects" :languages="$languages" :certifications="$certifications" />
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button onclick="downloadPDF()" class="px-4 py-2 bg-blue-600 text-white rounded">Download
                            PDF</button>

                        <button data-modal-hide="extralarge-modal" type="button" wire:click="toggleClose"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script>
        let observer;

        function initScaling() {
            const container = document.querySelector('.border-blue-800');
            if (!container) return;

            // Disconnect previous observer if exists
            if (observer) observer.disconnect();

            // Apply scaling immediately
            applyScalingToContainer(container);

            // Watch for future changes
            observer = new MutationObserver(() => {
                applyScalingToContainer(container);
            });

            observer.observe(container, {
                childList: true,
                subtree: true,
                attributes: true
            });
        }

        function applyScalingToContainer(container) {
            const content = container.querySelector('div > div');
            if (!content) return;

            const scale = container.clientHeight / content.scrollHeight * 0.95;
            content.style.transform = `scale(${scale})`;
        }

        // Initialize on load and when Livewire finishes updates
        document.addEventListener('DOMContentLoaded', initScaling);
        Livewire.hook('message.processed', initScaling);
    </script>

    <script>
        async function downloadPDF() {
            const original = document.getElementById('pdf-content');

            // Clone the component's content to avoid scroll/crop issues
            const clone = original.cloneNode(true);
            clone.style.maxHeight = 'none';
            clone.style.overflow = 'visible';
            clone.style.position = 'absolute';
            clone.style.top = '0';
            clone.style.left = '0';
            clone.style.zIndex = '-1'; // Hide visually but keep renderable
            clone.style.width = original.offsetWidth + 'px';

            document.body.appendChild(clone);

            // Wait for DOM reflow and rendering
            await new Promise(resolve => setTimeout(resolve, 500));

            const canvas = await html2canvas(clone, {
                scale: 2,
                useCORS: true,
                windowWidth: clone.scrollWidth,
            });

            document.body.removeChild(clone); // clean up

            const imgData = canvas.toDataURL('image/png');
            const {
                jsPDF
            } = window.jspdf;
            const pdf = new jsPDF('p', 'mm', 'a4');

            const pdfWidth = pdf.internal.pageSize.getWidth();
            const imgProps = pdf.getImageProperties(imgData);
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

            // Check if content is taller than one page
            if (pdfHeight <= pdf.internal.pageSize.getHeight()) {
                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
            } else {
                // Paginate
                let position = 0;
                const pageHeight = pdf.internal.pageSize.getHeight();
                while (position < pdfHeight) {
                    pdf.addImage(imgData, 'PNG', 0, -position, pdfWidth, pdfHeight);
                    position += pageHeight;
                    if (position < pdfHeight) pdf.addPage();
                }
            }

            pdf.save('resume.pdf');
        }
    </script>


</div>
