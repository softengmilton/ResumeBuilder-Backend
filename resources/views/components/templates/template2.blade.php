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
            background: #f8f5f2;
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 40px;
            color: var(--dark);
        }

        .resume-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }

        .resume-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--accent));
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
            padding-bottom: 30px;
        }

        .header::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: var(--accent);
        }

        .photo-container {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
            border: 4px solid white;
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
            font-size: 50px;
        }

        .name {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 700;
            color: var(--primary);
            margin: 10px 0 5px;
            letter-spacing: 0.5px;
        }

        .title {
            font-size: 18px;
            font-weight: 500;
            color: var(--secondary);
            letter-spacing: 1px;
        }

        .section {
            margin-bottom: 35px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 20px;
            padding-bottom: 8px;
            position: relative;
        }

        .section-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--accent);
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            font-size: 15px;
        }

        .contact-item i {
            margin-right: 12px;
            color: var(--primary-light);
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .main-content {
            display: flex;
            gap: 50px;
        }

        .left-column {
            flex: 1;
            max-width: 300px;
        }

        .right-column {
            flex: 2;
        }

        .experience-item,
        .education-item {
            margin-bottom: 25px;
            position: relative;
            padding-left: 25px;
        }

        .experience-item::before,
        .education-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: 5px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--accent);
        }

        .experience-item::after,
        .education-item::after {
            content: "";
            position: absolute;
            left: 4px;
            top: 15px;
            bottom: -25px;
            width: 2px;
            background-color: var(--light-gray);
        }

        .experience-item:last-child::after,
        .education-item:last-child::after {
            display: none;
        }

        .date {
            font-size: 14px;
            color: var(--secondary);
            margin-bottom: 5px;
            font-weight: 500;
        }

        .job-title,
        .degree {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 5px;
            font-size: 16px;
        }

        .company,
        .university {
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 15px;
        }

        .description {
            font-size: 15px;
            color: var(--gray);
            line-height: 1.7;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-item {
            background-color: var(--primary);
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
        }

        .language-name {
            font-weight: 500;
            font-size: 15px;
        }

        .language-level {
            font-size: 14px;
            color: var(--secondary);
        }

        .empty-message {
            color: var(--gray);
            font-style: italic;
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

        .project-link {
            display: inline-flex;
            align-items: center;
            margin-top: 5px;
            font-size: 14px;
        }

        .project-link i {
            margin-right: 5px;
            font-size: 12px;
        }

        .watermark {
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-size: 12px;
            color: var(--gray);
            opacity: 0.5;
        }

        @media screen and (max-width: 768px) {
            .resume-container {
                padding: 30px;
            }

            .main-content {
                flex-direction: column;
            }

            .left-column {
                max-width: 100%;
            }
        }

        @media print {
            body {
                background: none;
                padding: 0;
            }

            .resume-container {
                box-shadow: none;
                padding: 20px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="resume-container">
        <div class="header">
            <div class="photo-container">
                @if($photoPreview)
                <img src="{{ $photoPreview }}" alt="Profile Preview">
                @elseif(!empty($personal_info['photo']))
                <img src="{{ asset('storage/' . $personal_info['photo']) }}" alt="Profile Photo">
                @else
                <i class="fas fa-user"></i>
                @endif
            </div>
            <h1 class="name">{{ $personal_info['name'] ?? 'Your Name' }}</h1>
            <p class="title">{{ $personal_info['occupation'] ?? 'Professional Title' }}</p>
        </div>

        <div class="main-content">
            <!-- Left Column -->
            <div class="left-column">
                <div class="section">
                    <h2 class="section-title">Contact</h2>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>{{ $personal_info['phone'] ?? '(123) 456-7890' }}</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>{{ $personal_info['email'] ?? 'your.email@example.com' }}</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $personal_info['address'] ?? 'City, Country' }}</span>
                        </div>
                        @if (!empty($personal_info['website']))
                        <div class="contact-item">
                            <i class="fas fa-globe"></i>
                            <a href="{{ $personal_info['website'] }}" target="_blank">{{ $personal_info['website'] }}</a>
                        </div>
                        @endif
                        @if (!empty($personal_info['linkedin']))
                        <div class="contact-item">
                            <i class="fab fa-linkedin"></i>
                            <a href="{{ $personal_info['linkedin'] }}" target="_blank">{{ $personal_info['linkedin'] }}</a>
                        </div>
                        @endif
                        @if (!empty($personal_info['github']))
                        <div class="contact-item">
                            <i class="fab fa-github"></i>
                            <a href="{{ $personal_info['github'] }}" target="_blank">{{ $personal_info['github'] }}</a>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="section">
                    <h2 class="section-title">Skills</h2>
                    @if (!empty($skills))
                    <div class="skills-list">
                        @foreach ($skills as $skill)
                        @if (!empty($skill['name']))
                        <div class="skill-item">
                            <i class="fas fa-check-circle"></i>
                            {{ $skill['name'] }}
                            @if (!empty($skill['level']))
                            <span style="margin-left: 5px;">{{ $skill['level'] }}%</span>
                            @endif
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @else
                    <p class="empty-message">Add your skills</p>
                    @endif
                </div>

                <div class="section">
                    <h2 class="section-title">Languages</h2>
                    @if (!empty($languages))
                    @foreach ($languages as $language)
                    <div class="language-item">
                        <span class="language-name">{{ $language['name'] }}</span>
                        <span class="language-level">{{ $language['proficiency'] }}</span>
                    </div>
                    @endforeach
                    @else
                    <p class="empty-message">Add languages you speak</p>
                    @endif
                </div>

                <div class="section">
                    <h2 class="section-title">Certifications</h2>
                    @if (!empty($certifications))
                    @foreach ($certifications as $certification)
                    <div class="education-item">
                        <p class="date">{{ $certification['date_issued'] }}</p>
                        <p class="degree">{{ $certification['name'] }}</p>
                        <p class="university">{{ $certification['issuer'] }}</p>
                    </div>
                    @endforeach
                    @else
                    <p class="empty-message">Add your certifications</p>
                    @endif
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-column">
                @if (!empty($personal_info['summary']))
                <div class="section">
                    <h2 class="section-title">Profile</h2>
                    <p class="description">{{ $personal_info['summary'] }}</p>
                </div>
                @endif

                <div class="section">
                    <h2 class="section-title">Experience</h2>
                    @if (!empty($experiences))
                    @foreach ($experiences as $experience)
                    <div class="experience-item">
                        <p class="job-title">{{ $experience['job_title'] }}</p>
                        <p class="company">{{ $experience['employer'] }}</p>
                        <p class="date">
                            {{ $experience['start_date'] ?? '' }} - {{ $experience['end_date'] ?? 'Present' }}
                        </p>
                        @if (!empty($experience['description']))
                        <div class="description">
                            {!! nl2br(e($experience['description'])) !!}
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @else
                    <p class="empty-message">Add your work experience</p>
                    @endif
                </div>

                <div class="section">
                    <h2 class="section-title">Education</h2>
                    @if (!empty($educations))
                    @foreach ($educations as $education)
                    <div class="education-item">
                        <p class="degree">{{ $education['degree'] }}</p>
                        <p class="university">{{ $education['institution'] }}</p>
                        <p class="date">
                            {{ $education['start_date'] ?? '' }} - {{ $education['end_date'] ?? '' }}
                        </p>
                        @if (!empty($education['field_of_study']))
                        <p class="description">Field: {{ $education['field_of_study'] }}</p>
                        @endif
                    </div>
                    @endforeach
                    @else
                    <p class="empty-message">Add your education history</p>
                    @endif
                </div>

                <div class="section">
                    <h2 class="section-title">Projects</h2>
                    @if (!empty($projects))
                    @foreach ($projects as $project)
                    <div class="experience-item">
                        <p class="job-title">{{ $project['name'] }}</p>
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
        </div>

        <div class="watermark">
            Created with Enhance CV
        </div>
    </div>
</body>

</html>