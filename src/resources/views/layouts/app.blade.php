<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $site->site_title ?? 'Portfolio')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
    @stack('styles')
</head>
<body @if(Request::routeIs('home')) data-single-page="true" @endif>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar" id="mainNavbar">
    <div class="container">
        <div class="navbar-brand-group">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span class="brand-icon">⚡</span>
                <span class="brand-text">{{ $site->navbar_brand }}<span class="text-gradient">{{ $site->navbar_highlight }}</span></span>
            </a>

            <div class="navbar-social d-none d-md-flex">
                <a href="https://www.instagram.com/habbbebbe?utm_source=qr" target="_blank" rel="noopener noreferrer" class="social-link social-link-instagram" aria-label="Instagram">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="https://github.com/habebeee" target="_blank" rel="noopener noreferrer" class="social-link social-link-github" aria-label="GitHub">
                    <i class="bi bi-github"></i>
                </a>
            </div>
        </div>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto nav-pill-group gap-1 text-center py-2 py-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-section-link {{ Request::routeIs('home') ? 'is-active' : '' }}" href="{{ route('home') }}#home" data-section="home">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-section-link" href="{{ route('home') }}#about" data-section="about">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-section-link" href="{{ route('home') }}#projects" data-section="projects">
                        Projects
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-section-link" href="{{ route('home') }}#contact" data-section="contact">
                        Contact
                    </a>
                </li>
            </ul>

            <div class="navbar-social-mobile d-md-none">
                <a href="https://www.instagram.com/habbbebbe?utm_source=qr" target="_blank" rel="noopener noreferrer" class="social-link social-link-instagram" aria-label="Instagram">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="https://github.com/habebeee" target="_blank" rel="noopener noreferrer" class="social-link social-link-github" aria-label="GitHub">
                    <i class="bi bi-github"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<main class="page-shell @if(Request::routeIs('home')) page-shell-single @endif">
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container site-footer-inner">
        <div class="footer-brand">
            <p class="footer-title mb-1">{{ $site->navbar_brand }}<span class="text-gradient">{{ $site->navbar_highlight }}</span></p>
            <p class="text-secondary small mb-0">{{ $site->footer_text }}</p>
        </div>
        <div class="site-footer-links">
            <a href="{{ route('home') }}#home">Home</a>
            <a href="{{ route('home') }}#about">About</a>
            <a href="{{ route('home') }}#projects">Projects</a>
            <a href="{{ route('home') }}#contact">Contact</a>
        </div>
        <div class="footer-social">
            <a href="https://www.instagram.com/habbbebbe?utm_source=qr" target="_blank" rel="noopener noreferrer" class="social-link social-link-instagram" aria-label="Instagram">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="https://github.com/habebeee" target="_blank" rel="noopener noreferrer" class="social-link social-link-github" aria-label="GitHub">
                <i class="bi bi-github"></i>
            </a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const navbar = document.getElementById('mainNavbar');
    const navbarCollapse = document.getElementById('navbarNav');
    const isSinglePage = document.body.dataset.singlePage === 'true';

    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 24);
    });

    document.querySelectorAll('a[href*="#"]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const hash = link.getAttribute('href').split('#')[1];
            if (!hash) return;

            const target = document.getElementById(hash);
            if (!target) return;

            event.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            history.replaceState(null, '', `#${hash}`);

            if (navbarCollapse.classList.contains('show')) {
                bootstrap.Collapse.getOrCreateInstance(navbarCollapse).hide();
            }
        });
    });

    if (isSinglePage) {
        const sectionLinks = document.querySelectorAll('.nav-section-link');
        const sections = ['home', 'about', 'projects', 'contact']
            .map((id) => document.getElementById(id))
            .filter(Boolean);

        const setActiveSection = (id) => {
            sectionLinks.forEach((link) => {
                link.classList.toggle('is-active', link.dataset.section === id);
            });
        };

        const updateActiveSection = () => {
            const offset = navbar.offsetHeight + 32;
            let current = 'home';

            sections.forEach((section) => {
                if (window.scrollY >= section.offsetTop - offset) {
                    current = section.id;
                }
            });

            setActiveSection(current);
        };

        window.addEventListener('scroll', updateActiveSection, { passive: true });
        updateActiveSection();

        const initialHash = window.location.hash.replace('#', '');
        if (initialHash.startsWith('project-')) {
            setActiveSection('projects');
        } else if (initialHash && document.getElementById(initialHash)) {
            requestAnimationFrame(() => {
                document.getElementById(initialHash).scrollIntoView({ behavior: 'smooth', block: 'start' });
                setActiveSection(initialHash);
            });
        }
    }
</script>
@stack('scripts')
</body>
</html>
