<div class="min-h-screen bg-gray-50">
    <!-- Mobile Header -->
    <div class="lg:hidden bg-[#052659] text-white p-4 flex justify-between items-center sticky top-0 z-40">
        <div class="flex items-center">
            <div class="w-6 h-6 bg-gradient-to-tr from-pink-500 to-purple-600 rounded-md mr-2"></div>
            <h1 class="text-base sm:text-lg font-bold text-purple-400">Enhance CV</h1>
        </div>
        <button id="mobile-menu-button" class="text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Sidebar -->
    <div id="sidebar" class="w-64 md:w-72 lg:w-80 bg-[#052659] text-white h-screen fixed flex flex-col justify-between -translate-x-full lg:translate-x-0 transition-transform duration-300 z-30">
        <div class="p-4 md:p-6">
            <div class="flex items-center mb-6">
                <div class="w-6 h-6 bg-gradient-to-tr from-pink-500 to-purple-600 rounded-md mr-2"></div>
                <h1 class="text-lg font-bold text-purple-400"><a href="{{ route('home') }}">Enhance CV</a></h1>
            </div>
            <ol class="space-y-4 md:space-y-6 text-sm font-medium">
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
                        <span class="@if ($currentStep == $stepNumber) font-bold @endif">
                            {{ $stepName }}
                        </span>
                    </a>
                </li>
                @endforeach
            </ol>

            <div class="mt-6 md:mt-8">
                <p class="text-xs font-semibold mb-1">RESUME COMPLETENESS:</p>
                <div class="w-full bg-white bg-opacity-20 rounded-full h-2">
                    <div class="bg-white h-2 rounded-full transition-all duration-300"
                        style="width: {{ $resumeCompleteness }}%;"></div>
                </div>
                <p class="text-xs mt-1">{{ $resumeCompleteness }}%</p>
            </div>
        </div>
        <div class="p-4 text-sm space-y-2">
            <a href="#" class="text-green-400 hover:underline block">Terms & Conditions</a>
            <a href="#" class="text-green-400 hover:underline block">Privacy Policy</a>
            <a href="#" class="text-green-400 hover:underline block">Accessibility</a>
            <a href="#" class="text-green-400 hover:underline block">Contact Us</a>
            <p class="text-gray-400 mt-2 text-xs">© 2025, Bold Limited. All rights reserved.</p>
        </div>
    </div>

    <!-- Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden lg:hidden"></div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-6 lg:ml-64 md:lg:ml-72 lg:ml-80 transition-all duration-300">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Left Section - Form Content -->
            <div class="w-full lg:w-[45%] xl:w-[39%] p-4 sm:p-6">
                <!-- Step Content -->
                <div class="p-6 sm:p-8 rounded-xl transition-all duration-300">
                    <!-- Header with back button and step indicator -->
                    <div class="flex justify-between items-center mb-6">
                        @if ($currentStep > 1)
                        <button class="text-blue-600 flex items-center text-sm sm:text-base" wire:click.prevent="prevStep">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Go Back
                        </button>
                        @else
                        <a class="text-blue-600 flex items-center text-sm sm:text-base" href="{{ route('resume') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Go Back
                        </a>
                        @endif
                        <span class="text-xs sm:text-sm text-gray-500">Step {{ $currentStep }} of {{ count($steps) }}</span>
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
                            <!-- Name -->
                            <div>
                                <label for="occupation" class="block text-sm font-medium text-gray-700 mb-1">Enter your occupation</label>
                                <input type="text" wire:model="personal_info.occupation" id="occupation"
                                    class="w-full px-4 py-2 border border-gray-300  focus:ring-indigo-500 focus:border-indigo-500">
                                @error('personal_info.occupation')
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

                            <!-- Photo Upload & Preview -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Profile Photo</label>

                                <!-- Preview (New or Existing) -->
                                @if($photoPreview ?? false)
                                <div class="mt-2">
                                    <img
                                        src="{{ $photoPreview  }}"
                                        alt="Profile Photo"
                                        class="h-24 w-24 rounded-full object-cover border">
                                    <button
                                        wire:click="removePhoto"
                                        type="button"
                                        class="mt-2 text-sm text-red-500 hover:text-red-700">
                                        Remove Photo
                                    </button>
                                </div>
                                @else
                                <!-- Default placeholder -->
                                <div class="mt-2 flex items-center justify-center h-24 w-24 rounded-full bg-gray-200">
                                    <i class="fas fa-user text-gray-400 text-2xl"></i>
                                </div>
                                @endif

                                <!-- File Input -->
                                <input
                                    type="file"
                                    wire:model="photo"
                                    accept="image/*"
                                    class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                @error('photo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Summary -->
                            <div class="mb-4">
                                <label for="summary" class="block text-sm font-medium text-gray-700">Professional Summary</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <textarea
                                        wire:model="personal_info.summary"
                                        id="summary"
                                        rows="4"
                                        class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        placeholder="Write a brief summary of your professional background and key skills"></textarea>
                                </div>
                                <div class="mt-2">
                                    <button
                                        type="button"
                                        wire:click="generateSummary"
                                        wire:loading.attr="disabled"
                                        class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition ease-in-out duration-150">
                                        <span wire:loading.remove>Generate AI Summary</span>
                                        <span wire:loading>
                                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                            Generating...
                                        </span>
                                    </button>
                                    @error('summary') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
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
                    <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                        <a href="#" wire:click="newClick"
                            class="px-4 sm:px-6 py-2 sm:py-3 border bg-red-400 text-white border-gray-300 rounded-lg font-medium hover:bg-red-500 transition-colors flex items-center justify-center">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Preview
                        </a>

                        @if ($currentStep < count($steps))
                            <a href="#" wire:click.prevent="nextStep"
                            class="px-4 sm:px-6 py-2 sm:py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-colors flex items-center justify-center">
                            Continue
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                            </a>
                            @else
                            <button type="button" wire:click="submit"
                                class="px-4 sm:px-6 py-2 sm:py-3 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition-colors flex items-center justify-center">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Submit Resume
                            </button>
                            @endif
                    </div>
                </div>
            </div>

            <!-- Right Section - Resume Preview -->
            <!-- Right Section - Resume Preview -->
            <div class="w-full lg:w-[55%] xl:w-1/2 p-4 sm:p-6">
                <div class="sticky top-4">
                    <div class="overflow-x-auto pb-2"> <!-- Added horizontal scrolling container -->
                        <div class="min-w-[800px] md:min-w-[900px] border border-gray-200 rounded-lg overflow-hidden shadow-sm"> <!-- Set minimum width -->
                            <x-dynamic-component
                                :component="$template->view_component"
                                :personal_info="$personal_info"
                                :experiences="$experiences"
                                :educations="$educations"
                                :skills="$skills"
                                :projects="$projects"
                                :languages="$languages"
                                :certifications="$certifications"
                                :photoPreview="$photoPreview"
                                :currentStep="$currentStep" />
                        </div>
                    </div>

                    <div class="mt-3 text-center text-xs text-gray-500">
                        Changes update in real-time as you fill the form
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    @if ($toggleModal)
    <div id="extralarge-modal" class="fixed inset-0 z-50 flex items-center justify-center w-full p-4 overflow-x-hidden overflow-y-auto bg-[#052659]/50">
        <div class="relative w-full max-w-4xl xl:max-w-7xl max-h-full">
            <div class="relative rounded-lg shadow-sm bg-[#052659]">
                <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-200">
                    <h3 class="text-lg md:text-xl font-medium text-white">Resume Preview</h3>
                    <button type="button" wire:click="toggleClose" class="text-gray-400 hover:bg-gray-600 hover:text-white rounded-lg w-8 h-8 flex items-center justify-center">
                        ✕
                    </button>
                </div>
                <div id="pdf-content" class="p-2 md:p-4 space-y-4 overflow-y-auto max-h-[70vh] md:max-h-[80vh] w-full overflow-x-auto">
                    <div class="min-w-[210mm]"> <!-- A4 paper width -->
                        <x-dynamic-component :component="$template->view_component"
                            :personal_info="$personal_info"
                            :experiences="$experiences"
                            :educations="$educations"
                            :skills="$skills"
                            :projects="$projects"
                            :languages="$languages"
                            :photoPreview="$photoPreview"
                            :certifications="$certifications" />
                    </div>
                </div>
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 gap-3">
                    <button onclick="downloadPDF()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">Download PDF</button>
                    <button type="button" wire:click="toggleClose" class="px-4 py-2 border rounded hover:bg-gray-100 text-white border-white hover:text-gray-800 transition-colors">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script>
        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('mobile-menu-button');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            // Toggle sidebar and overlay
            menuButton.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
                document.body.classList.toggle('overflow-hidden');
            });

            // Close sidebar when clicking on overlay
            overlay.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });

            // Close sidebar when clicking a navigation link (optional)
            document.querySelectorAll('#sidebar a').forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 1024) { // Only for mobile
                        sidebar.classList.add('-translate-x-full');
                        overlay.classList.add('hidden');
                        document.body.classList.remove('overflow-hidden');
                    }
                });
            });

            // Adjust on window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }
            });
        });
    </script>
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
            const element = document.getElementById('pdf-content');

            // Temporarily adjust styles for PDF generation
            const originalStyles = {
                minWidth: element.style.minWidth,
                overflow: element.style.overflow,
                maxHeight: element.style.maxHeight
            };

            element.style.minWidth = '210mm'; // A4 width
            element.style.overflow = 'visible';
            element.style.maxHeight = 'none';

            // Wait for DOM update
            await new Promise(resolve => setTimeout(resolve, 100));

            const options = {
                scale: 2,
                useCORS: true,
                scrollX: 0,
                scrollY: 0,
                windowWidth: element.scrollWidth,
                windowHeight: element.scrollHeight,
                allowTaint: true,
                logging: true
            };

            try {
                const canvas = await html2canvas(element, options);
                const imgData = canvas.toDataURL('image/png');

                const {
                    jsPDF
                } = window.jspdf;
                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: [canvas.width * 0.264583, canvas.height * 0.264583] // Convert px to mm
                });

                pdf.addImage(imgData, 'PNG', 0, 0, pdf.internal.pageSize.getWidth(), pdf.internal.pageSize.getHeight());
                pdf.save('resume.pdf');
            } catch (error) {
                console.error('PDF generation error:', error);
                alert('Error generating PDF. Please try again.');
            } finally {
                // Restore original styles
                element.style.minWidth = originalStyles.minWidth;
                element.style.overflow = originalStyles.overflow;
                element.style.maxHeight = originalStyles.maxHeight;
            }
        }
    </script>
    <style>
        /* PDF-specific styles */
        .pdf-version {
            width: 210mm;
            min-height: 297mm;
            padding: 15mm;
            margin: 0;
            box-sizing: border-box;
            overflow: visible !important;
        }

        /* Prevent page breaks in PDF */
        .pdf-version * {
            page-break-inside: avoid;
            page-break-after: avoid;
            page-break-before: avoid;
        }

        /* Screen-specific styles */
        .screen-version {
            max-width: 100%;
            overflow: auto;
        }
    </style>
</div>