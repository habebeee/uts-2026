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
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand fs-4" href="{{ route('home') }}">
            ⚡ {{ $site->navbar_brand }}<span class="text-gradient">{{ $site->navbar_highlight }}</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mx-auto student-info d-flex align-items-center gap-2 flex-wrap">
                <span><i class="bi bi-person-badge text-info"></i> Mahasiswa</span>
                <span class="student-name">{{ $site->student_name }}</span>
                <span class="text-muted d-none d-md-inline">|</span>
                <span class="text-info fw-semibold">NIM {{ $site->student_nim }}</span>
            </div>

            <ul class="navbar-nav gap-2 text-center py-2 py-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="bi bi-house-door me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}">
                        <i class="bi bi-code-slash me-1"></i> Projects
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('contact.*') ? 'active' : '' }}" href="{{ route('contact.index') }}">
                        <i class="bi bi-envelope me-1"></i> Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="page-shell">
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container site-footer-inner">
        <p class="text-secondary small mb-0">{{ $site->footer_text }}</p>
        <div class="site-footer-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('projects.index') }}">Projects</a>
            <a href="{{ route('contact.index') }}">Contact</a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const navbar = document.getElementById('mainNavbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 24);
    });
</script>
@stack('scripts')
</body>
</html>
