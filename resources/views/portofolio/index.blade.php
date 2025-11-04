@extends('layouts.app')

@section('title', 'Portofolio - Rizqy Asyraff')

@push('styles')
    <style>
        /* Hero Section */
        #home {
            background: linear-gradient(135deg, var(--primary-brown) 0%, var(--secondary-brown) 50%, var(--dark-brown) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
            margin-top: -76px;
            padding-top: 176px;
            position: relative;
            overflow: hidden;
        }

        #home::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 50%, rgba(212, 175, 55, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(139, 90, 60, 0.15) 0%, transparent 50%);
            animation: pulse 8s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 0.5;
            }

            50% {
                opacity: 1;
            }
        }

        .hero-content {
            position: relative;
            z-index: 1;
            animation: fadeInUp 1s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-image {
            position: relative;
            animation: fadeInRight 1s ease 0.3s both;
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-content .lead {
            text-align: justify;
            text-justify: inter-word;
            max-width: 560px;
            /* ubah agar sejajar dengan lebar judul */
            margin-right: auto;
            /* pastikan rata ke kiri dari kolom */
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.92);
        }

        @media (max-width: 991px) {
            .hero-content .lead {
                max-width: 100%;
                text-align: left;
            }
        }

        .formal-image {
            width: 320px;
            max-width: 100%;
            height: 320px;
            max-height: 320px;
            object-fit: cover;
            /* ubah focal point vertikal di sini (nilai Y 40%..60% sesuai kebutuhan) */
            object-position: 50% 20%;
            border-radius: 50%;
            border: 6px solid var(--gold);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.45),
                0 0 0 12px rgba(212, 175, 55, 0.08);
            transition: transform 0.45s cubic-bezier(.2, .8, .2, 1), box-shadow 0.45s, object-position 0.3s ease;
            will-change: transform;
            animation: float 6s ease-in-out infinite;
            display: inline-block;
            backface-visibility: hidden;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .formal-image:hover {
            transform: scale(1.05) rotate(5deg);
            box-shadow: 0 25px 80px rgba(212, 175, 55, 0.4),
                0 0 0 20px rgba(212, 175, 55, 0.2);
        }

        .btn-outline-light {
            border: 2px solid var(--cream);
            padding: 14px 35px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.4s ease;
        }

        .btn-outline-light:hover {
            background: var(--cream);
            color: var(--dark-brown);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(245, 230, 211, 0.3);
        }

        /* Particles Effect */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: rgba(212, 175, 55, 0.3);
            border-radius: 50%;
            animation: particleFloat 15s infinite ease-in-out;
        }

        @keyframes particleFloat {

            0%,
            100% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-100vh) translateX(50px);
                opacity: 0;
            }
        }

        /* About Section */
        .bg-light {
            background: var(--bg-light) !important;
        }

        /* Skills */
        .skill-item {
            background: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 15px;
            border-left: 4px solid var(--primary-brown);
            box-shadow: 0 5px 15px rgba(139, 90, 60, 0.1);
            transition: all 0.3s ease;
            font-weight: 500;
            color: var(--dark-brown);
        }

        .skill-item:hover {
            transform: translateX(10px);
            box-shadow: 0 8px 25px rgba(139, 90, 60, 0.2);
            border-left-color: var(--gold);
            background: var(--cream);
        }

        /* Projects */
        .card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background: white;
        }

        .card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 50px rgba(139, 90, 60, 0.3);
        }

        .card-img-top {
            background: linear-gradient(135deg, var(--primary-brown), var(--secondary-brown));
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .card-img-top::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 10s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .card-img-top i {
            position: relative;
            z-index: 1;
            color: var(--gold);
            transition: transform 0.3s ease;
        }

        .card:hover .card-img-top i {
            transform: scale(1.2) rotate(10deg);
        }

        .badge {
            background: var(--light-brown) !important;
            color: var(--dark-brown) !important;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 500;
        }

        /* Contact Section */
        .contact-info i {
            color: var(--primary-brown);
            font-size: 1.5rem;
        }

        .form-control {
            border: 2px solid var(--light-brown);
            border-radius: 10px;
            padding: 12px 20px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-brown);
            box-shadow: 0 0 0 0.2rem rgba(139, 90, 60, 0.15);
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .section {
                padding: 60px 0;
            }

            .section-title {
                font-size: 2rem;
                margin-bottom: 2rem;
            }

            .section-title::after {
                width: 80px;
                height: 3px;
            }

            .hero-content .lead {
                font-size: 1rem;
                line-height: 1.6;
            }

            .formal-image {
                width: 250px;
                height: 250px;
                border-width: 4px;
            }

            .btn-primary-custom,
            .btn-outline-light {
                padding: 12px 25px;
                font-size: 0.9rem;
            }

            .skill-item {
                padding: 15px;
                font-size: 0.9rem;
            }

            .card-img-top {
                height: 180px;
            }

            .card-img-top i {
                font-size: 2.5rem;
            }

            .contact-info i {
                font-size: 1.2rem;
            }

            .social-link {
                padding: 10px 20px;
                font-size: 0.85rem;
            }

            .hero-buttons .btn {
                margin-bottom: 10px;
                width: 100%;
            }

            .hero-buttons {
                display: flex;
                flex-direction: column;
                align-items: stretch;
            }
        }

        @media (max-width: 576px) {
            .section {
                padding: 40px 0;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .display-4 {
                font-size: 2rem;
            }

            .h3 {
                font-size: 1.5rem;
            }

            .formal-image {
                width: 200px;
                height: 200px;
            }

            .btn-primary-custom,
            .btn-outline-light {
                padding: 10px 20px;
                font-size: 0.8rem;
            }

            .skill-item {
                padding: 12px;
                font-size: 0.8rem;
            }

            .card {
                margin-bottom: 20px;
            }

            .social-link {
                padding: 8px 15px;
                font-size: 0.8rem;
            }

            .contact-info span {
                font-size: 0.9rem;
            }

            /* Mobile Responsiveness */
            +@media (max-width: 768px) {
                +.section {
                    +padding: 60px 0;
                    +
                }

                ++.section-title {
                    +font-size: 2rem;
                    +margin-bottom: 2rem;
                    +
                }

                ++.section-title::after {
                    +width: 80px;
                    +height: 3px;
                    +
                }

                ++.hero-content .lead {
                    +font-size: 1rem;
                    +line-height: 1.6;
                    +
                }

                ++.formal-image {
                    +width: 250px;
                    +height: 250px;
                    +border-width: 4px;
                    +
                }

                ++.btn-primary-custom,
                +.btn-outline-light {
                    +padding: 12px 25px;
                    +font-size: 0.9rem;
                    +
                }

                ++.skill-item {
                    +padding: 15px;
                    +font-size: 0.9rem;
                    +
                }

                ++.card-img-top {
                    +height: 180px;
                    +
                }

                ++.card-img-top i {
                    +font-size: 2.5rem;
                    +
                }

                ++.contact-info i {
                    +font-size: 1.2rem;
                    +
                }

                ++.social-link {
                    +padding: 10px 20px;
                    +font-size: 0.85rem;
                    +
                }

                ++.hero-buttons .btn {
                    +margin-bottom: 10px;
                    +width: 100%;
                    +
                }

                ++.hero-buttons {
                    +display: flex;
                    +flex-direction: column;
                    +align-items: stretch;
                    +
                }

                +
            }

            ++@media (max-width: 576px) {
                +.section {
                    +padding: 40px 0;
                    +
                }

                ++.section-title {
                    +font-size: 1.8rem;
                    +
                }

                ++.display-4 {
                    +font-size: 2rem;
                    +
                }

                ++.h3 {
                    +font-size: 1.5rem;
                    +
                }

                ++.formal-image {
                    +width: 200px;
                    +height: 200px;
                    +
                }

                ++.btn-primary-custom,
                +.btn-outline-light {
                    +padding: 10px 20px;
                    +font-size: 0.8rem;
                    +
                }

                ++.skill-item {
                    +padding: 12px;
                    +font-size: 0.8rem;
                    +
                }

                ++.card {
                    +margin-bottom: 20px;
                    +
                }

                ++.social-link {
                    +padding: 8px 15px;
                    +font-size: 0.8rem;
                    +
                }

                ++.contact-info span {
                    +font-size: 0.9rem;
                    +
                }

                +
            }
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section id="home" class="section">
        <div class="particles" id="particles"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="display-4 fw-bold mb-4" id="heroTitle">Haloo..., I'm Rizqy Asyraff Athalah</h1>
                    <h2 class="h3 mb-4" style="color: var(--gold);">Software Engineer</h2>
                    <p class="lead mb-5">Hello! I am a web developer who focuses on quality and detail. I believe that every
                        great idea deserves to be realized through clean, efficient, and well-structured code — delivering
                        an interactive, modern, and user-oriented web experience.</p>
                    <div class="hero-buttons">
                        <a href="#projects" class="btn btn-primary-custom me-3">View My Work</a>
                        <a href="#contact" class="btn btn-outline-light">Get In Touch</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center hero-image">
                    <img src="{{ asset('images/formal.jpg') }}" alt="Rizqy Asyraff - Software Engineer"
                        class="formal-image">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section bg-light">
        <div class="container">
            <h2 class="section-title fade-in">About Me</h2>
            <div class="row">
                <div class="col-lg-6 fade-in">
                    <p class="fs-5 mb-4">
                        I'm a passionate full-stack developer with 3 years of experience
                        creating web applications. I love turning complex problems into
                        simple, beautiful designs.
                    </p>
                    <p class="fs-5 mb-4">
                        When I'm not coding, you can find me exploring new technologies,
                        contributing to open source, or enjoying outdoor activities.
                    </p>
                </div>
                <div class="col-lg-6 fade-in">
                    <h3 class="mb-4" style="color: var(--dark-brown);">Skills & Technologies</h3>
                    <div class="row">
                        @php
                            $skills = [
                                'Laravel',
                                'PHP',
                                'JavaScript',
                                'React',
                                'Vue.js',
                                'MySQL',
                                'Bootstrap',
                                'Tailwind CSS',
                                'Git',
                                'REST API',
                                'Figma',
                            ];
                        @endphp
                        @foreach (array_chunk($skills, 2) as $chunk)
                            <div class="col-sm-6">
                                @foreach ($chunk as $skill)
                                    <div class="skill-item">{{ $skill }}</div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="section">
        <div class="container">
            <h2 class="section-title fade-in">My Projects</h2>
            <div class="row">
                @php
                    $projects = [
                        [
                            'title' => 'E-Learning Platform',
                            'description' => 'Full-stack e-learning math platform built with Laravel',
                            'technologies' => ['Laravel', 'Tailwind CSS', 'MySQL'],
                            'icon' => 'fa-graduation-cap',
                            'github' => 'https://github.com/asyraffatha/web-student',
                            'demo' => '#',
                        ],
                        [
                            'title' => 'Portofolio Website',
                            'description' =>
                                'Personal portfolio containing a self-description, experience, and completed projects',
                            'technologies' => ['Laravel'],
                            'icon' => 'fa-user',
                            'github' => 'https://github.com/asyraffatha/Portofolio_Asyraff',
                            'demo' => '#',
                        ],
                        [
                            'title' => 'Game Store',
                            'description' =>
                                'A responsive web app for game boosting services (eFootball & Mobile Legends) built using Next.js, TypeScript, and Tailwind CSS — focusing on UI/UX and performance',
                            'technologies' => ['Node.js', 'TypeScript', 'Tailwind CSS'],
                            'icon' => 'fa-cloud-sun',
                            'github' => 'https://github.com/asyraffatha/Joki_Game',
                            'demo' => '#',
                        ],
                    ];
                @endphp

                @foreach ($projects as $project)
                    <div class="col-lg-4 col-md-6 mb-4 fade-in">
                        <div class="card h-100 project-card">
                            <div class="card-img-top">
                                <i class="fas {{ $project['icon'] }} fa-3x"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title" style="color: var(--dark-brown);">{{ $project['title'] }}</h5>
                                <p class="card-text">{{ $project['description'] }}</p>
                                <div class="mb-3">
                                    @foreach ($project['technologies'] as $tech)
                                        <span class="badge me-1">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="{{ $project['github'] }}" class="btn btn-outline-primary btn-sm me-2">
                                    <i class="fab fa-github"></i> GitHub
                                </a>
                                <a href="{{ $project['demo'] }}" class="btn btn-sm"
                                    style="background: var(--primary-brown); color: white;">
                                    <i class="fas fa-external-link-alt"></i> Live Demo
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section bg-light">
        <div class="container">
            <h2 class="section-title fade-in">Get In Touch</h2>
            <div class="row">
                <div class="col-lg-5 mb-4 fade-in">
                    <h3 class="mb-4" style="color: var(--dark-brown);">Let's work together!</h3>
                    <p class="fs-5 mb-4">I'm always interested in new opportunities and projects.</p>

                    <div class="contact-info mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-envelope me-3"></i>
                            <span>asyraffrizqy07@gmail.com</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-phone me-3"></i>
                            <span>+62 89662650108</span>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <i class="fas fa-map-marker-alt me-3"></i>
                            <span>Bekasi, Indonesia</span>
                        </div>
                    </div>

                    <div class="social-media-section">
                        <h4 class="mb-3" style="color: var(--dark-brown);">Follow me on:</h4>
                        <div class="d-flex flex-wrap">
                            @foreach ($socialLinks as $link)
                                @if ($link->is_active)
                                    <a href="{{ $link->url }}" target="_blank" class="social-link {{ $link->platform }}">
                                        <i class="fab fa-{{ $link->platform }}"></i>
                                        {{ ucfirst($link->platform) }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 fade-in">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <form id="contactForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Name *</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                        <div class="invalid-feedback" id="nameError"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            required>
                                        <div class="invalid-feedback" id="emailError"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                    <div class="invalid-feedback" id="messageError"></div>
                                </div>
                                <button type="submit" class="btn btn-primary-custom w-100" id="submitBtn">
                                    <span id="submitText">Send Message</span>
                                    <div id="submitSpinner" class="spinner-border spinner-border-sm d-none"
                                        role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </button>
                            </form>
                            <div id="formMessage" class="mt-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Create particles
        const particlesContainer = document.getElementById('particles');
        for (let i = 0; i < 30; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.width = Math.random() * 10 + 5 + 'px';
            particle.style.height = particle.style.width;
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 15 + 's';
            particle.style.animationDuration = Math.random() * 10 + 10 + 's';
            particlesContainer.appendChild(particle);
        }

        // Typing effect for hero title
        const heroTitle = document.getElementById('heroTitle');
        const originalText = heroTitle.textContent;
        heroTitle.textContent = '';
        let i = 0;

        function typeWriter() {
            if (i < originalText.length) {
                heroTitle.textContent += originalText.charAt(i);
                i++;
                setTimeout(typeWriter, 50);
            }
        }

        setTimeout(typeWriter, 500);

        // Parallax effect on scroll
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const heroImage = document.querySelector('.hero-image img');
            if (heroImage) {
                heroImage.style.transform = `translateY(${scrolled * 0.3}px) scale(${1 + scrolled * 0.0001})`;
            }
        });

        // Card tilt effect
        document.querySelectorAll('.project-card').forEach(card => {
            card.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;

                this.style.transform =
                    `translateY(-15px) perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) perspective(1000px) rotateX(0) rotateY(0)';
            });
        });

        // Skill progress animation on scroll
        const skillItems = document.querySelectorAll('.skill-item');
        const skillObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.animation = 'slideInLeft 0.5s ease forwards';
                    }, index * 100);
                }
            });
        }, {
            threshold: 0.5
        });

        skillItems.forEach(item => skillObserver.observe(item));

        // Form submission with animation
        document.getElementById('contactForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const submitSpinner = document.getElementById('submitSpinner');
            const formMessage = document.getElementById('formMessage');

            // Reset previous states
            formMessage.innerHTML = '';
            formMessage.className = 'mt-3';
            document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            document.querySelectorAll('.invalid-feedback').forEach(el => el.innerHTML = '');

            // Show loading state
            submitText.textContent = 'Sending...';
            submitSpinner.classList.remove('d-none');
            submitBtn.disabled = true;

            try {
                const formData = new FormData(this);
                const response = await fetch('/contact', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    // Success animation
                    submitText.innerHTML = '<i class="fas fa-check"></i> Message Sent!';
                    submitBtn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';

                    formMessage.innerHTML = `
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${data.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `;

                    setTimeout(() => {
                        this.reset();
                        submitText.textContent = 'Send Message';
                        submitBtn.style.background = '';
                    }, 2000);
                } else {
                    // Show validation errors
                    if (data.errors) {
                        Object.keys(data.errors).forEach(field => {
                            const input = document.querySelector(`[name="${field}"] `);
                            const errorDiv = document.getElementById(`
                                            $ {
                                                field
                                            }
                                            Error`);
                            if (input && errorDiv) {
                                input.classList.add('is-invalid');
                                errorDiv.textContent = data.errors[field][0];
                            }
                        });

                        formMessage.innerHTML = ` <
                                            div class="alert alert-danger alert-dismissible fade show" role="alert" >
                                            Please fix the errors below and
                                            try again. <
                                            button type="button" class="btn-close" data-bs-dismiss="alert" > <
                                            /button> <
                                            /div>
                                            `;
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                formMessage.innerHTML = ` <
                                            div class="alert alert-danger alert-dismissible fade show" role="alert" >
                                            An error occurred.Please
                                            try again later. <
                                            button type="button" class="btn-close" data-bs-dismiss="alert" > <
                                            /button> <
                                            /div>
                                            `;
            } finally {
                // Reset button state
                submitText.textContent = 'Send Message';
                submitSpinner.classList.add('d-none');
                submitBtn.disabled = false;
            }
        });
    </script>
@endpush
