@extends('layouts.app')

@section('content')

<div class="container py-5 text-white">
    <div class="text-center mb-5">
        @if($project->detail_badge)
            <span class="badge bg-primary px-3 py-2 rounded-pill mb-2">{{ $project->detail_badge }}</span>
        @endif
        <h1 class="display-4 fw-bold">{{ $project->title }}</h1>
        @if($project->detail_subtitle)
            <p class="fs-5 text-secondary">{{ $project->detail_subtitle }}</p>
        @endif
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">

            @if($project->solution_description)
                <div class="card bg-dark text-white border-secondary mb-4 shadow">
                    <div class="card-header bg-primary text-white fw-bold fs-5">
                        📌 1. Judul Project & Deskripsi Singkat
                    </div>
                    <div class="card-body">
                        <h3 class="text-primary fw-bold">{{ $project->title }}</h3>
                        <p class="lead mt-3">
                            <strong>Solusi yang Ditawarkan:</strong><br>
                            {{ $project->solution_description }}
                        </p>
                    </div>
                </div>
            @endif

            @if($project->background_detail || !empty($project->features))
                <div class="card bg-dark text-white border-secondary mb-4 shadow">
                    <div class="card-header bg-primary text-white fw-bold fs-5">
                        📊 2. Analisis Masalah & Kebutuhan Sistem
                    </div>
                    <div class="card-body">
                        @if($project->background_detail)
                            <h5><strong>Latar Belakang:</strong></h5>
                            <p class="text-secondary">{{ $project->background_detail }}</p>
                        @endif

                        @if(!empty($project->features))
                            <h5 class="mt-4"><strong>Fitur Utama Sistem:</strong></h5>
                            <ul class="text-secondary">
                                @foreach($project->features as $feature)
                                    <li>
                                        <strong class="text-white">{{ $feature['title'] ?? '' }}:</strong>
                                        {{ $feature['description'] ?? '' }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endif

            @if(!empty($project->architecture))
                <div class="card bg-dark text-white border-secondary mb-4 shadow">
                    <div class="card-header bg-primary text-white fw-bold fs-5">
                        ⚙️ 3. Arsitektur & Tech Stack
                    </div>
                    <div class="card-body">
                        <p>Teknologi yang digunakan dalam pembangunan sistem ini:</p>
                        <table class="table table-dark table-striped border-secondary mt-3">
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
                                        <td class="fw-bold text-primary">{{ $row['component'] ?? '' }}</td>
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
                <div class="card bg-dark text-white border-secondary mb-4 shadow">
                    <div class="card-header bg-primary text-white fw-bold fs-5">
                        📐 4. Rencana Perancangan (Diagram Sistem)
                    </div>
                    <div class="card-body text-center">
                        @if($project->diagramImageUrl())
                            <div class="p-3 bg-secondary rounded-3 my-4 d-inline-block w-100">
                                <img src="{{ $project->diagramImageUrl() }}" alt="Diagram {{ $project->title }}" class="img-fluid rounded shadow" style="max-height: 500px; object-fit: contain;">
                            </div>
                        @endif

                        @if($project->diagram_note)
                            <div class="alert alert-info bg-transparent border-info text-info text-start" role="alert">
                                <i class="bi bi-info-circle-fill"></i> <strong>Catatan Teoretis:</strong> {{ $project->diagram_note }}
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <div class="text-center mt-5">
                @if($project->pdfFileUrl())
                    <a href="{{ $project->pdfFileUrl() }}" target="_blank" class="btn btn-primary btn-lg rounded-pill px-4 me-3 shadow-sm">
                        <i class="bi bi-file-earmark-pdf-fill me-1"></i> Download Laporan (PDF)
                    </a>
                @endif
                <a href="{{ route('projects.index') }}" class="btn btn-outline-light btn-lg rounded-pill px-4 shadow-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Project
                </a>
            </div>

        </div>
    </div>
</div>

@endsection
