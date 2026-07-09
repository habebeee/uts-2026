@extends('layouts.app')

@section('title', ($site->contact_title ?? 'Contact') . ' | Portfolio')

@section('content')
<section class="contact-page container">
    <div class="contact-header fade-up">
        <span class="section-label"><i class="bi bi-chat-dots"></i> Get In Touch</span>
        <h1 class="section-title mt-3 mb-3">{{ $site->contact_title }}</h1>
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

            <div class="glass-card info-card">
                <div class="info-card-icon"><i class="bi bi-mortarboard"></i></div>
                <h3>Tentang Saya</h3>
                <p>{{ $site->student_name }} · NIM {{ $site->student_nim }}. Mahasiswa IT yang fokus pada pengembangan web modern.</p>
            </div>
        </div>

        <div class="glass-card contact-form-card fade-up fade-up-delay-2">
            <h2 class="h4 mb-1">Form Contact</h2>
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
