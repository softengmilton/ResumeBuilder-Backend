<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $personal_info['name'] ?? 'Professional Resume' }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap');

        :root {
            --primary: #2563eb;
            --primary-light: #93c5fd;
            --secondary: #7c3aed;
            --accent: #10b981;
            --light: #f8fafc;
            --dark: #0f172a;
            --gray: #64748b;
            --light-gray: #e2e8f0;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background-color: #f1f5f9;
            margin: 0;
            padding: 0;
        }

        .resume-container {
            display: grid;
            grid-template-columns: 1fr;
            max-width: 210mm;
            min-height: 297mm;
            background-color: white;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            position: relative;
        }

        /* Compact Header Styles */
        .header-section {
            background-color: var(--primary);
            color: white;
            padding: 30px 40px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .header-section::before {
            content: "";
            position: absolute;
            top: -30px;
            right: -30px;
            width: 150px;
            height: 150px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .header-section::after {
            content: "";
            position: absolute;
            bottom: -60px;
            left: -60px;
            width: 150px;
            height: 150px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .header-content {
            display: flex;
            align-items: center;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .photo-container {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 25px;
            border: 3px solid white;
            box-shadow: var(--card-shadow);
            flex-shrink: 0;
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
            font-size: 30px;
        }

        .header-text {
            flex: 1;
        }

        .name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .title {
            font-size: 16px;
            font-weight: 400;
            opacity: 0.9;
        }

        /* Rest of the styles remain the same */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            padding: 40px;
        }

        .left-column {
            border-right: 1px solid var(--light-gray);
            padding-right: 30px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 18px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid var(--light-gray);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .contact-info {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .contact-info i {
            margin-right: 12px;
            color: var(--primary);
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .skills-list {
            list-style-type: none;
            padding: 0;
        }

        .skill-item {
            margin-bottom: 12px;
        }

        .skill-name {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .skill-bar {
            height: 8px;
            background-color: var(--light-gray);
            border-radius: 4px;
            overflow: hidden;
        }

        .skill-level {
            height: 100%;
            background-color: var(--primary);
            border-radius: 4px;
        }

        .language-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .language-name {
            font-weight: 500;
        }

        .language-level {
            color: var(--gray);
            font-size: 13px;
        }

        .education-item,
        .experience-item,
        .project-item {
            margin-bottom: 25px;
            position: relative;
            padding-left: 20px;
        }

        .education-item::before,
        .experience-item::before,
        .project-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: 8px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: var(--primary);
        }

        .date {
            font-size: 14px;
            color: var(--gray);
            margin-bottom: 5px;
            font-weight: 500;
        }

        .degree,
        .job-title,
        .project-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
            font-size: 16px;
        }

        .university,
        .company {
            font-weight: 500;
            color: var(--primary);
            margin-bottom: 8px;
            font-size: 15px;
        }

        .description {
            font-size: 14px;
            color: var(--gray);
            line-height: 1.7;
        }

        .profile-text {
            font-size: 15px;
            color: var(--dark);
            line-height: 1.8;
            background-color: rgba(37, 99, 235, 0.05);
            padding: 15px;
            border-radius: 8px;
            border-left: 3px solid var(--primary);
        }

        .empty-message {
            font-style: italic;
            color: var(--gray);
            font-size: 14px;
        }

        a {
            color: var(--primary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a:hover {
            color: var(--secondary);
            text-decoration: underline;
        }

        .tag {
            display: inline-block;
            background-color: var(--light-gray);
            color: var(--dark);
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 12px;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .project-link {
            display: inline-flex;
            align-items: center;
            margin-top: 8px;
            font-size: 13px;
        }

        .project-link i {
            margin-right: 5px;
            font-size: 12px;
        }

        .certification-item {
            display: flex;
            margin-bottom: 15px;
        }

        .cert-icon {
            margin-right: 10px;
            color: var(--accent);
            font-size: 18px;
        }

        .cert-details {
            flex: 1;
        }

        .watermark {
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-size: 12px;
            color: var(--gray);
            opacity: 0.5;
        }

        /* Responsive adjustments */
        @media print {
            body {
                background: none;
            }

            .resume-container {
                box-shadow: none;
            }
        }

        /* Highlight active section */
        .active-section {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 99, 235, 0.2);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(37, 99, 235, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 99, 235, 0);
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="resume-container">
        <div class="header-section">
            <div class="header-content">
                <div class="photo-container">
                    @if($photoPreview)
                    <img src="{{ $photoPreview }}" alt="Profile Preview">
                    @elseif(!empty($personal_info['photo']))
                    <img src="{{ asset('storage/' . $personal_info['photo']) }}" alt="Profile Photo">
                    @else
                    <i class="fas fa-user"></i>
                    @endif
                </div>
                <div class="header-text">
                    <h1 class="name">{{ $personal_info['name'] ?? 'Your Name' }}</h1>
                    <p class="title">{{ $personal_info['occupation'] ?? 'Professional Title' }}</p>
                </div>
            </div>
        </div>

        <!-- Rest of the content remains the same -->
        <div class="content-grid">
            <div class="left-column">
                @if (!empty($personal_info['summary']))
                <div class="section">
                    <h2 class="section-title">About Me</h2>
                    <p class="profile-text">{{ $personal_info['summary'] }}</p>
                </div>
                @endif

                <div class="@if ($currentStep == 1) active-section @endif">
                    <div class="section">
                        <h2 class="section-title">Contact</h2>
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
                            <span><a href="{{ $personal_info['website'] }}" target="_blank">Website</a></span>
                        </div>
                        @endif

                        @if (!empty($personal_info['linkedin']))
                        <div class="contact-info">
                            <i class="fab fa-linkedin"></i>
                            <span><a href="{{ $personal_info['linkedin'] }}" target="_blank">LinkedIn</a></span>
                        </div>
                        @endif

                        @if (!empty($personal_info['github']))
                        <div class="contact-info">
                            <i class="fab fa-github"></i>
                            <span><a href="{{ $personal_info['github'] }}" target="_blank">GitHub</a></span>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="@if ($currentStep == 4) active-section @endif">
                    <div class="section">
                        <h2 class="section-title">Skills</h2>
                        @if (!empty($skills))
                        <ul class="skills-list">
                            @foreach ($skills as $skill)
                            @if (!empty($skill['name']))
                            <li class="skill-item">
                                <span class="skill-name">{{ $skill['name'] }}</span>
                                <div class="skill-bar">
                                    <div class="skill-level" style="width: {{ $skill['level'] ?? 70 }}%;"></div>
                                </div>
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
                        <h2 class="section-title">Languages</h2>
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

            <div class="right-column">
                <div class="@if ($currentStep == 2) active-section @endif">
                    <div class="section">
                        <h2 class="section-title">Experience</h2>
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
                        <p class="empty-message">Add your work experience history</p>
                        @endif
                    </div>
                </div>

                <div class="@if ($currentStep == 3) active-section @endif">
                    <div class="section">
                        <h2 class="section-title">Education</h2>
                        @if (!empty($educations))
                        @foreach ($educations as $education)
                        <div class="education-item">
                            @if (!empty($education['degree']))
                            <p class="degree">{{ $education['degree'] }}</p>
                            @endif
                            @if (!empty($education['institution']))
                            <p class="university">{{ $education['institution'] }}</p>
                            @endif
                            @if (!empty($education['start_date']) || !empty($education['end_date']))
                            <p class="date">
                                {{ $education['start_date'] ?? '' }} - {{ $education['end_date'] ?? 'Present' }}
                            </p>
                            @endif
                            @if (!empty($education['field_of_study']))
                            <p class="description">
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

                <div class="@if ($currentStep == 5) active-section @endif">
                    <div class="section">
                        <h2 class="section-title">Projects</h2>
                        @if (!empty($projects))
                        @foreach ($projects as $project)
                        <div class="project-item">
                            @if (!empty($project['name']))
                            <p class="project-title">{{ $project['name'] }}</p>
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
                        <p class="empty-message">Add projects you've worked on</p>
                        @endif
                    </div>
                </div>

                <div class="@if ($currentStep == 7) active-section @endif">
                    <div class="section">
                        <h2 class="section-title">Certifications</h2>
                        @if (!empty($certifications))
                        @foreach ($certifications as $certification)
                        <div class="certification-item">
                            <div class="cert-icon">
                                <i class="fas fa-certificate"></i>
                            </div>
                            <div class="cert-details">
                                @if (!empty($certification['name']))
                                <p class="degree">{{ $certification['name'] }}</p>
                                @endif
                                @if (!empty($certification['issuer']))
                                <p class="company">{{ $certification['issuer'] }}</p>
                                @endif
                                @if (!empty($certification['date_issued']))
                                <p class="date">{{ $certification['date_issued'] }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p class="empty-message">Add your professional certifications</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="watermark">
            Created with Enhance CV
        </div>
    </div>
</body>

</html>