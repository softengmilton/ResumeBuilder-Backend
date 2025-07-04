<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $personal_info['name'] ?? 'Professional Resume' }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

        body {
            background: #f4f6f8;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 30px;
            color: #333;
        }

        .resume-container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 15px;
            overflow: hidden;
        }

        .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .name {
            font-size: 28px;
            font-weight: 700;
            text-transform: uppercase;
            margin: 0;
        }

        .title {
            font-size: 16px;
            color: #555;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: #1e1e1e;
            margin-bottom: 15px;
            border-bottom: 2px solid #eee;
            padding-bottom: 5px;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            font-size: 14px;
            color: #555;
        }

        .contact-info div {
            display: flex;
            align-items: center;
        }

        .contact-info i {
            margin-right: 8px;
            color: #999;
        }

        .date {
            font-size: 14px;
            color: #888;
        }

        .job-title,
        .degree {
            font-weight: 600;
            color: #2c3e50;
        }

        .company,
        .university {
            font-weight: 500;
            color: #555;
        }

        .description {
            font-size: 14px;
            color: #444;
            margin-top: 5px;
        }

        .skills-list,
        .language-item {
            margin-bottom: 10px;
        }

        .skill-bar {
            height: 6px;
            background-color: #e9ecef;
            border-radius: 3px;
            margin-top: 4px;
            overflow: hidden;
        }

        .skill-level {
            height: 100%;
            background-color: #3498db;
        }

        .empty-message {
            color: #aaa;
            font-style: italic;
        }

        .main-content {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }

        .left-column {
            flex: 1 1 35%;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .right-column {
            flex: 1 1 60%;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        @media screen and (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }

            .left-column,
            .right-column {
                flex: 1 1 100%;
            }
        }

        a {
            color: #3498db;
            text-decoration: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="resume-container">
        <div class="header">
            <div class="photo-container">
                @if($photoPreview)
                <!-- New photo preview (temporary upload) -->
                <img
                    src="{{ $photoPreview }}"
                    alt="Profile Preview"
                    class="w-full h-full object-cover">
                @elseif(!empty($personal_info['photo']))
                <!-- Existing stored photo -->
                <img
                    src="{{ asset('storage/' . $personal_info['photo']) }}"
                    alt="Profile Photo"
                    class="w-full h-full object-cover">
                @else
                <!-- Default placeholder when no photo exists -->
                <i class="fas fa-user" style="font-size:40px;color:#7f8c8d;"></i>
                @endif
            </div>
            <h1 class="name">{{ $personal_info['name'] ?? 'Your Name' }}</h1>
            <p class="title">{{ $personal_info['summary'] ?? 'Professional Title' }}</p>
        </div>

        <div class="section">
            <h2 class="section-title">Profile</h2>
            <p class="description">{{ $personal_info['summary'] ?? 'Write a brief summary about yourself and your professional background' }}</p>
        </div>

        <div class="main-content">
            <!-- Left Column -->
            <div class="left-column">
                <div class="section">
                    <h2 class="section-title">Contact</h2>
                    <div class="contact-info">
                        <div><i class="fas fa-phone"></i> {{ $personal_info['phone'] ?? '(123) 456-7890' }}</div>
                        <div><i class="fas fa-envelope"></i> {{ $personal_info['email'] ?? 'your.email@example.com' }}</div>
                        <div><i class="fas fa-map-marker-alt"></i> {{ $personal_info['address'] ?? 'City, Country' }}</div>
                        <div><i class="fas fa-globe"></i> {{ $personal_info['website'] ?? 'yourwebsite.com' }}</div>
                        <div><i class="fab fa-linkedin"></i> {{ $personal_info['linkedin'] ?? 'linkedin.com/in/yourprofile' }}</div>
                        <div><i class="fab fa-github"></i> {{ $personal_info['github'] ?? 'github.com/username' }}</div>
                    </div>
                </div>

                <div class="section">
                    <h2 class="section-title">Skills</h2>
                    @if (!empty($skills))
                    @foreach ($skills as $skill)
                    <div class="skills-list">
                        <span>{{ $skill['name'] }}</span>
                        @if (!empty($skill['level']))
                        <div class="skill-bar">
                            <div class="skill-level" style="width: {{ $skill['level'] }}%;"></div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @else
                    <p class="empty-message">Add your skills and proficiency levels</p>
                    @endif
                </div>

                <div class="section">
                    <h2 class="section-title">Languages</h2>
                    @if (!empty($languages))
                    @foreach ($languages as $language)
                    <div class="language-item">
                        <strong>{{ $language['name'] }}</strong>
                        <span>({{ $language['proficiency'] }})</span>
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
                    <p class="empty-message">Add your professional certifications</p>
                    @endif
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <div class="section">
                    <h2 class="section-title">Work Experience</h2>
                    @if (!empty($experiences))
                    @foreach ($experiences as $experience)
                    <div class="experience-item">
                        <p class="job-title">{{ $experience['job_title'] ?? '' }}</p>
                        <p class="company">{{ $experience['employer'] ?? '' }}</p>
                        <p class="date">{{ $experience['start_date'] ?? '' }} - {{ $experience['end_date'] ?? '' }}</p>
                        <p class="description">{!! nl2br(e($experience['description'] ?? '')) !!}</p>
                    </div>
                    @endforeach
                    @else
                    <p class="empty-message">Add your work experience history</p>
                    @endif
                </div>

                <div class="section">
                    <h2 class="section-title">Education</h2>
                    @if (!empty($educations))
                    @foreach ($educations as $education)
                    <div class="education-item">
                        <p class="date">{{ $education['start_date'] ?? '' }} - {{ $education['end_date'] ?? '' }}</p>
                        <p class="degree">{{ $education['degree'] ?? '' }}</p>
                        <p class="university">{{ $education['institution'] ?? '' }}</p>
                        <p class="description">Field: {{ $education['field_of_study'] ?? '' }}</p>
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
                        <p class="company"><a href="{{ $project['link'] }}" target="_blank">{{ $project['link'] }}</a></p>
                        <p class="description">{!! nl2br(e($project['description'])) !!}</p>
                    </div>
                    @endforeach
                    @else
                    <p class="empty-message">Add projects you've worked on</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>