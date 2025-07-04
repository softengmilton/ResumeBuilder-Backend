<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $personal_info['name'] ?? 'Professional CV' }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

        :root {
            --primary: #2b579a;
            --dark: #323130;
            --gray: #605e5c;
            --light-gray: #f3f2f1;
            --white: #ffffff;
        }

        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            margin: 0;
            padding: 0;
            background-color: var(--light-gray);
        }

        .cv-container {
            max-width: 210mm;
            margin: 20px auto;
            background: var(--white);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: var(--primary);
            color: var(--white);
            padding: 30px 40px;
            display: flex;
            align-items: center;
        }

        .photo-container {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid var(--white);
            margin-right: 30px;
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
            font-size: 40px;
        }

        .header-text {
            flex-grow: 1;
        }

        .name {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 5px 0;
            text-transform: uppercase;
        }

        .title {
            font-size: 18px;
            font-weight: 400;
            margin: 0;
            opacity: 0.9;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 15px;
            font-size: 14px;
        }

        .contact-item {
            display: flex;
            align-items: center;
        }

        .contact-item i {
            margin-right: 8px;
        }

        .main-content {
            padding: 30px 40px;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
        }

        .sidebar {
            border-right: 1px solid var(--light-gray);
            padding-right: 20px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid var(--primary);
            text-transform: uppercase;
        }

        .skills-list {
            list-style-type: none;
            padding: 0;
        }

        .skill-item {
            margin-bottom: 10px;
        }

        .skill-name {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }

        .skill-bar {
            height: 6px;
            background-color: var(--light-gray);
            border-radius: 3px;
            overflow: hidden;
        }

        .skill-level {
            height: 100%;
            background-color: var(--primary);
        }

        .language-item {
            margin-bottom: 10px;
        }

        .language-name {
            font-weight: 500;
        }

        .language-level {
            font-size: 14px;
            color: var(--gray);
        }

        .education-item,
        .certification-item {
            margin-bottom: 20px;
        }

        .date {
            font-size: 14px;
            color: var(--gray);
            margin-bottom: 3px;
        }

        .degree,
        .certification-name {
            font-weight: 600;
            margin-bottom: 3px;
        }

        .institution,
        .certification-issuer {
            font-size: 14px;
            color: var(--gray);
        }

        .experience-item {
            margin-bottom: 25px;
        }

        .job-title {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 3px;
        }

        .company {
            font-weight: 500;
            margin-bottom: 5px;
        }

        .job-description {
            font-size: 14px;
            color: var(--dark);
        }

        .project-item {
            margin-bottom: 20px;
        }

        .project-name {
            font-weight: 600;
            margin-bottom: 3px;
        }

        .project-link {
            font-size: 14px;
            color: var(--primary);
            text-decoration: none;
        }

        .project-link:hover {
            text-decoration: underline;
        }

        .project-description {
            font-size: 14px;
            color: var(--dark);
            margin-top: 5px;
        }

        @media print {
            body {
                background: none;
            }

            .cv-container {
                box-shadow: none;
                margin: 0;
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }

            .photo-container {
                margin-right: 0;
                margin-bottom: 20px;
            }

            .main-content {
                grid-template-columns: 1fr;
                padding: 20px;
            }

            .sidebar {
                border-right: none;
                padding-right: 0;
                border-bottom: 1px solid var(--light-gray);
                padding-bottom: 20px;
                margin-bottom: 20px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="cv-container">
        <div class="header">
            <div class="photo-container">
                @if($photoPreview)
                <img src="{{ $photoPreview }}" alt="Profile Photo">
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
                    @if (!empty($personal_info['linkedin']))
                    <div class="contact-item">
                        <i class="fab fa-linkedin"></i>
                        <span>{{ $personal_info['linkedin'] }}</span>
                    </div>
                    @endif
                    @if (!empty($personal_info['website']))
                    <div class="contact-item">
                        <i class="fas fa-globe"></i>
                        <span>{{ $personal_info['website'] }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="sidebar">
                <div class="section">
                    <h2 class="section-title">Profile</h2>
                    @if (!empty($personal_info['summary']))
                    <p>{{ $personal_info['summary'] }}</p>
                    @else
                    <p>Professional summary highlighting key qualifications and career objectives.</p>
                    @endif
                </div>

                <div class="section">
                    <h2 class="section-title">Skills</h2>
                    @if (!empty($skills))
                    <ul class="skills-list">
                        @foreach ($skills as $skill)
                        <li class="skill-item">
                            <span class="skill-name">{{ $skill['name'] }}</span>
                            @if (!empty($skill['level']))
                            <div class="skill-bar">
                                <div class="skill-level" style="width: {{ $skill['level'] }}%;"></div>
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <p>Add your key skills and competencies</p>
                    @endif
                </div>

                <div class="section">
                    <h2 class="section-title">Languages</h2>
                    @if (!empty($languages))
                    @foreach ($languages as $language)
                    <div class="language-item">
                        <span class="language-name">{{ $language['name'] }}</span>
                        <span class="language-level">({{ $language['proficiency'] }})</span>
                    </div>
                    @endforeach
                    @else
                    <p>Add languages you speak</p>
                    @endif
                </div>

                <div class="section">
                    <h2 class="section-title">Education</h2>
                    @if (!empty($educations))
                    @foreach ($educations as $education)
                    <div class="education-item">
                        <div class="date">
                            {{ $education['start_date'] ?? '' }} - {{ $education['end_date'] ?? '' }}
                        </div>
                        <div class="degree">{{ $education['degree'] }}</div>
                        <div class="institution">{{ $education['institution'] }}</div>
                        @if (!empty($education['field_of_study']))
                        <div class="institution">Field: {{ $education['field_of_study'] }}</div>
                        @endif
                    </div>
                    @endforeach
                    @else
                    <p>Add your education history</p>
                    @endif
                </div>


            </div>

            <div class="content">
                <div class="section">
                    <h2 class="section-title">Professional Experience</h2>
                    @if (!empty($experiences))
                    @foreach ($experiences as $experience)
                    <div class="experience-item">
                        <div class="date">
                            {{ $experience['start_date'] ?? '' }} - {{ $experience['end_date'] ?? 'Present' }}
                        </div>
                        <div class="job-title">{{ $experience['job_title'] }}</div>
                        <div class="company">{{ $experience['employer'] }}</div>
                        @if (!empty($experience['description']))
                        <div class="job-description">
                            {!! nl2br(e($experience['description'])) !!}
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @else
                    <p>Add your professional work experience</p>
                    @endif
                </div>

                <div class="section">
                    <h2 class="section-title">Projects</h2>
                    @if (!empty($projects))
                    @foreach ($projects as $project)
                    <div class="project-item">
                        <div class="project-name">{{ $project['name'] }}</div>
                        @if (!empty($project['link']))
                        <a href="{{ $project['link'] }}" class="project-link" target="_blank">{{ $project['link'] }}</a>
                        @endif
                        @if (!empty($project['description']))
                        <div class="project-description">
                            {!! nl2br(e($project['description'])) !!}
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @else
                    <p>Add projects you've worked on</p>
                    @endif
                </div>

                <div class="section">
                    <h2 class="section-title">Certifications</h2>
                    @if (!empty($certifications))
                    @foreach ($certifications as $certification)
                    <div class="certification-item">
                        <div class="date">{{ $certification['date_issued'] }}</div>
                        <div class="certification-name">{{ $certification['name'] }}</div>
                        <div class="certification-issuer">{{ $certification['issuer'] }}</div>
                    </div>
                    @endforeach
                    @else
                    <p>Add your professional certifications</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>