@extends('layouts.app')

@section('content')

<div class="container py-5 text-white">
    <div class="text-center mb-5">
        <span class="badge bg-primary px-3 py-2 rounded-pill mb-2">UTS - Pemrograman Web</span>
        <h1 class="display-4 fw-bold">Detail Project Akhir</h1>
        <p class="fs-5 text-secondary">Dokumentasi Resmi & Rencana Perancangan Sistem</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="card bg-dark text-white border-secondary mb-4 shadow">
                <div class="card-header bg-primary text-white fw-bold fs-5">
                    📌 1. Judul Project & Deskripsi Singkat
                </div>
                <div class="card-body">
                    <h3 class="text-primary fw-bold">Sistem Voting Skin Terfavorit Hero Yi Sun-shin (YSS)</h3>
                    <p class="lead mt-3">
                        <strong>Solusi yang Ditawarkan:</strong><br>
                        Aplikasi ini menawarkan platform berbasis web yang transparan dan interaktif bagi komunitas pemain Mobile Legends untuk melakukan pemungutan suara (voting) skin terbaik dari hero Yi Sun-shin. Dengan sistem ini, pengumpulan data preferensi skin menjadi lebih terstruktur, real-time, dan mencegah adanya manipulasi voting ganda melalui sistem autentikasi yang valid.
                    </p>
                </div>
            </div>

            <div class="card bg-dark text-white border-secondary mb-4 shadow">
                <div class="card-header bg-primary text-white fw-bold fs-5">
                    📊 2. Analisis Masalah & Kebutuhan Sistem
                </div>
                <div class="card-body">
                    <h5><strong>Latar Belakang:</strong></h5>
                    <p class="text-secondary">
                        Penentuan skin terfavorit di komunitas seringkali dilakukan secara manual melalui polling media sosial yang tidak akurat, mudah dimanipulasi, dan datanya tidak tersimpan dengan baik. Oleh karena itu, diperlukan sistem khusus yang dapat mendata setiap suara secara adil dan menyajikannya dalam bentuk grafik/informasi yang menarik.
                    </p>
                    
                    <h5 class="mt-4"><strong>Fitur Utama Sistem:</strong></h5>
                    <ul class="text-secondary">
                        <li><strong class="text-white">Autentikasi User:</strong> Registrasi dan login bagi para pemilih (voter) untuk memastikan 1 user hanya bisa memilih 1 kali.</li>
                        <li><strong class="text-white">Dashboard Katalog Skin:</strong> Menampilkan daftar skin hero YSS lengkap dengan gambar dan deskripsinya.</li>
                        <li><strong class="text-white">Fitur Voting Klik:</strong> Tombol interaktif untuk memberikan suara pada skin pilihan.</li>
                        <li><strong class="text-white">Real-Time Hasil / Polling:</strong> Menampilkan total perolehan suara dalam bentuk angka atau grafik interaktif setelah melakukan voting.</li>
                    </ul>
                </div>
            </div>

            <div class="card bg-dark text-white border-secondary mb-4 shadow">
                <div class="card-header bg-primary text-white fw-bold fs-5">
                    ⚙️ 3. Arsitektur & Tech Stack
                </div>
                <div class="card-body">
                    <p>Teknologi yang digunakan dalam pembangunan sistem ini (sesuai dengan kurikulum kelas Pemrograman Web):</p>
                    <table class="table table-dark table-striped border-secondary mt-3">
                        <thead>
                            <tr>
                                <th>Komponen</th>
                                <th>Teknologi</th>
                                <th>Penjelasan Fungsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold text-primary">Backend Framework</td>
                                <td>Laravel 10/11 (PHP)</td>
                                <td>Mengatur arsitektur MVC, routing web, pengamanan data, dan logika voting sistem.</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-primary">Frontend Styling</td>
                                <td>Bootstrap 5 & CSS</td>
                                <td>Membuat tampilan antarmuka (UI) web portofolio menjadi responsif, rapi, dan nyaman dilihat di HP maupun Laptop.</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-primary">Database Storage</td>
                                <td>MySQL</td>
                                <td>Menyimpan data pengguna (users), data informasi skin YSS, dan riwayat transaksi hasil voting.</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-primary">Environment / Server</td>
                                <td>Docker & Nginx</td>
                                <td>Sebagai containerisasi lokal agar server PHP dan database berjalan stabil dan serupa dengan kondisi server produksi.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card bg-dark text-white border-secondary mb-4 shadow">
                <div class="card-header bg-primary text-white fw-bold fs-5">
                    📐 4. Rencana Perancangan (Diagram Sistem)
                </div>
                <div class="card-body text-center">
                    <p class="text-start">Berikut adalah visualisasi alur logika sistem (Flowchart) atau hubungan tabel database (ERD) dari Sistem Voting Skin YSS:</p>
                    
                    <div class="p-3 bg-secondary rounded-3 my-4 d-inline-block w-100">
                        <img src="/images/erd-voting.png" alt="Diagram ERD / Flowchart Sistem Voting YSS" class="img-fluid rounded shadow" style="max-height: 500px; object-fit: contain;">
                    </div>
                    
                    <div class="alert alert-info bg-transparent border-info text-info text-start" role="alert">
                        <i class="bi bi-info-circle-fill"></i> <strong>Catatan Teoretis:</strong> Diagram di atas menggambarkan bagaimana entitas <em>User</em> melakukan relasi <em>One-to-Many</em> terhadap entitas <em>Vote</em>, yang mana setiap data pilihan akan terikat langsung dengan ID Skin YSS yang terdaftar di database MySQL.
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="/pdf/laporanyss.pdf" target="_blank" class="btn btn-primary btn-lg rounded-pill px-4 me-3 shadow-sm">
                    <i class="bi bi-file-earmark-pdf-fill me-1"></i> Download Laporan (PDF)
                </a>
                <a href="/" class="btn btn-outline-light btn-lg rounded-pill px-4 shadow-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Portofolio Utama
                </a>
            </div>

        </div>
    </div>
</div>

@endsection