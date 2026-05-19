@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="display-5 fw-bold text-white">Project Detail</h1>
        <p class="fs-4 text-primary">Sistem Voting Skin YSS</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-3 shadow-lg bg-light rounded-4">
                <h5 class="card-title mb-3 fw-bold text-dark text-center">
                     📄 Laporan Hasil Project
                </h5>
                
                <iframe 
                    src="/pdf/LaporanProjectAkhir.pdf" 
                    width="100%" 
                    height="700px" 
                    style="border: none;"
                    class="rounded-3"
                >
                   <iframe 
    src="/LaporanProjectAkhir.pdf" 
    width="100%" 
    height="700px" 
    style="border: none;"
    class="rounded-3"
>
    Browser Anda tidak mendukung preview PDF. 
    <a href="/LaporanProjectAkhir.pdf">Klik di sini untuk mengunduh PDF.</a>
</iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection