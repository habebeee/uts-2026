<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Habiburrahman Ikwan Mujahidin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #0f172a; 
            color: white;
        }

        /* --- STYLING NAVBAR MODERN --- */
        .custom-navbar {
            background: rgba(15, 23, 42, 0.8) !important; 
            backdrop-filter: blur(12px); 
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 12px 0;
            transition: all 0.3s ease;
        }

        /* Teks Gradasi untuk Singkat Nama Logo */
        .text-gradient {
            background: linear-gradient(45deg, #ffffff, #0dcaf0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        /* Informasi Mahasiswa di Tengah Navbar */
        .student-info {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.9rem;
        }

        /* Nav Link Menu Kanan */
        .custom-navbar .nav-link {
            color: rgba(255, 255, 255, 0.7) !important;
            font-weight: 500;
            padding: 8px 18px !important;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        /* Efek Hover Menu */
        .custom-navbar .nav-link:hover {
            color: #0dcaf0 !important;
            background: rgba(13, 202, 240, 0.1);
            transform: translateY(-2px);
        }

        /* Indikator Menu Aktif */
        .custom-navbar .nav-link.active {
            color: #ffffff !important;
            background: linear-gradient(135deg, #0d6efd, #0dcaf0);
            box-shadow: 0 4px 15px rgba(13, 110, 253, 0.4);
            font-weight: 600;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(15, 23, 42, 0.98);
                border-radius: 15px;
                margin-top: 15px;
                padding: 20px !important;
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            .student-info {
                margin: 15px 0;
                text-align: center;
                border-radius: 10px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">
    <div class="container">
        
        <a class="navbar-brand fs-4" href="{{ url('/') }}">
            ⚡ Habib.<span class="text-gradient">Portofolio</span>
        </a>
        
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            
            <div class="mx-auto student-info d-flex align-items-center gap-2">
                <span class="text-white-50"><i class="bi bi-person-badge text-primary"></i> Mahasiswa:</span>
                <span class="fw-bold text-white">Habiburrahman Ikwan Mujahidin</span>
                <span class="text-muted">|</span>
                <span class="text-info fw-semibold">NIM: 2024080149</span>
            </div>

            <ul class="navbar-nav gap-2 text-center py-2 py-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                        <i class="bi bi-house-door me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('projects*') ? 'active' : '' }}" href="{{ url('/projects') }}">
                        <i class="bi bi-code-slash me-1"></i> Projects
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/contact') }}">
                        <i class="bi bi-envelope me-1"></i> Contact
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<div style="margin-top: 110px;"></div>

<div class="container mt-4">
    @yield('content')
</div>

<footer class="text-center mt-5 py-4 border-top border-secondary border-opacity-10">
    <p class="text-secondary small mb-0">
        © 2026 Habiburrahman Ikwan Mujahidin | Tugas UTS Pemrograman Web
    </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>