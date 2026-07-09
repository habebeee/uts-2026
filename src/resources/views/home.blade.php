@extends('layouts.app')

@section('title', ($site->home_name_highlight ?? 'Portfolio') . ' | Portfolio')

@section('content')
<section class="hero-section container">
    <div class="hero-grid">
        <div class="hero-visual fade-up">
            <div class="profile-ring">
                <img src="{{ $site->profileImageUrl() }}" alt="Foto {{ $site->home_name_highlight }}">
            </div>
        </div>

        <div class="hero-content fade-up fade-up-delay-1">
            <span class="section-label">
                <i class="bi bi-stars"></i>
                {{ $site->home_welcome_badge }}
            </span>

            <h1>
                {{ $site->home_greeting }}
                <span class="text-gradient-accent">{{ $site->home_name_highlight }}</span>
            </h1>

            <p class="hero-subtitle">{{ $site->home_subtitle }}</p>

            <div class="tech-stack">
                @foreach($skills as $skill)
                    <span class="tech-badge {{ $skill->css_class }}">{{ $skill->name }}</span>
                @endforeach
            </div>

            <div class="hero-bio glass-card">
                <p>{!! nl2br(e($site->home_bio)) !!}</p>
            </div>

            @if($site->home_quote)
                <p class="hero-quote mb-0">"{{ $site->home_quote }}"</p>
            @endif

            <div class="hero-actions">
                <a href="{{ route('projects.index') }}" class="btn-portfolio btn-portfolio-primary">
                    <i class="bi bi-folder2-open"></i>
                    Lihat Projects
                </a>
                <a href="{{ route('contact.index') }}" class="btn-portfolio btn-portfolio-secondary">
                    <i class="bi bi-send"></i>
                    Hubungi Saya
                </a>
            </div>
        </div>
    </div>

    @if($projects->isNotEmpty())
        <section class="featured-section fade-up fade-up-delay-2">
            <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-2">
                <div>
                    <span class="section-label"><i class="bi bi-lightning-charge"></i> Featured Work</span>
                    <h2 class="section-title mt-3 mb-2">Project Terbaru</h2>
                    <p class="section-subtitle mb-0">Beberapa project yang sedang atau pernah saya kembangkan.</p>
                </div>
                <a href="{{ route('projects.index') }}" class="btn-portfolio btn-portfolio-secondary">
                    Semua Project <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="featured-grid">
                @foreach($projects as $project)
                    <article class="glass-card project-preview-card">
                        @if($project->badge)
                            <span class="section-label">{{ $project->badge }}</span>
                        @endif
                        <h3>{{ $project->title }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit($project->short_description, 140) }}</p>
                        <a href="{{ route('projects.show', $project) }}" class="btn-portfolio btn-portfolio-secondary">
                            Lihat Detail <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </article>
                @endforeach
            </div>
        </section>
    @endif
</section>
@endsection
