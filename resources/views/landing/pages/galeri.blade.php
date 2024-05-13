@extends('landing.layouts.main')
@section('content')
    <main id="main">
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Galeri</h3>
                </div>

                <div class="galeri-video">
                    <h4>Video</h4>
                    {{-- iframe youtube --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="galeri-item" style="height: 70vh">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/7e90gBu4pas"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="galeri-foto mt-5">
                    <h4>Foto</h4>
                    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <img src="{{ asset('assets/img/portfolio/portfolio-1.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>App</p>
                                <a href="{{ asset('assets/img/portfolio/portfolio-1.jpg') }}"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="App 1"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <img src="{{ asset('assets/img/portfolio/portfolio-2.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <a href="{{ asset('assets/img/portfolio/portfolio-2.jpg') }}"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="Web 3"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <img src="{{ asset('assets/img/portfolio/portfolio-3.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>App</p>
                                <a href="{{ asset('assets/img/portfolio/portfolio-3.jpg') }}"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="App 2"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                            <img src="{{ asset('assets/img/portfolio/portfolio-4.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 2</h4>
                                <p>Card</p>
                                <a href="{{ asset('assets/img/portfolio/portfolio-4.jpg') }}"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="Card 2"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <img src="{{ asset('assets/img/portfolio/portfolio-5.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 2</h4>
                                <p>Web</p>
                                <a href="{{ asset('assets/img/portfolio/portfolio-5.jpg') }}"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="Web 2"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <img src="{{ asset('assets/img/portfolio/portfolio-6.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>App</p>
                                <a href="{{ asset('assets/img/portfolio/portfolio-6.jpg') }}"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="App 3"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                            <img src="{{ asset('assets/img/portfolio/portfolio-7.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Card 1</h4>
                                <p>Card</p>
                                <a href="{{ asset('assets/img/portfolio/portfolio-7.jpg') }}"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="Card 1"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                            <img src="{{ asset('assets/img/portfolio/portfolio-8.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Card 3</h4>
                                <p>Card</p>
                                <a href="{{ asset('assets/img/portfolio/portfolio-8.jpg') }}"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="Card 3"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <img src="{{ asset('assets/img/portfolio/portfolio-9.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <a href="{{ asset('assets/img/portfolio/portfolio-9.jpg') }}"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="Web 3"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection
