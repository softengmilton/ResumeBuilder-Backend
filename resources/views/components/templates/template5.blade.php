<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $personal_info['name'] ?? 'Professional Resume' }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap');

        :root {
            --primary: #3b82f6;
            --primary-light: #93c5fd;
            --primary-dark: #1d4ed8;
            --secondary: #10b981;
            --accent: #8b5cf6;
            --light: #f8fafc;
            --dark: #0f172a;
            --gray: #64748b;
            --light-gray: #e2e8f0;
            --border: 1px solid #e2e8f0;
        }

        body {
            font-family: 'Figtree', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
        }

        .resume-container {
            max-width: 210mm;
            min-height: 297mm;
            background-color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            position: relative;
        }

        /* Header Section */
        .header-section {
            display: flex;
            padding: 40px;
            border-bottom: var(--border);
        }

        .photo-container {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            overflow: hidden;
            margin-right: 30px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
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
            font-size: 36px;
        }

        .header-text {
            flex: 1;
        }

        .name {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 32px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .title {
            font-size: 16px;
            font-weight: 500;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: var(--gray);
        }

        .contact-item i {
            margin-right: 8px;
            color: var(--primary);
            font-size: 14px;
        }

        /* Main Content */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
        }

        .left-column {
            padding: 30px;
            border-right: var(--border);
        }

        .right-column {
            padding: 30px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
            padding-bottom: 8px;
            position: relative;
        }

        .section-title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 3px;
            background-color: var(--primary);
        }

        .profile-text {
            font-size: 15px;
            color: var(--gray);
            line-height: 1.7;
        }

        /* Experience & Education Items */
        .timeline-item {
            position: relative;
            padding-left: 25px;
            margin-bottom: 25px;
        }

        .timeline-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: var(--primary);
            border: 2px solid var(--primary-light);
        }

        .timeline-item::after {
            content: "";
            position: absolute;
            left: 5px;
            top: 17px;
            bottom: -25px;
            width: 2px;
            background-color: var(--light-gray);
        }

        .timeline-item:last-child::after {
            display: none;
        }

        .item-header {
            margin-bottom: 8px;
        }

        .item-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 3px;
            font-size: 16px;
        }

        .item-subtitle {
            font-weight: 500;
            color: var(--primary);
            font-size: 14px;
        }

        .item-date {
            font-size: 13px;
            color: var(--gray);
            margin-bottom: 8px;
        }

        .item-description {
            font-size: 14px;
            color: var(--gray);
            line-height: 1.7;
        }

        /* Skills */
        .skills-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .skill-category {
            margin-bottom: 15px;
        }

        .skill-category-title {
            font-weight: 600;
            font-size: 14px;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .skill-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 8px 0;
        }

        .skill-tag {
            background-color: var(--light-gray);
            color: var(--dark);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
        }

        /* Languages */
        .language-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .language-name {
            font-weight: 500;
            font-size: 14px;
        }

        .language-level {
            color: var(--gray);
            font-size: 13px;
        }

        /* Projects */
        .project-item {
            margin-bottom: 20px;
        }

        .project-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
            font-size: 16px;
        }

        .project-link {
            display: inline-flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 13px;
            color: var(--primary);
        }

        .project-link i {
            margin-right: 5px;
            font-size: 12px;
        }

        /* Certifications */
        .certification-item {
            display: flex;
            margin-bottom: 15px;
        }

        .cert-icon {
            margin-right: 12px;
            color: var(--secondary);
            font-size: 18px;
        }

        .cert-details {
            flex: 1;
        }

        .cert-name {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 3px;
            font-size: 15px;
        }

        .cert-issuer {
            font-size: 13px;
            color: var(--gray);
        }

        .cert-date {
            font-size: 12px;
            color: var(--gray);
            margin-top: 3px;
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

        /* Active Section Highlight */
        .active-section {
            position: relative;
        }

        .active-section::before {
            content: "";
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border: 2px dashed var(--primary);
            border-radius: 5px;
            animation: pulseBorder 2s infinite;
        }

        @keyframes pulseBorder {
            0% {
                opacity: 0.3;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0.3;
            }
        }

        /* Responsive adjustments */
        @media print {
            body {
                background: none;
            }

            .resume-container {
                box-shadow: none;
            }

            .active-section::before {
                display: none;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="resume-container">
        <!-- Header Section -->
        <div class="header-section">
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

                <div class="contact-info">
                    @if (!empty($personal_info['phone']))
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>{{ $personal_info['phone'] }}</span>
                    </div>
                    @endif

                    @if (!empty($personal_info['email']))
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>{{ $personal_info['email'] }}</span>
                    </div>
                    @endif

                    @if (!empty($personal_info['address']))
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $personal_info['address'] }}</span>
                    </div>
                    @endif

                    @if (!empty($personal_info['website']))
                    <div class="contact-item">
                        <i class="fas fa-globe"></i>
                        <a href="{{ $personal_info['website'] }}" target="_blank">Website</a>
                    </div>
                    @endif

                    @if (!empty($personal_info['linkedin']))
                    <div class="contact-item">
                        <i class="fab fa-linkedin"></i>
                        <a href="{{ $personal_info['linkedin'] }}" target="_blank">LinkedIn</a>
                    </div>
                    @endif

                    @if (!empty($personal_info['github']))
                    <div class="contact-item">
                        <i class="fab fa-github"></i>
                        <a href="{{ $personal_info['github'] }}" target="_blank">GitHub</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content-grid">
            <!-- Left Column -->
            <div class="left-column">
                @if (!empty($personal_info['summary']))
                <div class="section @if ($currentStep == 1) active-section @endif">
                    <h2 class="section-title">Profile</h2>
                    <p class="profile-text">{{ $personal_info['summary'] }}</p>
                </div>
                @endif

                <div class="section @if ($currentStep == 4) active-section @endif">
                    <h2 class="section-title">Skills</h2>
                    @if (!empty($skills))
                    <div class="skills-grid">
                        @foreach (array_chunk($skills, ceil(count($skills)/2)) as $skillChunk)
                        <div class="skill-category">
                            @foreach ($skillChunk as $skill)
                            @if (!empty($skill['name']))
                            <div class="skill-tags">
                                <span class="skill-tag">
                                    {{ $skill['name'] }}
                                    @if (!empty($skill['level']))
                                    <span style="color: var(--gray); font-size: 11px;">({{ $skill['level'] }}%)</span>
                                    @endif
                                </span>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="empty-message">Add your skills and proficiency levels</p>
                    @endif
                </div>

                <div class="section @if ($currentStep == 6) active-section @endif">
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
                <div class="section @if ($currentStep == 7) active-section @endif">
                    <h2 class="section-title">Certifications</h2>
                    @if (!empty($certifications))
                    @foreach ($certifications as $certification)
                    <div class="certification-item">
                        <div class="cert-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="cert-details">
                            @if (!empty($certification['name']))
                            <h3 class="cert-name">{{ $certification['name'] }}</h3>
                            @endif
                            @if (!empty($certification['issuer']))
                            <p class="cert-issuer">{{ $certification['issuer'] }}</p>
                            @endif
                            @if (!empty($certification['date_issued']))
                            <p class="cert-date">{{ $certification['date_issued'] }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class="empty-message">Add your professional certifications</p>
                    @endif
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <div class="section @if ($currentStep == 2) active-section @endif">
                    <h2 class="section-title">Experience</h2>
                    @if (!empty($experiences))
                    @foreach ($experiences as $experience)
                    <div class="timeline-item">
                        <div class="item-header">
                            @if (!empty($experience['job_title']))
                            <h3 class="item-title">{{ $experience['job_title'] }}</h3>
                            @endif
                            @if (!empty($experience['employer']))
                            <p class="item-subtitle">{{ $experience['employer'] }}</p>
                            @endif
                        </div>
                        @if (!empty($experience['start_date']) || !empty($experience['end_date']))
                        <p class="item-date">
                            {{ $experience['start_date'] ?? '' }} - {{ $experience['end_date'] ?? 'Present' }}
                        </p>
                        @endif
                        @if (!empty($experience['description']))
                        <div class="item-description">
                            {!! nl2br(e($experience['description'])) !!}
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @else
                    <p class="empty-message">Add your work experience history</p>
                    @endif
                </div>

                <div class="section @if ($currentStep == 3) active-section @endif">
                    <h2 class="section-title">Education</h2>
                    @if (!empty($educations))
                    @foreach ($educations as $education)
                    <div class="timeline-item">
                        <div class="item-header">
                            @if (!empty($education['degree']))
                            <h3 class="item-title">{{ $education['degree'] }}</h3>
                            @endif
                            @if (!empty($education['institution']))
                            <p class="item-subtitle">{{ $education['institution'] }}</p>
                            @endif
                        </div>
                        @if (!empty($education['start_date']) || !empty($education['end_date']))
                        <p class="item-date">
                            {{ $education['start_date'] ?? '' }} - {{ $education['end_date'] ?? 'Present' }}
                        </p>
                        @endif
                        @if (!empty($education['field_of_study']))
                        <div class="item-description">
                            {{ $education['field_of_study'] }}
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @else
                    <p class="empty-message">Add your education history</p>
                    @endif
                </div>

                <div class="section @if ($currentStep == 5) active-section @endif">
                    <h2 class="section-title">Projects</h2>
                    @if (!empty($projects))
                    @foreach ($projects as $project)
                    <div class="project-item">
                        @if (!empty($project['name']))
                        <h3 class="project-title">{{ $project['name'] }}</h3>
                        @endif
                        @if (!empty($project['link']))
                        <a href="{{ $project['link'] }}" target="_blank" class="project-link">
                            <i class="fas fa-external-link-alt"></i>
                            View Project
                        </a>
                        @endif
                        @if (!empty($project['description']))
                        <div class="item-description">
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
        </div>

        <div class="watermark">
            Created with Enhance CV
        </div>
    </div>
</body>

</html>