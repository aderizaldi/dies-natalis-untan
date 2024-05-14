@extends('landing.layouts.main')
@section('content')
    <main id="main">
        <section id="main-section" class="main-section section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Berita</h3>
                </div>

                <div class="row">
                    @foreach ($beritas as $berita)
                        <div class="col-lg-4 py-3 col-md-12">
                            <a href="{{ route('detail_berita', $berita->slug) }}">
                                <div class="card border border-0 shadow-sm rounded">
                                    <img src="{{ filter_var($berita->gambar, FILTER_VALIDATE_URL) ? $berita->gambar : asset('storage/' . $berita->gambar) }}"
                                        class="card-img-top" alt="..." style="height: 200px; object-fit: cover;"
                                        loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $berita->judul }}</h5>
                                        <div class="tags">
                                            @foreach ($berita->beritaTags as $tag)
                                                <span class="badge bg-primary">{{ $tag->tag }}</span>
                                            @endforeach
                                        </div>
                                        <p class="card-text"><small
                                                class="text-muted">{{ $berita->tanggal->format('d M Y H:i') }}</small></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-12 w-full d-flex justify-content-center mt-5">
                        {{ $beritas->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
