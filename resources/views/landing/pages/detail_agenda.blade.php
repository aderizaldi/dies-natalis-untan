@extends('landing.layouts.main')
@use('App\Enums\StatusPesertaEnum')
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
                    @if ($agenda->formAgendas->count() > 0)
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-start py-3">
                                <p class="p-0 m-0 me-3">Kehadiran Peserta: </p>
                                @if ($agenda->formAgendas()->where('status_peserta', StatusPesertaEnum::MAHASISWA)->count() > 0)
                                    <span
                                        class="badge bg-primary me-3">{{ $agenda->formAgendas()->where('status_peserta', StatusPesertaEnum::MAHASISWA)->count() .' ' .StatusPesertaEnum::MAHASISWA }}</span>
                                @endif
                                @if ($agenda->formAgendas()->where('status_peserta', StatusPesertaEnum::CIVITAS)->count() > 0)
                                    <span
                                        class="badge bg-primary me-3">{{ $agenda->formAgendas()->where('status_peserta', StatusPesertaEnum::CIVITAS)->count() .' ' .StatusPesertaEnum::CIVITAS }}</span>
                                @endif
                                @if ($agenda->formAgendas()->where('status_peserta', StatusPesertaEnum::UMUM)->count() > 0)
                                    <span
                                        class="badge bg-primary me-3">{{ $agenda->formAgendas()->where('status_peserta', StatusPesertaEnum::UMUM)->count() .' ' .StatusPesertaEnum::UMUM }}</span>
                                @endif
                                @if ($agenda->formAgendas()->where('status_peserta', StatusPesertaEnum::ALUMNI)->count() > 0)
                                    <span
                                        class="badge bg-primary me-3">{{ $agenda->formAgendas()->where('status_peserta', StatusPesertaEnum::ALUMNI)->count() .' ' .StatusPesertaEnum::ALUMNI }}</span>
                                @endif
                            </div>
                        </div>
                    @endif
                    {{-- deskripsi berita --}}
                    <div class="col-lg-12 mt-5 text-content">
                        {!! $agenda->deskripsi !!}
                    </div>
                </div>
        </section>
    </main>
@endsection
