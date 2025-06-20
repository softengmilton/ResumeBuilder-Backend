<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $personal_info['name'] ?? 'Professional Resume' }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

        body {
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        .resume-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
            max-width: 960px;
            margin: 40px auto;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
            border-radius: 8px;
            overflow: hidden;
        }

        .sidebar {
            background-color: #f7f9fb;
            padding: 40px 30px;
            border-right: 1px solid #e0e0e0;
        }

        .main-content {
            padding: 40px 30px;
        }

        .name-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .name {
            font-size: 26px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .title {
            font-size: 14px;
            color: #7f8c8d;
            font-weight: 500;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #34495e;
            margin-bottom: 15px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }

        .contact-info {
            margin-bottom: 10px;
            font-size: 14px;
            color: #2c3e50;
            display: flex;
            align-items: center;
        }

        .contact-info i {
            margin-right: 10px;
            color: #3498db;
            width: 18px;
            text-align: center;
        }

        .education-item,
        .experience-item,
        .language-item,
        .reference-item {
            margin-bottom: 20px;
        }

        .date {
            font-size: 13px;
            color: #999;
            margin-bottom: 3px;
        }

        .degree,
        .job-title {
            font-size: 15px;
            font-weight: 600;
            color: #2c3e50;
        }

        .university,
        .company {
            font-size: 14px;
            color: #34495e;
            margin-bottom: 5px;
        }

        .description {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
        }

        .skills-list {
            list-style-type: none;
            padding: 0;
        }

        .skill-item {
            margin-bottom: 15px;
        }

        .skill-name {
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 5px;
            color: #2c3e50;
        }

        .skill-bar {
            height: 8px;
            background-color: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
        }

        .skill-level {
            height: 100%;
            background-color: #3498db;
        }

        .language-name {
            font-weight: 500;
            color: #2c3e50;
        }

        .language-level {
            font-size: 13px;
            color: #7f8c8d;
        }

        .profile-text {
            font-size: 14px;
            color: #444;
            line-height: 1.7;
        }

        .photo-container {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
            border: 3px solid #3498db;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e9ecef;
        }

        .photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .empty-message {
            font-style: italic;
            color: #aaa;
            font-size: 13px;
        }

        .active-section {
            position: relative;
            border: 2px dashed #3498db;
            border-radius: 6px;
            padding: 10px;
            background-color: #eef6fb;
            margin: -10px 0 20px;
        }

        a {
            color: #2980b9;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="resume-container">
        <div class="sidebar">
            <div class="@if ($currentStep == 1) active-section @endif">
                <div class="name-title">
                    <h1 class="name">{{ $personal_info['name'] ?? 'Your Name' }}</h1>
                    <p class="occupation">{{ $personal_info['occupation'] ?? null }}</p>
                </div>

                <div class="photo-container">
                    @if (!empty($personal_info['photo_tmp']))
                    <!-- Debug output (remove after testing) -->
                    <small style="color:red;display:block;">Debug: {{ gettype($personal_info['photo_tmp']) }} -
                        {{ substr($personal_info['photo_tmp'], 0, 30) }}...</small>

                    @if (strpos($personal_info['photo_tmp'], 'data:image') === 0)
                    <!-- Base64 image -->
                    <img src="{{ $personal_info['photo_tmp'] }}" alt="Preview"
                        style="width:100%;height:100%;object-fit:cover;">
                    @elseif(Storage::exists($personal_info['photo_tmp']))
                    <!-- File in storage -->
                    <img src="{{ asset('storage/' . $personal_info['photo_tmp']) }}" alt="Preview"
                        style="width:100%;height:100%;object-fit:cover;">
                    @else
                    <!-- Invalid path -->
                    <small style="color:red;">Error: Image not found at
                        {{ $personal_info['photo_tmp'] }}</small>
                    <i class="fas fa-user" style="font-size:40px;color:#7f8c8d;"></i>
                    @endif
                    @else
                    <!-- No photo -->
                    <i class="fas fa-user" style="font-size:40px;color:#7f8c8d;"></i>
                    @endif
                </div>

                <div class="section">
                    <h2 class="section-title">CONTACT</h2>
                    @if (!empty($personal_info['phone']))
                    <div class="contact-info">
                        <i class="fas fa-phone"></i>
                        <span>{{ $personal_info['phone'] }}</span>
                    </div>
                    @else
                    <div class="contact-info">
                        <i class="fas fa-phone"></i>
                        <span class="empty-message">(123) 456-7890</span>
                    </div>
                    @endif

                    @if (!empty($personal_info['email']))
                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <span>{{ $personal_info['email'] }}</span>
                    </div>
                    @else
                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <span class="empty-message">your.email@example.com</span>
                    </div>
                    @endif

                    @if (!empty($personal_info['address']))
                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $personal_info['address'] }}</span>
                    </div>
                    @else
                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="empty-message">City, Country</span>
                    </div>
                    @endif

                    @if (!empty($personal_info['website']))
                    <div class="contact-info">
                        <i class="fas fa-globe"></i>
                        <span>{{ $personal_info['website'] }}</span>
                    </div>
                    @else
                    <div class="contact-info">
                        <i class="fas fa-globe"></i>
                        <span class="empty-message">yourwebsite.com</span>
                    </div>
                    @endif

                    @if (!empty($personal_info['linkedin']))
                    <div class="contact-info">
                        <i class="fab fa-linkedin"></i>
                        <span>{{ $personal_info['linkedin'] }}</span>
                    </div>
                    @else
                    <div class="contact-info">
                        <i class="fab fa-linkedin"></i>
                        <span class="empty-message">linkedin.com/in/yourprofile</span>
                    </div>
                    @endif

                    @if (!empty($personal_info['github']))
                    <div class="contact-info">
                        <i class="fab fa-github"></i>
                        <span>{{ $personal_info['github'] }}</span>
                    </div>
                    @else
                    <div class="contact-info">
                        <i class="fab fa-github"></i>
                        <span class="empty-message">github.com/username</span>
                    </div>
                    @endif
                </div>
            </div>

            <div class="@if ($currentStep == 3) active-section @endif">
                <div class="section">
                    <h2 class="section-title">EDUCATION</h2>
                    @if (!empty($educations))
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
                    @else
                    <p class="empty-message">Add your education history</p>
                    @endif
                </div>
            </div>

            <div class="@if ($currentStep == 4) active-section @endif">
                <div class="section">
                    <h2 class="section-title">SKILLS</h2>
                    @if (!empty($skills))
                    <ul class="skills-list">
                        @foreach ($skills as $skill)
                        @if (!empty($skill['name']))
                        <li class="skill-item">
                            <span class="skill-name">{{ $skill['name'] }}</span>
                            @if (!empty($skill['level']))
                            <div class="skill-bar">
                                <div class="skill-level" style="width: {{ $skill['level'] }}%;"></div>
                            </div>
                            @endif
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    @else
                    <p class="empty-message">Add your skills and proficiency levels</p>
                    @endif
                </div>
            </div>

            <div class="@if ($currentStep == 6) active-section @endif">
                <div class="section">
                    <h2 class="section-title">LANGUAGES</h2>
                    @if (!empty($languages))
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
                    @else
                    <p class="empty-message">Add languages you speak</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="section">
                <h2 class="section-title">PROFILE</h2>
                @if (!empty($personal_info['summary']))
                <p class="profile-text">
                    {{ $personal_info['summary'] }}
                </p>
                @else
                <p class="empty-message">Write a brief summary about yourself and your professional background</p>
                @endif
            </div>

            <div class="@if ($currentStep == 2) active-section @endif">
                <div class="section">
                    <h2 class="section-title">WORK EXPERIENCE</h2>
                    @if (!empty($experiences))
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
                    @else
                    <p class="empty-message">Add your work experience history</p>
                    @endif
                </div>
            </div>

            <div class="@if ($currentStep == 5) active-section @endif">
                <div class="section">
                    <h2 class="section-title">PROJECTS</h2>
                    @if (!empty($projects))
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
                    @else
                    <p class="empty-message">Add projects you've worked on</p>
                    @endif
                </div>
            </div>

            <div class="@if ($currentStep == 7) active-section @endif">
                <div class="section">
                    <h2 class="section-title">CERTIFICATIONS</h2>
                    @if (!empty($certifications))
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
                    @else
                    <p class="empty-message">Add your professional certifications</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>