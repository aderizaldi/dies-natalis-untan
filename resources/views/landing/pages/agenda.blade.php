@extends('landing.layouts.main')
@section('content')
    <main id="main">
        <section id="main-section" class="main-section section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h3>Agenda Dies Natalis Untan</h3>
                </div>

                <div class="row">
                    <div class="col-12">
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
                                                                            class="img-responsive" alt="Agenda Image" /></a>
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
                                                                            class="img-responsive" alt="Agenda Image" /></a>
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
                    <div class="col-12 w-full d-flex justify-content-center">
                        {{ $agendas->links() }}
                    </div>
                </div>

            </div>
        </section>
    </main><!-- End #main -->
@endsection
