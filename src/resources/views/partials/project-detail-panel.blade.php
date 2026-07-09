<div class="project-detail-panel glass-card" id="project-{{ $project->slug }}">
    <div class="project-detail-header">
        <div>
            @if($project->detail_badge)
                <span class="section-label">{{ $project->detail_badge }}</span>
            @endif
            <h3 class="project-detail-title">{{ $project->title }}</h3>
            @if($project->detail_subtitle)
                <p class="project-detail-subtitle">{{ $project->detail_subtitle }}</p>
            @endif
        </div>
        <button type="button" class="project-detail-close" data-bs-toggle="collapse" data-bs-target="#detail-{{ $project->slug }}" aria-label="Tutup detail">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    @if($project->solution_description)
        <div class="project-detail-block">
            <h4><i class="bi bi-pin-angle"></i> Deskripsi Singkat</h4>
            <p class="project-detail-lead">{{ $project->solution_description }}</p>
        </div>
    @endif

    @if(!empty($project->problemsList()))
        <div class="project-detail-block">
            <h4><i class="bi bi-exclamation-triangle"></i> Analisis Masalah</h4>
            <ul class="project-detail-list">
                @foreach($project->problemsList() as $problem)
                    <li>{{ $problem }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(!empty($project->features))
        <div class="project-detail-block">
            <h4><i class="bi bi-list-check"></i> Kebutuhan Sistem</h4>
            <ul class="project-detail-list">
                @foreach($project->features as $feature)
                    <li>
                        <strong>{{ $feature['title'] ?? '' }}:</strong>
                        {{ $feature['description'] ?? '' }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(!empty($project->architecture))
        <div class="project-detail-block">
            <h4><i class="bi bi-gear"></i> Arsitektur & Tech Stack</h4>
            <div class="project-detail-table-wrap">
                <table class="project-detail-table">
                    <thead>
                        <tr>
                            <th>Komponen</th>
                            <th>Teknologi</th>
                            <th>Penjelasan Fungsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project->architecture as $row)
                            <tr>
                                <td>{{ $row['component'] ?? '' }}</td>
                                <td>{{ $row['technology'] ?? '' }}</td>
                                <td>{{ $row['description'] ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    @if($project->diagramImageUrl() || $project->diagram_note)
        <div class="project-detail-block">
            <h4><i class="bi bi-diagram-3"></i> Flowchart</h4>
            @if($project->diagramImageUrl())
                <div class="project-detail-diagram">
                    <img src="{{ $project->diagramImageUrl() }}" alt="Flowchart {{ $project->title }}">
                </div>
            @endif
            @if($project->diagram_note)
                <p class="project-detail-note"><i class="bi bi-info-circle"></i> {{ $project->diagram_note }}</p>
            @endif
        </div>
    @endif

    <div class="project-detail-actions">
        @if($project->pdfFileUrl())
            <a href="{{ $project->pdfFileUrl() }}" target="_blank" class="btn-portfolio btn-portfolio-primary">
                <i class="bi bi-file-earmark-pdf-fill"></i> Download Laporan (PDF)
            </a>
        @endif
        <button type="button" class="btn-portfolio btn-portfolio-secondary" data-bs-toggle="collapse" data-bs-target="#detail-{{ $project->slug }}">
            <i class="bi bi-arrow-up"></i> Tutup Detail
        </button>
    </div>
</div>
