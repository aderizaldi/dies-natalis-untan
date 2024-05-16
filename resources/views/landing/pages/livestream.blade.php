@extends('landing.layouts.main')
@section('content')
    <main id="main">
        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Livestream</h3>
                </div>
                <div class="galeri-video">
                    {{-- iframe youtube --}}
                    <div class="row">
                        <div class="col-12 w-full d-flex justify-content-center">
                            <iframe width="560" height="315" src="{{ $video_livestream->value }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
