@extends('layouts.app')

@section('title', ($site->home_name_highlight ?? 'Portfolio') . ' | Portfolio')

@section('content')
<section id="home" class="hero-section page-section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-visual fade-up">
                <div class="profile-card">
                    <div class="profile-ring">
                        <img src="{{ $site->profileImageUrl() }}" alt="Foto {{ $site->home_name_highlight }}">
                    </div>
                    <div class="profile-meta">
                        <span class="profile-status">
                            <span class="status-dot"></span>
                            Available for work
                        </span>
                    </div>
                </div>
            </div>

            <div class="hero-content fade-up fade-up-delay-1">
                <span class="section-label">
                    <i class="bi bi-stars"></i>
                    {{ $site->home_welcome_badge }}
                </span>

                <h1 class="hero-title">
                    <span class="hero-greeting">{{ $site->home_greeting }}</span>
                    <span class="hero-name text-gradient-accent">{{ $site->home_name_highlight }}</span>
                </h1>

                <p class="hero-role">
                    <i class="bi bi-briefcase"></i>
                    {{ trim(preg_replace('/[\x{1F300}-\x{1F9FF}\x{2600}-\x{26FF}\x{2700}-\x{27BF}]/u', '', $site->home_subtitle)) }}
                </p>

                <div class="tech-stack">
                    @foreach($skills as $skill)
                        <span class="tech-badge {{ $skill->css_class }}">{{ $skill->name }}</span>
                    @endforeach
                </div>

                <div class="hero-bio">
                    <p>{!! nl2br(e($site->home_bio)) !!}</p>
                </div>

                @if($site->home_quote)
                    <blockquote class="hero-quote">
                        <span class="hero-quote-mark hero-quote-mark-open" aria-hidden="true">"</span>
                        <p class="hero-quote-text">{{ $site->home_quote }}</p>
                        <span class="hero-quote-mark hero-quote-mark-close" aria-hidden="true">"</span>
                    </blockquote>
                @endif

                <div class="hero-actions">
                    <a href="#projects" class="btn-portfolio btn-portfolio-primary nav-anchor">
                        <i class="bi bi-folder2-open"></i>
                        Lihat Projects
                    </a>
                    <a href="#about" class="btn-portfolio btn-portfolio-secondary nav-anchor">
                        <i class="bi bi-person"></i>
                        Tentang Saya
                    </a>
                    <a href="#contact" class="btn-portfolio btn-portfolio-ghost nav-anchor">
                        <i class="bi bi-send"></i>
                        Hubungi Saya
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="about-section container page-section">
    <div class="about-header fade-up">
        <span class="section-label"><i class="bi bi-person-circle"></i> About Me</span>
        <h2 class="section-title mt-3 mb-3">Tentang <span class="text-gradient-accent">Saya</span></h2>
        <p class="section-subtitle mx-auto">Mari berteman dekat dengan saya, latar belakang pendidikan, dan teknologi yang saya gunakan sehari-hari.</p>
        <div class="about-edu-badge mt-4">
            <i class="bi bi-mortarboard-fill"></i>
            <span>Semester 4 · Universitas Esa Unggul</span>
        </div>
    </div>

    <div class="about-grid">
        <div class="glass-card about-card fade-up fade-up-delay-1">
            <div class="info-card-icon"><i class="bi bi-heart-fill"></i></div>
            <h3>Kepribadian</h3>
            <p>Saya orang yang teliti, sabar, dan suka belajar hal baru. Dalam mengerjakan project, saya terbiasa merencanakan langkah dengan rapi, berkomunikasi dengan jelas, dan tidak mudah menyerah ketika menemui kendala teknis.</p>
        </div>

        <div class="glass-card about-card fade-up fade-up-delay-2">
            <div class="info-card-icon"><i class="bi bi-bullseye"></i></div>
            <h3>Fokus & Tujuan</h3>
            <p>Fokus saya adalah membangun solusi digital yang modern, responsif, dan fungsional. Saya berkomitmen menulis kode yang bersih (clean code) untuk mentransformasikan ide kompleks menjadi aplikasi nyata yang solutif.</p>
        </div>

        <div class="glass-card about-card fade-up fade-up-delay-2">
            <div class="info-card-icon"><i class="bi bi-book-half"></i></div>
            <h3>Pendidikan</h3>
            <p>Saat ini saya menempuh pendidikan di <strong>Universitas Esa Unggul</strong> semester 4, dengan fokus pada bidang teknologi informasi dan pengembangan perangkat lunak berbasis web.</p>
        </div>
    </div>

    <div class="about-tech-section fade-up fade-up-delay-3">
        <div class="about-tech-header">
            <span class="section-label"><i class="bi bi-code-slash"></i> Tech Stack</span>
            <h2 class="section-title mt-3 mb-2">Teknologi yang Saya Gunakan</h2>
            <p class="section-subtitle mb-0">Berikut adalah tools dan framework yang menjadi andalan saya dalam pengembangan aplikasi web.</p>
        </div>

        <div class="about-tech-bio glass-card">
            <p>
                Saya terbiasa menggunakan <strong>Laravel</strong> sebagai framework utama,
                <strong>Filament</strong> untuk admin panel,
                <strong>Livewire</strong> dan <strong>Blade</strong> untuk antarmuka,
                <strong>MariaDB</strong> sebagai basis data,
                serta <strong>Docker</strong> untuk mendukung lingkungan pengembangan.
            </p>
        </div>

        <div class="about-tech-grid">
            <div class="glass-card tech-detail-card">
                <div class="tech-detail-icon laravel"><i class="bi bi-box-seam"></i></div>
                <h4>Laravel</h4>
                <p>Framework PHP utama untuk arsitektur backend yang kokoh berbasis MVC.</p>
            </div>
            <div class="glass-card tech-detail-card">
                <div class="tech-detail-icon filament"><i class="bi bi-grid-3x3-gap"></i></div>
                <h4>Filament</h4>
                <p>Admin panel modern untuk mengelola konten dan data aplikasi dengan cepat.</p>
            </div>
            <div class="glass-card tech-detail-card">
                <div class="tech-detail-icon livewire"><i class="bi bi-lightning-charge"></i></div>
                <h4>Livewire</h4>
                <p>Komponen interaktif tanpa perlu menulis JavaScript secara terpisah.</p>
            </div>
            <div class="glass-card tech-detail-card">
                <div class="tech-detail-icon blade"><i class="bi bi-file-earmark-code"></i></div>
                <h4>Blade</h4>
                <p>Template engine Laravel untuk membangun antarmuka yang rapi dan dinamis.</p>
            </div>
            <div class="glass-card tech-detail-card">
                <div class="tech-detail-icon mariadb"><i class="bi bi-database"></i></div>
                <h4>MariaDB</h4>
                <p>Basis data relasional untuk menyimpan dan mengelola data aplikasi.</p>
            </div>
            <div class="glass-card tech-detail-card">
                <div class="tech-detail-icon docker"><i class="bi bi-boxes"></i></div>
                <h4>Docker</h4>
                <p>Containerisasi untuk lingkungan pengembangan yang konsisten dan portable.</p>
            </div>
        </div>

        @if($skills->isNotEmpty())
            <div class="about-skills-row">
                @foreach($skills as $skill)
                    <span class="tech-badge {{ $skill->css_class }}">{{ $skill->name }}</span>
                @endforeach
            </div>
        @endif
    </div>
