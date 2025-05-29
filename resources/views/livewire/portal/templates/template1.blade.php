<div class="font-sans bg-white p-8 max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        {{ $personal_info['name'] }} hi
        <div>
            <h1 class="text-3xl font-bold text-gray-800">{{ $personal_info['name'] ?? 'Your Name' }}</h1>
            <p class="text-gray-600">{{ $personal_info['summary'] ?? 'Professional summary goes here' }}</p>
        </div>
        @if (isset($personal_info['photo']) && $personal_info['photo'])
            <img src="{{ $personal_info['photo']->temporaryUrl() }}" alt="Profile Photo"
                class="w-24 h-24 rounded-full object-cover border-4 border-indigo-100">
        @endif
    </div>

    <!-- Contact Info -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8 bg-indigo-50 p-4 rounded-lg">
        @if (isset($personal_info['email']) && $personal_info['email'])
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
                <span>{{ $personal_info['email'] }}</span>
            </div>
        @endif
        @if (isset($personal_info['phone']) && $personal_info['phone'])
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                    </path>
                </svg>
                <span>{{ $personal_info['phone'] }}</span>
            </div>
        @endif
        @if (isset($personal_info['address']) && $personal_info['address'])
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span>{{ $personal_info['address'] }}</span>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Left Column -->
        <div class="md:col-span-2">
            <!-- Experience -->
            @if (!empty($experiences))
                <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-indigo-200">Work Experience</h2>
                @foreach ($experiences as $experience)
                    @if (!empty($experience['job_title']) || !empty($experience['employer']))
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">
                                {{ $experience['job_title'] ?? 'Job Title' }}</h3>
                            <div class="flex justify-between text-gray-600 mb-1">
                                <span>{{ $experience['employer'] ?? 'Company Name' }}</span>
                                <span>
                                    @if (!empty($experience['start_date']))
                                        {{ date('M Y', strtotime($experience['start_date'])) }} -
                                        {{ !empty($experience['end_date']) ? date('M Y', strtotime($experience['end_date'])) : 'Present' }}
                                    @endif
                                </span>
                            </div>
                            @if (!empty($experience['description']))
                                <p class="text-gray-700">{{ $experience['description'] }}</p>
                            @endif
                        </div>
                    @endif
                @endforeach
            @endif

            <!-- Projects -->
            @if (!empty($projects))
                <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-indigo-200">Projects</h2>
                @foreach ($projects as $project)
                    @if (!empty($project['name']))
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $project['name'] }}</h3>
                            @if (!empty($project['link']))
                                <a href="{{ $project['link'] }}" target="_blank"
                                    class="text-indigo-600 hover:underline text-sm mb-1 inline-block">{{ $project['link'] }}</a>
                            @endif
                            @if (!empty($project['description']))
                                <p class="text-gray-700">{{ $project['description'] }}</p>
                            @endif
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        <!-- Right Column -->
        <div>
            <!-- Skills -->
            @if (!empty($skills))
                <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-indigo-200">Skills</h2>
                <div class="space-y-2">
                    @foreach ($skills as $skill)
                        @if (!empty($skill['name']))
                            <div>
                                <span class="font-medium">{{ $skill['name'] }}</span>
                                @if (!empty($skill['level']))
                                    <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                        <div class="bg-indigo-600 h-2 rounded-full"
                                            style="width: {{ $skill['level'] == 'Beginner'
                                                ? '25%'
                                                : ($skill['level'] == 'Intermediate'
                                                    ? '50%'
                                                    : ($skill['level'] == 'Advanced'
                                                        ? '75%'
                                                        : '100%')) }}">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

            <!-- Education -->
            @if (!empty($educations))
                <h2 class="text-xl font-bold text-gray-800 mt-6 mb-4 pb-2 border-b-2 border-indigo-200">Education</h2>
                @foreach ($educations as $education)
                    @if (!empty($education['degree']) || !empty($education['institution']))
                        <div class="mb-4">
                            <h3 class="font-semibold text-gray-800">{{ $education['degree'] ?? 'Degree' }}</h3>
                            <p class="text-gray-600">{{ $education['institution'] ?? 'Institution' }}</p>
                            @if (!empty($education['start_date']))
                                <p class="text-sm text-gray-500">
                                    {{ date('M Y', strtotime($education['start_date'])) }} -
                                    {{ !empty($education['end_date']) ? date('M Y', strtotime($education['end_date'])) : 'Present' }}
                                </p>
                            @endif
                        </div>
                    @endif
                @endforeach
            @endif

            <!-- Languages -->
            @if (!empty($languages))
                <h2 class="text-xl font-bold text-gray-800 mt-6 mb-4 pb-2 border-b-2 border-indigo-200">Languages</h2>
                <div class="space-y-2">
                    @foreach ($languages as $language)
                        @if (!empty($language['name']))
                            <div>
                                <span class="font-medium">{{ $language['name'] }}</span>
                                @if (!empty($language['proficiency']))
                                    <span class="text-gray-600 text-sm ml-2">{{ $language['proficiency'] }}</span>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
