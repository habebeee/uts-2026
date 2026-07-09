@extends('layouts.app')

@section('title', 'Projects | Portfolio')

@section('content')
<section class="projects-page">
    <div class="container">
        <header class="projects-header fade-up">
            <span class="section-label"><i class="bi bi-kanban"></i> Portfolio Work</span>
            <h1>Katalog <span class="text-gradient-accent">Project</span></h1>
            <p>Ringkasan project yang pernah dan sedang dikerjakan. Gunakan pencarian atau filter status untuk menemukan project tertentu.</p>
        </header>

        <form method="GET" action="{{ route('projects.index') }}" class="projects-toolbar fade-up" id="projectsFilterForm">
            <div class="projects-search">
                <i class="bi bi-search"></i>
                <input
                    type="text"
                    name="q"
                    value="{{ $search }}"
                    placeholder="Ketik nama project..."
                    aria-label="Cari project"
                >
            </div>

            <div class="projects-pills">
                @foreach(['all' => 'Semua', 'development' => 'Dev', 'done' => 'Selesai', 'planning' => 'Rencana'] as $value => $label)
                    <label class="projects-pill {{ $status === $value ? 'is-active' : '' }}">
                        <input type="radio" name="status" value="{{ $value }}" @checked($status === $value) onchange="this.form.submit()">
                        {{ $label }}
                    </label>
                @endforeach
            </div>
        </form>

        <div class="projects-meta fade-up">
            <span><i class="bi bi-grid"></i> {{ $projects->count() }} project ditemukan</span>
        </div>

        <div class="projects-grid">
            @forelse($projects as $project)
                <article class="project-card fade-up status-{{ $project->status }}">
                    <div class="project-card-top">
                        <div class="project-card-heading">
                            <span class="project-index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <div>
                                <h2>{{ $project->title }}</h2>
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

                        <a href="{{ route('projects.show', $project) }}" class="project-link-btn">
                            Selengkapnya
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            @empty
                <div class="projects-empty fade-up">
                    <i class="bi bi-inbox"></i>
                    <h3>Belum ada project</h3>
                    <p>Coba ubah kata kunci pencarian atau filter status.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/projects-page.css') }}">
@endpush

@push('scripts')
<script>
    document.body.classList.add('has-projects-page');
</script>
@endpush
