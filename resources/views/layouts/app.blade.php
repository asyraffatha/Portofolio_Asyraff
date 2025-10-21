<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio - Asyraff')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-brown: #8B5A3C;
            --secondary-brown: #6F4E37;
            --light-brown: #D2B48C;
            --dark-brown: #4A3728;
            --cream: #F5E6D3;
            --gold: #D4AF37;
            --bg-light: #FFF8F0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        html {
            scroll-behavior: smooth;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, var(--dark-brown) 0%, var(--secondary-brown) 100%) !important;
            padding: 1rem 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 1.8rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .nav-link {
            color: var(--cream) !important;
            margin: 0 10px;
            position: relative;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--gold);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 80%;
        }

        .nav-link:hover {
            color: var(--gold) !important;
            transform: translateY(-2px);
        }

        .section {
            padding: 100px 0;
            position: relative;
        }

        .section-title {
            text-align: center;
            font-size: 2.8rem;
            margin-bottom: 3rem;
            color: var(--dark-brown);
            font-weight: 700;
            position: relative;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--primary-brown));
            border-radius: 2px;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--gold), var(--primary-brown));
            border: none;
            padding: 14px 35px;
            border-radius: 50px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.4s ease;
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn-primary-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-primary-custom:hover::before {
            left: 100%;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(212, 175, 55, 0.5);
            color: white;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            border-radius: 50px;
            color: white;
            text-decoration: none;
            margin: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .social-link:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            color: white;
        }

        .whatsapp {
            background: linear-gradient(135deg, #25D366, #128C7E);
        }

        .instagram {
            background: linear-gradient(135deg, #E4405F, #C13584);
        }

        .github {
            background: linear-gradient(135deg, #333, #000);
        }

        .linkedin {
            background: linear-gradient(135deg, #0077B5, #00669C);
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark-brown), var(--secondary-brown)) !important;
            box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.2);
        }

        footer .social-link {
            padding: 10px 20px;
            font-size: 0.9rem;
        }

        /* Scroll Animation */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.active {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">✨ Portfolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-white py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2024 Rizqy Asyraff. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="social-links-footer">
                        @foreach ($socialLinks as $link)
                            @if ($link->is_active)
                                <a href="{{ $link->url }}" target="_blank" class="social-link {{ $link->platform }}">
                                    <i class="fab fa-{{ $link->platform }}"></i>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.padding = '0.5rem 0';
                navbar.style.boxShadow = '0 6px 30px rgba(0, 0, 0, 0.4)';
            } else {
                navbar.style.padding = '1rem 0';
                navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.3)';
            }
        });

        // Scroll animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
    </script>

    @stack('scripts')
</body>

</html>
