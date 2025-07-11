<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $personal_info['name'] ?? 'Resume' }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f4f6f8;
            color: #333;
        }

        .cv-container {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
            background: #fff;
            max-width: 1200px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .sidebar {
            background-color: #212a3e;
            color: #fff;
            padding: 30px 20px;
        }

        .sidebar h2 {
            color: #00c8ff;
            font-size: 20px;
            margin-top: 30px;
            border-bottom: 1px solid #00c8ff;
            padding-bottom: 5px;
        }

        .sidebar .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px auto;
            border: 3px solid #00c8ff;
        }

        .sidebar .profile-pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sidebar .name {
            text-align: center;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .sidebar .title {
            text-align: center;
            font-size: 14px;
            color: #a0aec0;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            font-size: 14px;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .main {
            padding: 40px;
        }

        .main h2 {
            font-size: 20px;
            color: #212a3e;
            border-bottom: 2px solid #00c8ff;
            padding-bottom: 4px;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 40px;
        }

        .experience-item,
        .education-item,
        .project-item {
            margin-bottom: 25px;
        }

        .job-title,
        .project-name,
        .education-degree {
            font-weight: 600;
            font-size: 16px;
            color: #212a3e;
        }

        .company,
        .education-institution {
            font-style: italic;
            font-size: 14px;
            color: #555;
        }

        .job-description,
        .project-description {
            font-size: 14px;
            line-height: 1.5;
            margin-top: 5px;
            white-space: pre-line;
        }

        .project-link {
            color: #00c8ff;
            font-size: 13px;
            text-decoration: none;
        }

        .project-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .cv-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                text-align: center;
            }

            .main {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="cv-container">
        <aside class="sidebar">
            <div class="profile-pic">
                @if($photoPreview)
                <img src="{{ $photoPreview }}" alt="Profile Photo">
                @elseif(!empty($personal_info['photo']))
                <img src="{{ asset('storage/' . $personal_info['photo']) }}" alt="Profile Photo">
                @else
                <svg width="120" height="120" viewBox="0 0 24 24" fill="#ccc">
                    <circle cx="12" cy="7" r="5" />
                    <path d="M12 14c-6 0-8 4-8 6v1h16v-1c0-2-2-6-8-6z" />
                </svg>
                @endif
            </div>
            <div class="name">{{ $personal_info['name'] ?? 'Your Name' }}</div>
            <div class="title">{{ $personal_info['occupation'] ?? 'Your Title' }}</div>

            <h2>Contact</h2>
            <ul>
                @if (!empty($personal_info['email'])) <li>Email: {{ $personal_info['email'] }}</li> @endif
                @if (!empty($personal_info['phone'])) <li>Phone: {{ $personal_info['phone'] }}</li> @endif
                @if (!empty($personal_info['linkedin'])) <li>LinkedIn: {{ $personal_info['linkedin'] }}</li> @endif
                @if (!empty($personal_info['website'])) <li>Website: {{ $personal_info['website'] }}</li> @endif
                @if (!empty($personal_info['address'])) <li>Address: {{ $personal_info['address'] }}</li> @endif
            </ul>

            <h2>Skills</h2>
            <ul>
                @if (!empty($skills))
                @foreach ($skills as $skill)
                <li>{{ $skill['name'] }}</li>
                @endforeach
                @else
                <li>Add your skills</li>
                @endif
            </ul>

            <h2>Languages</h2>
            <ul>
                @if (!empty($languages))
                @foreach ($languages as $language)
                <li>{{ $language['name'] }} ({{ $language['proficiency'] }})</li>
                @endforeach
                @else
                <li>Add languages</li>
                @endif
            </ul>
        </aside>

        <main class="main">
            <section class="section">
                <h2>Profile</h2>
                <p>{{ $personal_info['summary'] ?? 'Write a short summary or objective here.' }}</p>
            </section>

            <section class="section">
                <h2>Experience</h2>
                @if (!empty($experiences))
                @foreach ($experiences as $experience)
                <div class="experience-item">
                    <div class="job-title">{{ $experience['job_title'] }}</div>
                    <div class="company">{{ $experience['company'] }} — {{ $experience['start_date'] ?? '' }} to {{ $experience['end_date'] ?? '' }}</div>
                    <div class="job-description">{{ $experience['description'] }}</div>
                </div>
                @endforeach
                @else
                <p>Add your experience</p>
                @endif
            </section>

            <section class="section">
                <h2>Projects</h2>
                @if (!empty($projects))
                @foreach ($projects as $project)
                <div class="project-item">
                    <div class="project-name">{{ $project['name'] }}</div>
                    <div class="project-description">{{ $project['description'] }}</div>
                    @if (!empty($project['link']))
                    <a href="{{ $project['link'] }}" class="project-link" target="_blank">View Project</a>
                    @endif
                </div>
                @endforeach
                @else
                <p>Add your projects</p>
                @endif
            </section>

            <section class="section">
                <h2>Education</h2>
                @if (!empty($educations))
                @foreach ($educations as $education)
                <div class="education-item">
                    <div class="education-degree">{{ $education['degree'] }}</div>
                    <div class="education-institution">{{ $education['institution'] }} — {{ $education['start_date'] ?? '' }} to {{ $education['end_date'] ?? '' }}</div>
                    @if (!empty($education['field_of_study']))
                    <div>Field: {{ $education['field_of_study'] }}</div>
                    @endif
                </div>
                @endforeach
                @else
                <p>Add your education</p>
                @endif
            </section>

            <section class="section">
                <h2>Certifications</h2>
                @if (!empty($certifications))
                @foreach ($certifications as $certification)
                <div class="education-item">
                    <div class="education-degree">{{ $certification['name'] }}</div>
                    <div class="education-institution">{{ $certification['issuer'] }} — {{ $certification['date'] ?? '' }}</div>
                </div>
                @endforeach
                @else
                <p>Add certifications</p>
                @endif
            </section>
        </main>
    </div>
</body>

</html>