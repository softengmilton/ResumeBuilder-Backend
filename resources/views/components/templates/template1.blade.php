<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $personal_info['name'] ?? 'Professional Resume' }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

        .resume-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 210mm;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        .sidebar {
            background-color: #f8f9fa;
            padding: 30px;
        }

        .main-content {
            padding: 30px 30px 30px 0;
        }

        .name-title {
            margin-bottom: 30px;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 20px;
        }

        .name {
            font-size: 28px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .title {
            font-size: 16px;
            font-weight: 500;
            color: #7f8c8d;
            text-transform: uppercase;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #2c3e50;
            text-transform: uppercase;
            margin-bottom: 15px;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 5px;
        }

        .contact-info {
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }

        .contact-info i {
            margin-right: 10px;
            color: #7f8c8d;
            width: 20px;
            text-align: center;
        }

        .education-item,
        .experience-item {
            margin-bottom: 20px;
        }

        .date {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 5px;
        }

        .degree,
        .job-title {
            font-weight: 500;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .university,
        .company {
            font-weight: 400;
            color: #34495e;
            margin-bottom: 5px;
        }

        .description {
            font-size: 14px;
            color: #555;
        }

        .skills-list {
            list-style-type: none;
            padding: 0;
        }

        .skill-item {
            margin-bottom: 10px;
        }

        .skill-name {
            display: block;
            margin-bottom: 5px;
        }

        .skill-bar {
            height: 6px;
            background-color: #e9ecef;
            border-radius: 3px;
            overflow: hidden;
        }

        .skill-level {
            height: 100%;
            background-color: #2c3e50;
        }

        .language-item {
            margin-bottom: 10px;
        }

        .language-name {
            font-weight: 500;
        }

        .language-level {
            font-size: 14px;
            color: #7f8c8d;
        }

        .profile-text {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
        }

        .reference-item {
            margin-bottom: 15px;
        }

        .reference-name {
            font-weight: 500;
            color: #2c3e50;
        }

        .reference-position {
            font-size: 14px;
            color: #34495e;
        }

        .reference-contact {
            font-size: 13px;
            color: #7f8c8d;
        }

        .photo-container {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 20px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="resume-container">
        <div class="sidebar">
            <div class="name-title">
                <h1 class="name">{{ $personal_info['name'] ?? 'Your Name' }}</h1>
                @if (!empty($personal_info['summary']))
                    <p class="title">{{ $personal_info['summary'] }}</p>
                @endif
            </div>

            @if (!empty($personal_info['photo']))
                <div class="photo-container">
                    <img src="{{ asset('storage/' . $personal_info['photo']) }}" alt="Profile Photo">
                </div>
            @endif

            <div class="section">
                <h2 class="section-title">CONTACT</h2>
                @if (!empty($personal_info['phone']))
                    <div class="contact-info">
                        <i class="fas fa-phone"></i>
                        <span>{{ $personal_info['phone'] }}</span>
                    </div>
                @endif

                @if (!empty($personal_info['email']))
                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <span>{{ $personal_info['email'] }}</span>
                    </div>
                @endif

                @if (!empty($personal_info['address']))
                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $personal_info['address'] }}</span>
                    </div>
                @endif

                @if (!empty($personal_info['website']))
                    <div class="contact-info">
                        <i class="fas fa-globe"></i>
                        <span>{{ $personal_info['website'] }}</span>
                    </div>
                @endif

                @if (!empty($personal_info['linkedin']))
                    <div class="contact-info">
                        <i class="fab fa-linkedin"></i>
                        <span>{{ $personal_info['linkedin'] }}</span>
                    </div>
                @endif

                @if (!empty($personal_info['github']))
                    <div class="contact-info">
                        <i class="fab fa-github"></i>
                        <span>{{ $personal_info['github'] }}</span>
                    </div>
                @endif
            </div>

            @if (!empty($educations))
                <div class="section">
                    <h2 class="section-title">EDUCATION</h2>
                    @foreach ($educations as $education)
                        <div class="education-item">
                            @if (!empty($education['start_date']) || !empty($education['end_date']))
                                <p class="date">
                                    {{ $education['start_date'] ?? '' }} - {{ $education['end_date'] ?? '' }}
                                </p>
                            @endif
                            @if (!empty($education['degree']))
                                <p class="degree">{{ $education['degree'] }}</p>
                            @endif
                            @if (!empty($education['institution']))
                                <p class="university">{{ $education['institution'] }}</p>
                            @endif
                            @if (!empty($education['field_of_study']))
                                <p class="description">Field: {{ $education['field_of_study'] }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            @if (!empty($skills))
                <div class="section">
                    <h2 class="section-title">SKILLS</h2>
                    <ul class="skills-list">
                        @foreach ($skills as $skill)
                            @if (!empty($skill['name']))
                                <li class="skill-item">
                                    <span class="skill-name">{{ $skill['name'] }}</span>
                                    @if (!empty($skill['level']))
                                        <div class="skill-bar">
                                            {{-- <div class="skill-level"
                                                style="width: {{ $this->calculateSkillPercentage($skill['level']) }}%;">
                                            </div> --}}
                                        </div>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (!empty($languages))
                <div class="section">
                    <h2 class="section-title">LANGUAGES</h2>
                    @foreach ($languages as $language)
                        @if (!empty($language['name']))
                            <div class="language-item">
                                <span class="language-name">{{ $language['name'] }}</span>
                                @if (!empty($language['proficiency']))
                                    <span class="language-level">({{ $language['proficiency'] }})</span>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>

        <div class="main-content">
            @if (!empty($personal_info['summary']))
                <div class="section">
                    <h2 class="section-title">PROFILE</h2>
                    <p class="profile-text">
                        {{ $personal_info['summary'] }}
                    </p>
                </div>
            @endif

            @if (!empty($experiences))
                <div class="section">
                    <h2 class="section-title">WORK EXPERIENCE</h2>
                    @foreach ($experiences as $experience)
                        <div class="experience-item">
                            @if (!empty($experience['job_title']))
                                <p class="job-title">{{ $experience['job_title'] }}</p>
                            @endif
                            @if (!empty($experience['employer']))
                                <p class="company">{{ $experience['employer'] }}</p>
                            @endif
                            @if (!empty($experience['start_date']) || !empty($experience['end_date']))
                                <p class="date">
                                    {{ $experience['start_date'] ?? '' }} - {{ $experience['end_date'] ?? '' }}
                                </p>
                            @endif
                            @if (!empty($experience['description']))
                                <div class="description">
                                    {!! nl2br(e($experience['description'])) !!}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            @if (!empty($projects))
                <div class="section">
                    <h2 class="section-title">PROJECTS</h2>
                    @foreach ($projects as $project)
                        <div class="experience-item">
                            @if (!empty($project['name']))
                                <p class="job-title">{{ $project['name'] }}</p>
                            @endif
                            @if (!empty($project['link']))
                                <p class="company">
                                    <a href="{{ $project['link'] }}" target="_blank">{{ $project['link'] }}</a>
                                </p>
                            @endif
                            @if (!empty($project['description']))
                                <div class="description">
                                    {!! nl2br(e($project['description'])) !!}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            @if (!empty($certifications))
                <div class="section">
                    <h2 class="section-title">CERTIFICATIONS</h2>
                    @foreach ($certifications as $certification)
                        <div class="education-item">
                            @if (!empty($certification['date_issued']))
                                <p class="date">{{ $certification['date_issued'] }}</p>
                            @endif
                            @if (!empty($certification['name']))
                                <p class="degree">{{ $certification['name'] }}</p>
                            @endif
                            @if (!empty($certification['issuer']))
                                <p class="university">{{ $certification['issuer'] }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>

</html>
