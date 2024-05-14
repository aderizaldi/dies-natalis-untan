@extends('landing.layouts.main')
@section('content')
    <main id="main">
        <section id="main-section" class="main-section section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title text-start">
                    <h3>{{ $agenda->judul }}</h3>
                </div>

                <div class="row">
                    {{-- tanggal agenda --}}
                    <div class="col-lg-12">
                        <p class="text-muted text-start">Waktu agenda: {{ $agenda->tanggal->format('d M Y, H:i') }}</p>
                    </div>
                    {{-- gambar --}}
                    <div class="col-lg-12">
                        <img src="{{ filter_var($agenda->gambar, FILTER_VALIDATE_URL) ? $agenda->gambar : asset('storage/' . $agenda->gambar) }}"
                            class="img-fluid" alt="..." loading="lazy">
                    </div>
                    {{-- deskripsi berita --}}
                    <div class="col-lg-12 mt-5 text-content">
                        {!! $agenda->deskripsi !!}
                    </div>
                </div>
        </section>
    </main>
@endsection
