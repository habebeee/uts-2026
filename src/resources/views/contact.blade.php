@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <div class="text-center mt-4">
        <h1 class="display-4 fw-bold text-white">Contact Me</h1>
        <p class="mt-3 text-secondary">Feel free to contact me</p>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-6">

            <form action="#" method="POST">
                @csrf <div class="mb-3">
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control" 
                        placeholder="Nama Anda:" 
                        required
                    >
                </div>

                <div class="mb-3">
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control" 
                        placeholder="Email:" 
                        required
                    >
                </div>

                <div class="mb-3">
                    <textarea 
                        name="message" 
                        class="form-control" 
                        rows="5" 
                        placeholder="Pesan" 
                        required
                    ></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold py-2">
                    Send Message
                </button>

            </form>

        </div>
    </div>

</div>
@endsection