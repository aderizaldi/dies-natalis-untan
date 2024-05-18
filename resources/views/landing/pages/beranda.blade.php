@extends('landing.layouts.main')
@section('content')
    <section id="hero" class="d-flex align-items-center"
        style="
        background: url('{{ asset('storage/' . $gambar_header->value) }}') top left; width: 100%;
        height: 85vh;
        background-size: cover;
        position: relative;
        ">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Dies Natalis ke-65 Universitas Tanjungpura</h1>
            <h2>Menuju Masa Depan Berkelanjutan: Aksi Transisi Ke Ekonomi Hijau</h2>
            <div class="d-flex">
                <a href="{{ route('agenda') }}" class="btn-get-started scrollto">Lihat Agenda</a>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <section id="timeline-section" class="timeline-section section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Agenda</h2>
                    <h3>Ikuti Agenda Kami</h3>
                </div>

                <div class="row">
                    <div id="timeline">
                        {{-- <div class="row timeline-movement timeline-movement-top">
                            <div class="timeline-badge timeline-future-movement">
                                <p>2018</p>
                            </div>
                        </div> --}}
                        @foreach ($agendas as $agenda)
                            @if ($loop->odd)
                                <div class="row timeline-movement">
                                    <div class="timeline-badge center-left">

                                    </div>
                                    <div class="col-md-6 timeline-item">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="timeline-panel credits">
                                                    <ul class="timeline-panel-ul">
                                                        <div class="lefting-wrap">
                                                            <li class="img-wraping"><a
                                                                    href="{{ $agenda->redirect ?? route('detail_agenda', $agenda->slug) }}"><img
                                                                        src="{{ filter_var($agenda->gambar, FILTER_VALIDATE_URL) ? $agenda->gambar : asset('storage/' . $agenda->gambar) }}"
                                                                        class="img-responsive" alt="Agenda Image"
                                                                        loading="lazy" /></a>
                                                            </li>
                                                        </div>
                                                        <div class="righting-wrap">
                                                            <li><a href="{{ $agenda->redirect ?? route('detail_agenda', $agenda->slug) }}"
                                                                    class="importo">{{ $agenda->judul }}</a></li>
                                                            <li><span
                                                                    class="causale">{{ $agenda->deskripsi_singkat }}</span>
                                                            </li>
                                                            <li>
                                                                <p><small class="text-muted"><i
                                                                            class="glyphicon glyphicon-time"></i>
                                                                        {{ $agenda->tanggal->format('d M Y, H:i') }}</small>
                                                                </p>
                                                            </li>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->even)
                                <div class="row timeline-movement">
                                    <div class="timeline-badge center-right">

                                    </div>
                                    <div class="offset-md-6 col-md-6 timeline-item">
                                        <div class="row">
                                            <div class="offset-sm-1 col-md-11">
                                                <div class="timeline-panel debits">
                                                    <ul class="timeline-panel-ul">
                                                        <div class="lefting-wrap">
                                                            <li class="img-wraping"><a
                                                                    href="{{ $agenda->redirect ?? route('detail_agenda', $agenda->slug) }}"><img
                                                                        src="{{ filter_var($agenda->gambar, FILTER_VALIDATE_URL) ? $agenda->gambar : asset('storage/' . $agenda->gambar) }}"
                                                                        class="img-responsive" alt="Agenda Image"
                                                                        loading="lazy" /></a>
                                                            </li>
                                                        </div>
                                                        <div class="righting-wrap">
                                                            <li><a href="{{ $agenda->redirect ?? route('detail_agenda', $agenda->slug) }}"
                                                                    class="importo">{{ $agenda->judul }}</a></li>
                                                            <li><span
                                                                    class="causale">{{ $agenda->deskripsi_singkat }}</span>
                                                            </li>
                                                            <li>
                                                                <p><small class="text-muted"><i
                                                                            class="glyphicon glyphicon-time"></i>
                                                                        {{ $agenda->tanggal->format('d M Y, H:i') }}</small>
                                                                </p>
                                                            </li>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="w-full">
                    {{-- tombol selengkapnya --}}
                    <div class="text-center mt-4">
                        <a href="{{ route('agenda') }}" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="berita-section" class="berita-section">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Berita</h2>
                    <h3>Baca Berita Dari Kami</h3>
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
                    <div class="col-12">
                        {{-- tombol selengkapnya --}}
                        <div class="text-center mt-4">
                            <a href="{{ route('berita') }}" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="berita-section" class="berita-section section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Testimoni</h2>
                    <h3>Testimoni Rektor UNTAN</h3>
                </div>

                <div class="row">
                    <div class="col-12 w-full d-flex justify-content-center">
                        <iframe width="560" height="315" src="{{ $video_testimoni->value }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection
