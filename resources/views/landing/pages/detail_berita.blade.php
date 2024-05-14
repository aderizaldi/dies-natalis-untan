@extends('landing.layouts.main')
@section('content')
    <main id="main">
        <section id="main-section" class="main-section section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title text-start">
                    <h3>{{ $berita->judul }}</h3>
                </div>

                <div class="row">
                    {{-- detail berita berita terdiri dari tanggal upload berita, gambar, deskripsi berita, dan tags. Tanpa menggunakan card --}}
                    {{-- tanggal upload --}}
                    <div class="col-lg-12">
                        <p class="text-muted text-start">Tanggal Upload: {{ $berita->tanggal->format('d M Y H:i') }}</p>
                    </div>
                    {{-- gambar --}}
                    <div class="col-lg-12">
                        <img src="{{ filter_var($berita->gambar, FILTER_VALIDATE_URL) ? $berita->gambar : asset('storage/' . $berita->gambar) }}"
                            class="img-fluid" alt="..." loading="lazy">
                    </div>
                    {{-- deskripsi berita --}}
                    <div class="col-lg-12 mt-5 text-content">
                        {!! $berita->deskripsi !!}
                    </div>
                    {{-- tag berita. menggunakan badge bootstrap --}}
                    <div class="col-lg-12 mt-5">
                        <p class="text-muted text-start">Tags: @foreach ($berita->beritaTags as $tag)
                                <span class="badge bg-primary">{{ $tag->tag }}</span>
                            @endforeach
                        </p>
                    </div>
                </div>
        </section>
    </main>
@endsection
