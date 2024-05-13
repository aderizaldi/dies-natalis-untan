@extends('landing.layouts.main')
@section('content')
    <main id="main">
        <section id="main-section" class="main-section section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h3>Agenda Dies Natalis Untan</h3>
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
    </main><!-- End #main -->
@endsection
