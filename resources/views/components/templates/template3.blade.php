<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $personal_info['name'] ?? 'Professional Resume' }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap');

        :root {
            --primary: #2a4365;
            --primary-light: #4299e1;
            --secondary: #c05621;
            --accent: #9f7aea;
            --light: #f7fafc;
            --dark: #1a202c;
            --gray: #718096;
            --light-gray: #e2e8f0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background-color: #f8f5f2;
            margin: 0;
            padding: 0;
        }

        .resume-container {
            display: grid;
            grid-template-columns: 0.8fr 1.2fr;
            gap: 0;
            max-width: 210mm;
            min-height: 297mm;
            background-color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            position: relative;
        }

        .sidebar {
            background-color: var(--primary);
            padding: 40px 30px;
            color: white;
            position: relative;
            z-index: 1;
        }

        .sidebar::before {
            content: "";
            position: absolute;
            top: 0;
            right: -15px;
            width: 30px;
            height: 100%;
            background: linear-gradient(to right bottom, var(--primary) 49.5%, transparent 50.5%);
            z-index: -1;
        }

        .main-content {
            padding: 40px;
            position: relative;
        }

        .header {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--light-gray);
        }

        .name {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
            letter-spacing: 0.5px;
        }

        .title {
            font-size: 18px;
            font-weight: 500;
            color: var(--secondary);
            letter-spacing: 1px;
            position: relative;
            display: inline-block;
        }

        .title::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--accent);
        }

        .section {
            margin-bottom: 30px;
        }

        .sidebar .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 600;
            color: white;
            margin-bottom: 20px;
            padding-bottom: 10px;
            position: relative;
            letter-spacing: 1px;
        }

        .sidebar .section-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: rgba(255, 255, 255, 0.5);
        }

        .main-content .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 20px;
            padding-bottom: 8px;
            position: relative;
        }

        .main-content .section-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--accent);
        }

        .contact-info {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .contact-info i {
            margin-right: 12px;
            color: var(--primary-light);
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .photo-container {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 25px;
            border: 3px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-container i {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            background-color: var(--light-gray);
            color: var(--gray);
        }

        .education-item,
        .experience-item {
            margin-bottom: 25px;
            position: relative;
            padding-left: 25px;
        }

        .education-item::before,
        .experience-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: 5px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--accent);
        }

        .education-item::after,
        .experience-item::after {
            content: "";
            position: absolute;
            left: 4px;
            top: 15px;
            bottom: -25px;
            width: 2px;
            background-color: var(--light-gray);
        }

        .education-item:last-child::after,
        .experience-item:last-child::after {
            display: none;
        }

        .date {
            font-size: 14px;
            color: var(--secondary);
            margin-bottom: 5px;
            font-weight: 500;
        }

        .degree,
        .job-title {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 5px;
            font-size: 16px;
        }

        .university,
        .company {
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 15px;
        }

        .description {
            font-size: 14px;
            color: var(--gray);
            line-height: 1.7;
        }

        .skills-list {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-item {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 13px;
            color: white;
            display: flex;
            align-items: center;
        }

        .skill-item i {
            margin-right: 5px;
            font-size: 12px;
            color: var(--primary-light);
        }

        .language-item {
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .language-name {
            font-weight: 500;
            color: white;
            font-size: 14px;
        }

        .language-level {
            font-size: 13px;
            color: var(--primary-light);
        }

        .profile-text {
            font-size: 15px;
            color: var(--gray);
            line-height: 1.8;
        }

        .empty-message {
            font-style: italic;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        a {
            color: var(--primary-light);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a:hover {
            color: var(--accent);
            text-decoration: underline;
        }

        .tag {
            display: inline-block;
            background-color: var(--light-gray);
            color: var(--primary);
            padding: 3px 10px;
            border-radius: 4px;
            font-size: 12px;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        /* Active section highlighting */
        .active-section {
            position: relative;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(66, 153, 225, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(66, 153, 225, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(66, 153, 225, 0);
            }
        }

        /* Watermark */
        .watermark {
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-size: 12px;
            color: var(--gray);
            opacity: 0.5;
        }

        /* Project links */
        .project-link {
            display: inline-flex;
            align-items: center;
            margin-top: 5px;
            font-size: 13px;
        }

        .project-link i {
            margin-right: 5px;
            font-size: 12px;
        }

        /* Responsive adjustments */
        @media print {
            body {
                background: none;
            }

            .resume-container {
                box-shadow: none;
            }

            .active-section {
                animation: none;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="resume-container">
        <div class="sidebar">
            <div class="@if ($currentStep == 1) active-section @endif">
                <div class="photo-container">
                    @if($photoPreview)
                    <img src="{{ $photoPreview }}" alt="Profile Preview">
                    @elseif(!empty($personal_info['photo']))
                    <img src="{{ asset('storage/' . $personal_info['photo']) }}" alt="Profile Photo">
                    @else
                    <i class="fas fa-user"></i>
                    @endif
                </div>

                <div class="section">
                    <h2 class="section-title">CONTACT</h2>
                    @if (!empty($personal_info['name']))
                    <div class="contact-info">
                        <i class="fas fa-user"></i>
                        <span>{{ $personal_info['name'] }}</span>
                    </div>
                    @endif

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
                        <span><a href="{{ $personal_info['website'] }}" target="_blank">{{ $personal_info['website'] }}</a></span>
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
                        <span><a href="{{ $personal_info['linkedin'] }}" target="_blank">{{ $personal_info['linkedin'] }}</a></span>
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
                        <span><a href="{{ $personal_info['github'] }}" target="_blank">{{ $personal_info['github'] }}</a></span>
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
                        @if (!empty($education['degree']))
                        <p class="degree" style="color: white;">{{ $education['degree'] }}</p>
                        @endif
                        @if (!empty($education['institution']))
                        <p class="university" style="color: rgba(255,255,255,0.8);">{{ $education['institution'] }}</p>
                        @endif
                        @if (!empty($education['start_date']) || !empty($education['end_date']))
                        <p class="date" style="color: var(--primary-light);">
                            {{ $education['start_date'] ?? '' }} - {{ $education['end_date'] ?? '' }}
                        </p>
                        @endif
                        @if (!empty($education['field_of_study']))
                        <p class="description" style="color: rgba(255,255,255,0.7);">
                            {{ $education['field_of_study'] }}
                        </p>
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
                            <i class="fas fa-check-circle"></i>
                            {{ $skill['name'] }}
                            @if (!empty($skill['level']))
                            <span style="margin-left: 5px; font-size: 12px;">({{ $skill['level'] }}%)</span>
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
                        <span class="language-level">{{ $language['proficiency'] }}</span>
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
            <div class="header">
                <h1 class="name">{{ $personal_info['name'] ?? 'Your Name' }}</h1>
                @if (!empty($personal_info['occupation']))
                <p class="title">{{ $personal_info['occupation'] }}</p>
                @else
                <p class="title">Professional Title</p>
                @endif
            </div>

            @if (!empty($personal_info['summary']))
            <div class="section">
                <h2 class="section-title">PROFILE</h2>
                <p class="profile-text">{{ $personal_info['summary'] }}</p>
            </div>
            @endif

            <div class="@if ($currentStep == 2) active-section @endif">
                <div class="section">
                    <h2 class="section-title">EXPERIENCE</h2>
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
                            {{ $experience['start_date'] ?? '' }} - {{ $experience['end_date'] ?? 'Present' }}
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
                    <p class="empty-message" style="color: var(--gray);">Add your work experience history</p>
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
                        <div class="project-link">
                            <i class="fas fa-external-link-alt"></i>
                            <a href="{{ $project['link'] }}" target="_blank">View Project</a>
                        </div>
                        @endif
                        @if (!empty($project['description']))
                        <div class="description">
                            {!! nl2br(e($project['description'])) !!}
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @else
                    <p class="empty-message" style="color: var(--gray);">Add projects you've worked on</p>
                    @endif
                </div>
            </div>

            <div class="@if ($currentStep == 7) active-section @endif">
                <div class="section">
                    <h2 class="section-title">CERTIFICATIONS</h2>
                    @if (!empty($certifications))
                    @foreach ($certifications as $certification)
                    <div class="education-item">
                        @if (!empty($certification['name']))
                        <p class="degree">{{ $certification['name'] }}</p>
                        @endif
                        @if (!empty($certification['issuer']))
                        <p class="university">{{ $certification['issuer'] }}</p>
                        @endif
                        @if (!empty($certification['date_issued']))
                        <p class="date">{{ $certification['date_issued'] }}</p>
                        @endif
                    </div>
                    @endforeach
                    @else
                    <p class="empty-message" style="color: var(--gray);">Add your professional certifications</p>
                    @endif
                </div>
            </div>

            <div class="watermark">
                Created with Enhance CV
            </div>
        </div>
    </div>
</body>

</html>