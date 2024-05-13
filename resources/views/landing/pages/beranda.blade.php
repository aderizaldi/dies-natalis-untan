@extends('landing.layouts.main')
@section('content')
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Dies Natalis Untan Ke-66</h1>
            <h2>Menuju Masa Depan Berkelanjutan: Aksi Transisi Ke Ekonomi Hijau</h2>
            <div class="d-flex">
                <a href="{{ route('agenda') }}" class="btn-get-started scrollto">Lihat Agenda</a>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <section id="timeline-section" class="timeline-section">
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
                                                            href="{{ route('detail_agenda', 'detail-agenda') }}"><img
                                                                src="http://via.placeholder.com/250/000000"
                                                                class="img-responsive" alt="user-image" /></a></li>
                                                </div>
                                                <div class="righting-wrap">
                                                    <li><a href="{{ route('detail_agenda', 'detail-agenda') }}"
                                                            class="importo">Mussum ipsum cacilds</a></li>
                                                    <li><span class="causale"
                                                            style="color:#000; font-weight: 600;">Developer </span> </li>
                                                    <li><span class="causale">Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit. </span> </li>
                                                    <li>
                                                        <p><small class="text-muted"><i
                                                                    class="glyphicon glyphicon-time"></i> 13/01/2018,
                                                                13:05"</small></p>
                                                    </li>
                                                </div>
                                                <div class="clear"></div>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

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
                                                            href="{{ route('detail_agenda', 'detail-agenda') }}"><img
                                                                src="http://via.placeholder.com/250/000000"
                                                                class="img-responsive" alt="user-image" /></a></li>
                                                </div>
                                                <div class="righting-wrap">
                                                    <li><a href="{{ route('detail_agenda', 'detail-agenda') }}"
                                                            class="importo">Mussum ipsum cacilds</a></li>
                                                    <li><span class="causale" style="color:#000; font-weight: 600;">Web
                                                            Designer </span> </li>
                                                    <li><span class="causale">Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit. </span> </li>
                                                    <li>
                                                        <p><small class="text-muted"><i
                                                                    class="glyphicon glyphicon-time"></i> 12/01/2018,
                                                                13:05"</small></p>
                                                    </li>
                                                </div>
                                                <div class="clear"></div>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

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
                                                            href="{{ route('detail_agenda', 'detail-agenda') }}"><img
                                                                src="http://via.placeholder.com/250/000000"
                                                                class="img-responsive" alt="user-image" /></a></li>
                                                </div>
                                                <div class="righting-wrap">
                                                    <li><a href="{{ route('detail_agenda', 'detail-agenda') }}"
                                                            class="importo">Mussum ipsum cacilds</a></li>
                                                    <li><span class="causale" style="color:#000; font-weight: 600;">Engineer
                                                        </span> </li>
                                                    <li><span class="causale">Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit. </span> </li>
                                                    <li>
                                                        <p><small class="text-muted"><i
                                                                    class="glyphicon glyphicon-time"></i> 11/01/2018,
                                                                13:05"</small></p>
                                                    </li>
                                                </div>
                                                <div class="clear"></div>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row timeline-movement timeline-movement-top">
                            <div class="timeline-badge timeline-future-movement">
                                <p>2017</p>
                            </div>
                        </div> --}}


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
                                                            href="{{ route('detail_agenda', 'detail-agenda') }}"><img
                                                                src="http://via.placeholder.com/250/000000"
                                                                class="img-responsive" alt="user-image" /></a></li>
                                                </div>
                                                <div class="righting-wrap">
                                                    <li><a href="{{ route('detail_agenda', 'detail-agenda') }}"
                                                            class="importo">Mussum ipsum cacilds</a></li>
                                                    <li><span class="causale" style="color:#000; font-weight: 600;">Web
                                                            Designer </span> </li>
                                                    <li><span class="causale">Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit. </span> </li>
                                                    <li>
                                                        <p><small class="text-muted"><i
                                                                    class="glyphicon glyphicon-time"></i> 12/01/2018,
                                                                13:05"</small></p>
                                                    </li>
                                                </div>
                                                <div class="clear"></div>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


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
                                                            href="{{ route('detail_agenda', 'detail-agenda') }}"><img
                                                                src="http://via.placeholder.com/250/000000"
                                                                class="img-responsive" alt="user-image" /></a></li>
                                                </div>
                                                <div class="righting-wrap">
                                                    <li><a href="{{ route('detail_agenda', 'detail-agenda') }}"
                                                            class="importo">Mussum ipsum cacilds</a></li>
                                                    <li><span class="causale"
                                                            style="color:#000; font-weight: 600;">Engineer </span> </li>
                                                    <li><span class="causale">Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit. </span> </li>
                                                    <li>
                                                        <p><small class="text-muted"><i
                                                                    class="glyphicon glyphicon-time"></i> 11/01/2018,
                                                                13:05"</small></p>
                                                    </li>
                                                </div>
                                                <div class="clear"></div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="berita-section" class="berita-section section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Berita</h2>
                    <h3>Baca Berita Dari Kami</h3>
                </div>

                <div class="row">
                    <div class="col-lg-4 py-3 col-md-12">
                        <a href="{{ route('detail_berita', 'detail-berita') }}">
                            <div class="card border border-0 shadow-sm rounded">
                                <img src="http://via.placeholder.com/250/000000" class="card-img-top" alt="..."
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 py-3 col-md-12">
                        <a href="{{ route('detail_berita', 'detail-berita') }}">
                            <div class="card border border-0 shadow-sm rounded">
                                <img src="http://via.placeholder.com/250/000000" class="card-img-top" alt="..."
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 py-3 col-md-12">
                        <a href="{{ route('detail_berita', 'detail-berita') }}">
                            <div class="card border border-0 shadow-sm rounded">
                                <img src="http://via.placeholder.com/250/000000" class="card-img-top" alt="..."
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12">
                        {{-- tombol selengkapnya --}}
                        <div class="text-center mt-4">
                            <a href="{{ route('berita') }}" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection
