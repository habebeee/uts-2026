@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row align-items-center justify-content-center min-vh-75">
        
        <div class="col-md-5 text-center mb-5 mb-md-0">
            <div class="profile-img-wrapper">
                <img src="/images/habib.jpg" alt="Foto Habib" class="rounded-circle shadow profile-img" style="width: 320px; height: 320px; object-fit: cover;">
            </div>
        </div>

        <div class="col-md-7">
            <span class="badge bg-primary bg-gradient px-3 py-2 mb-3 rounded-pill">
                ✨ Selamat Datang di Portofolio Saya
            </span>
            
            <h1 class="display-3 fw-bold mb-3 text-white">
                Halo, Saya <span class="text-primary">Habib</span>
            </h1>
            
            <p class="fs-4 text-secondary mb-3">
                💻 Full-Stack Web Developer & Mahasiswa IT
            </p>
            
            <div class="tech-stack mb-4">
                <span class="tech-badge laravel">Laravel</span>
                <span class="tech-badge bootstrap">Bootstrap</span>
                <span class="tech-badge javascript">JavaScript</span>
                <span class="tech-badge mysql">MySQL</span>
                <span class="tech-badge git">Git & GitHub</span>
            </div>
            
            <div class="bio-section mb-4 p-4 rounded-4 shadow-sm bg-white">
                <p class="lead mb-0 text-dark">
                    <i class="bi bi-quote"></i> Saya adalah seorang mahasiswa IT dan pengembang web (Full-Stack) yang fokus pada penciptaan solusi digital modern, responsif, dan fungsional. Saat ini, saya aktif mendalami ekosistem <strong>PHP (Laravel)</strong> untuk arsitektur backend yang kokoh berbasis MVC, serta <strong>Bootstrap & JavaScript</strong> untuk antarmuka frontend yang interaktif. Saya berkomitmen menulis kode yang bersih (clean code) untuk mentransformasikan ide kompleks menjadi aplikasi nyata yang solutif.
                </p>
            </div>
            
            <div class="mt-4">
                <p class="text-muted fst-italic mb-0">
                    "Terus belajar, terus berkembang, dan bangun sesuatu yang berarti."
                </p>
            </div>
        </div>
        
    </div>
</div>

<style>
    /* Animasi fade-in */
    .container {
        animation: fadeInUp 0.8s ease-out;
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
    
    /* Efek hover pada gambar profil */
    .profile-img {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        object-fit: cover;
    }
    
    .profile-img-wrapper {
        display: inline-block;
        position: relative;
    }
    
    .profile-img-wrapper::before {
        content: '';
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        background: linear-gradient(45deg, #0d6efd, #0dcaf0);
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: -1;
    }
    
    .profile-img-wrapper:hover::before {
        opacity: 0.5;
    }
    
    .profile-img:hover {
        transform: scale(1.05);
        box-shadow: 0 20px 40px rgba(0,0,0,0.2) !important;
    }
    
    /* Tech Stack Layout */
    .tech-stack {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }
    
    .tech-badge {
        display: inline-block;
        padding: 8px 18px;
        border-radius: 50px;
        font-weight: bold;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        cursor: default;
    }
    
    /* Warna & Efek Tiap Badge Tech Stack */
    .laravel {
        background: linear-gradient(135deg, #FF2D20, #E63E2E);
        color: white;
        box-shadow: 0 4px 15px rgba(255, 45, 32, 0.3);
        animation: bounceSoft 2s ease-in-out infinite, pulseGlowLaravel 2s ease-in-out infinite;
    }
    .laravel:hover { transform: scale(1.1) rotate(2deg); }

    .bootstrap {
        background: linear-gradient(135deg, #7952B3, #6f42c1);
        color: white;
        box-shadow: 0 4px 15px rgba(121, 82, 179, 0.3);
        animation: bounceSoft 2s ease-in-out infinite 0.2s, pulseGlowBootstrap 2s ease-in-out infinite 0.2s;
    }
    .bootstrap:hover { transform: scale(1.1) rotate(-2deg); }

    .javascript {
        background: linear-gradient(135deg, #F7DF1E, #F0DB4F);
        color: #323330;
        box-shadow: 0 4px 15px rgba(247, 223, 30, 0.3);
        animation: bounceSoft 2s ease-in-out infinite 0.4s;
    }
    .javascript:hover { transform: scale(1.1) rotate(2deg); }

    .mysql {
        background: linear-gradient(135deg, #00758F, #005E74);
        color: white;
        box-shadow: 0 4px 15px rgba(0, 117, 143, 0.3);
        animation: bounceSoft 2s ease-in-out infinite 0.6s;
    }
    .mysql:hover { transform: scale(1.1) rotate(-2deg); }

    .git {
        background: linear-gradient(135deg, #F05032, #E24A26);
        color: white;
        box-shadow: 0 4px 15px rgba(240, 80, 50, 0.3);
        animation: bounceSoft 2s ease-in-out infinite 0.8s;
    }
    .git:hover { transform: scale(1.1) rotate(2deg); }
    
    /* Animasi Pergerakan */
    @keyframes bounceSoft {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-6px); }
    }
    
    @keyframes pulseGlowLaravel {
        0%, 100% { filter: brightness(1); box-shadow: 0 4px 15px rgba(255, 45, 32, 0.3); }
        50% { filter: brightness(1.1); box-shadow: 0 4px 20px rgba(255, 45, 32, 0.6); }
    }
    
    @keyframes pulseGlowBootstrap {
        0%, 100% { filter: brightness(1); box-shadow: 0 4px 15px rgba(121, 82, 179, 0.3); }
        50% { filter: brightness(1.1); box-shadow: 0 4px 20px rgba(121, 82, 179, 0.6); }
    }
    
    /* Bio Section - Memperbaiki Kontras */
    .bio-section {
        background: linear-gradient(135deg, #ffffff 0%, #f1f3f5 100%);
        border-left: 5px solid #0d6efd;
        transition: transform 0.3s ease;
    }
    
    .bio-section:hover {
        transform: translateX(10px);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .display-3 { font-size: 2.5rem; }
        .profile-img { width: 250px; height: 250px; }
        .tech-badge { font-size: 0.85rem; padding: 6px 14px; }
    }
    
    .min-vh-75 {
        min-height: 75vh;
    }
</style>

@endsection