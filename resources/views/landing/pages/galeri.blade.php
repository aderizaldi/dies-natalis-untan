@extends('landing.layouts.main')
@section('content')
    <main id="main">
        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Galeri</h3>
                </div>

                <div class="galeri-foto mt-5">
                    <h4>Selamat Datang</h4>
                    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($gambar_selamat_datang as $gambar)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <img src="{{ filter_var($gambar->gambar, FILTER_VALIDATE_URL) ? $gambar->gambar : asset('storage/' . $gambar->gambar) }}"
                                    class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $gambar->judul }}</h4>
                                    <a href="{{ filter_var($gambar->gambar, FILTER_VALIDATE_URL) ? $gambar->gambar : asset('storage/' . $gambar->gambar) }}"
                                        data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                        title="{{ $gambar->judul }}"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 w-full d-flex justify-content-center">
                            {{ $gambar_selamat_datang->appends(['selamat-datang' => $gambar_selamat_datang->currentPage()])->links() }}
                        </div>
                    </div>
                </div>

                <hr class="mt-5">
                <div class="galeri-foto mt-5">
                    <h4>Kegiatan</h4>
                    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($gambar_kegiatan as $gambar)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <img src="{{ filter_var($gambar->gambar, FILTER_VALIDATE_URL) ? $gambar->gambar : asset('storage/' . $gambar->gambar) }}"
                                    class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $gambar->judul }}</h4>
                                    <a href="{{ filter_var($gambar->gambar, FILTER_VALIDATE_URL) ? $gambar->gambar : asset('storage/' . $gambar->gambar) }}"
                                        data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                        title="{{ $gambar->judul }}"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 w-full d-flex justify-content-center">
                            {{ $gambar_kegiatan->appends(['kegiatan' => $gambar_kegiatan->currentPage()])->links() }}
                        </div>
                    </div>
                </div>

                <hr class="mt-5">
                <div class="galeri-video">
                    <h4>Video</h4>
                    {{-- iframe youtube --}}
                    <div class="row">
                        <div class="col-12 w-full d-flex justify-content-center">
                            <iframe width="560" height="315" src="{{ $video->url }}" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
