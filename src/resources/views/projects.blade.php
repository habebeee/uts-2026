@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h1 class="mb-4 fw-bold text-primary">
        Sistem Voting Skin Terfavorit Hero Yi Sun-shin (YSS)
    </h1>

    <p class="lead">
        Website voting online berbasis Laravel yang digunakan untuk membantu komunitas pemain Mobile Legends melakukan voting skin favorit hero Yi Sun-shin secara real-time dan terstruktur.
    </p>

    <hr class="my-4">

    <div class="row">
        <div class="col-md-6">
            <h3>Latar Belakang</h3>
            <p>Dalam komunitas Mobile Legends, voting skin favorit biasanya hanya dilakukan melalui media sosial atau polling sederhana sehingga hasil voting sulit dikelola dan kurang terstruktur.</p>
        </div>
        <div class="col-md-6">
            <h3>Rumusan Masalah</h3>
            <ul>
                <li>Membuat sistem voting skin berbasis website.</li>
                <li>Mengurangi spam/manipulasi voting.</li>
                <li>Mengelola data voting secara sentral.</li>
                <li>Menampilkan hasil voting real-time.</li>
            </ul>
        </div>
    </div>

    <div class="card my-4 border-primary">
        <div class="card-body">
            <h3>Arsitektur & Tech Stack</h3>
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li><strong>Backend:</strong> Laravel & PHP</li>
                        <li><strong>Database:</strong> MariaDB (MySQL)</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li><strong>Frontend:</strong> Bootstrap 5</li>
                        <li><strong>Server:</strong> Docker (Containerization)</li>
                    </ul>
                </div>
            </div>
            
            <h4 class="mt-4">Perancangan Sistem (ERD/Flowchart)</h4>
            <div class="text-center p-3 border rounded bg-light">
                <img src="/images/flowchart.png" alt="Diagram Sistem Voting" class="img-fluid">
                <p class="small text-muted mt-2">Visualisasi alur logika sistem voting</p>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="/pdf/laporanyss.pdf" class="btn btn-danger btn-lg">
            <i class="bi bi-file-earmark-pdf"></i> Download Laporan Lengkap (PDF)
        </a>
    </div>

</div>

@endsection