</section>

<section id="projects" class="projects-section container page-section">
    <header class="projects-header fade-up">
        <span class="section-label"><i class="bi bi-kanban"></i> Portfolio Work</span>
        <h2 class="section-title mt-3 mb-3">Katalog <span class="text-gradient-accent">Project</span></h2>
        <p class="section-subtitle mx-auto">Ringkasan project yang pernah dan sedang dikerjakan. Gunakan pencarian atau filter status untuk menemukan project tertentu.</p>
    </header>

    <div class="projects-toolbar fade-up" id="projectsToolbar">
        <div class="projects-search">
            <i class="bi bi-search"></i>
            <input
                type="text"
                id="projectsSearch"
                placeholder="Ketik nama project..."
                aria-label="Cari project"
            >
        </div>

        <div class="projects-pills">
            @foreach(['all' => 'Semua', 'development' => 'Dev', 'done' => 'Selesai', 'planning' => 'Rencana'] as $value => $label)
                <button type="button" class="projects-pill {{ $loop->first ? 'is-active' : '' }}" data-status="{{ $value }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </div>

    <div class="projects-meta fade-up">
        <span><i class="bi bi-grid"></i> <span id="projectsCount">{{ $projects->count() }}</span> project ditemukan</span>
    </div>

    <div class="projects-list" id="projectsList">
        @forelse($projects as $project)
            <div
                class="project-row fade-up status-{{ $project->status }}"
                data-status="{{ $project->status }}"
                data-search="{{ strtolower($project->title . ' ' . $project->short_description) }}"
            >
                <article class="project-card">
                    <div class="project-card-top">
                        <div class="project-card-heading">
                            <span class="project-index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <div>
                                <h3>{{ $project->title }}</h3>
                                @if($project->badge)
                                    <span class="project-badge">{{ $project->badge }}</span>
                                @endif
                            </div>
                        </div>
                        <span class="project-status-chip status-{{ $project->status }}">
                            {{ $project->statusText() }}
                        </span>
                    </div>

                    <p class="project-desc">{{ $project->short_description }}</p>

                    @if(!empty($project->techTagsList()))
                        <div class="project-tags">
                            @foreach($project->techTagsList() as $tag)
                                <span>{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div class="project-card-bottom">
                        <div class="project-progress-compact">
                            <div class="progress-ring" style="--progress: {{ $project->progress }}">
                                <span>{{ $project->progress }}%</span>
                            </div>
                            <div>
                                <small>Progress</small>
                                <strong>{{ $project->progress >= 100 ? 'Selesai' : 'Dalam pengerjaan' }}</strong>
                            </div>
                        </div>

                        <button
                            type="button"
                            class="project-link-btn"
                            data-bs-toggle="collapse"
                            data-bs-target="#detail-{{ $project->slug }}"
                            aria-expanded="false"
                            aria-controls="detail-{{ $project->slug }}"
                        >
                            Selengkapnya
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </article>

                <div class="collapse project-detail-collapse" id="detail-{{ $project->slug }}" data-bs-parent="#projectsList">
                    @include('partials.project-detail-panel', ['project' => $project])
                </div>
            </div>
        @empty
            <div class="projects-empty fade-up">
                <i class="bi bi-inbox"></i>
                <h3>Belum ada project</h3>
                <p>Project akan ditampilkan di sini setelah dipublikasikan.</p>
            </div>
        @endforelse
    </div>

    <div class="projects-empty projects-empty-filtered d-none" id="projectsEmptyFiltered">
        <i class="bi bi-search"></i>
        <h3>Project tidak ditemukan</h3>
        <p>Coba ubah kata kunci pencarian atau filter status.</p>
    </div>
</section>

<section id="contact" class="contact-section container page-section">
    <div class="contact-header fade-up">
        <span class="section-label"><i class="bi bi-chat-dots"></i> Get In Touch</span>
        <h2 class="section-title mt-3 mb-3">{{ $site->contact_title }}</h2>
        <p class="section-subtitle mx-auto">{{ $site->contact_subtitle }}</p>
    </div>

    @if(session('success'))
        <div class="alert-portfolio-success fade-up" role="alert">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="contact-grid">
        <div class="contact-info-stack fade-up fade-up-delay-1">
            <div class="glass-card info-card">
                <div class="info-card-icon"><i class="bi bi-envelope-paper"></i></div>
                <h3>Kirim Pesan Langsung</h3>
                <p>Isi form di samping untuk mengirim pesan. Pesan akan masuk ke panel admin dan saya akan membacanya.</p>
            </div>

            <div class="glass-card info-card">
                <div class="info-card-icon"><i class="bi bi-clock-history"></i></div>
                <h3>Waktu Respon</h3>
                <p>Biasanya saya merespons dalam 1–2 hari kerja. Untuk pertanyaan terkait project atau kolaborasi, tulis detailnya di pesan.</p>
            </div>

            <div class="glass-card info-card">
                <div class="info-card-icon"><i class="bi bi-shield-check"></i></div>
                <h3>Data Aman</h3>
                <p>Informasi yang kamu kirim hanya digunakan untuk keperluan komunikasi dan tidak dibagikan ke pihak lain.</p>
            </div>
        </div>

        <div class="glass-card contact-form-card fade-up fade-up-delay-2">
            <h3 class="h4 mb-1">Form Contact</h3>
            <p class="text-secondary mb-4">Lengkapi data di bawah ini, lalu klik kirim pesan.</p>

            <form action="{{ route('contact.store') }}" method="POST">
                @csrf

                <div class="form-floating-custom">
                    <label for="name">Nama Lengkap</label>
                    <div class="input-wrap">
                        <i class="bi bi-person input-icon"></i>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control-portfolio @error('name') is-invalid @enderror"
                            placeholder="Contoh: Habiburrahman"
                            value="{{ old('name') }}"
                            required
                        >
                    </div>
                    @error('name')
                        <div class="text-danger small mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating-custom">
                    <label for="email">Email</label>
                    <div class="input-wrap">
                        <i class="bi bi-envelope input-icon"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control-portfolio @error('email') is-invalid @enderror"
                            placeholder="nama@email.com"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>
                    @error('email')
                        <div class="text-danger small mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating-custom">
                    <label for="message">Pesan</label>
                    <div class="input-wrap">
                        <i class="bi bi-chat-left-text input-icon"></i>
                        <textarea
                            id="message"
                            name="message"
                            class="form-control-portfolio @error('message') is-invalid @enderror"
                            placeholder="Tulis pesan atau pertanyaan kamu di sini..."
                            required
                        >{{ old('message') }}</textarea>
                    </div>
                    @error('message')
                        <div class="text-danger small mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-portfolio btn-portfolio-primary w-100">
                    <i class="bi bi-send-fill"></i>
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/projects-page.css') }}">
@endpush

@push('scripts')
<script>
    const projectsSearch = document.getElementById('projectsSearch');
    const projectsCount = document.getElementById('projectsCount');
    const projectsList = document.getElementById('projectsList');
    const projectsEmptyFiltered = document.getElementById('projectsEmptyFiltered');
    const projectRows = projectsList ? Array.from(projectsList.querySelectorAll('.project-row')) : [];
    const statusButtons = Array.from(document.querySelectorAll('.projects-pill[data-status]'));
    let activeStatus = 'all';

    const filterProjects = () => {
        const query = (projectsSearch?.value || '').trim().toLowerCase();
        let visibleCount = 0;

        projectRows.forEach((row) => {
            const matchesStatus = activeStatus === 'all' || row.dataset.status === activeStatus;
            const matchesSearch = query === '' || row.dataset.search.includes(query);
            const isVisible = matchesStatus && matchesSearch;

            row.classList.toggle('d-none', !isVisible);
            if (!isVisible) {
                row.querySelector('.collapse.show')?.classList.remove('show');
            }
            if (isVisible) visibleCount++;
        });

        if (projectsCount) projectsCount.textContent = visibleCount;
        if (projectsEmptyFiltered) {
            projectsEmptyFiltered.classList.toggle('d-none', visibleCount > 0 || projectRows.length === 0);
        }
    };

    projectsSearch?.addEventListener('input', filterProjects);

    statusButtons.forEach((button) => {
        button.addEventListener('click', () => {
            activeStatus = button.dataset.status;
            statusButtons.forEach((item) => item.classList.toggle('is-active', item === button));
            filterProjects();
        });
    });

    const openProjectFromHash = () => {
        const hash = window.location.hash.replace('#', '');
        if (!hash.startsWith('project-')) return;

        const slug = hash.replace('project-', '');
        const collapse = document.getElementById(`detail-${slug}`);
        if (!collapse) return;

        const projectsSection = document.getElementById('projects');
        projectsSection?.scrollIntoView({ behavior: 'smooth', block: 'start' });

        bootstrap.Collapse.getOrCreateInstance(collapse, { toggle: false }).show();
    };

    document.querySelectorAll('.project-detail-collapse').forEach((collapse) => {
        collapse.addEventListener('shown.bs.collapse', () => {
            const slug = collapse.id.replace('detail-', '');
            history.replaceState(null, '', `#project-${slug}`);
        });

        collapse.addEventListener('hidden.bs.collapse', () => {
            if (window.location.hash === `#project-${collapse.id.replace('detail-', '')}`) {
                history.replaceState(null, '', '#projects');
            }
        });
    });

    openProjectFromHash();
</script>
@endpush
