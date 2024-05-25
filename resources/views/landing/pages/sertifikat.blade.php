@extends('landing.layouts.main')
@section('content')
    <main id="main">
        <section id="main-section" class="main-section section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Sertifikat</h3>
                    <h4>Silahkan cek sertifikat pada agenda yang telah anda ikuti</h4>
                </div>

                @if (session('success') || session('error'))
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card border-0 p-2">
                                <div class="card-body" id="sertifikat-content">
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <p class="text-content">
                                                Terimakasih <strong>{{ session('success')['nama'] }}</strong> telah
                                                mengikuti agenda
                                                <strong>{{ session('success')['agenda']['judul'] }}</strong>.
                                                Sertifikat anda dapat diunduh dengan mengklik tombol dibawah ini.
                                            </p>
                                            <a href="{{ route('sertifikat.download', session('success')['nomor_peserta']) }}"
                                                class="btn btn-primary mt-3" target="_blank"><span
                                                    class="bi bi-download me-1"></span>Unduh
                                                Sertifikat</a>
                                        </div>
                                    @elseif (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <p class="text-content">
                                                Maaf, nomor peserta <strong>{{ session('error')['nomor_peserta'] }}</strong>
                                                tidak
                                                ditemukan pada agenda
                                                <strong>{{ session('error')['agenda']['judul'] }}</strong>.
                                                Silahkan cek kembali nomor peserta anda.
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row {{ session('success') || session('error') ? 'mt-3' : '' }}">
                    <div class="col-lg-12">
                        <div class="card border-0 p-2">
                            <div class="card-body" id="sertifikat-content">
                                <div class="row mb-3">
                                    <form action="{{ route('sertifikat.post') }}" method="POST">
                                        @csrf
                                        @method('post')
                                        {{-- select agenda --}}
                                        <div class="col-12 form-group mt-3">
                                            <label for="agenda_id">Agenda:</label>
                                            <select class="form-select" id="agenda_id" name="agenda_id" required>
                                                <option value="">--pilih agenda--</option>
                                                @foreach ($agendas as $agenda)
                                                    <option value="{{ $agenda->id }}" @selected($agenda->id == old('agenda_id'))>
                                                        {{ $agenda->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 form-group mt-3">
                                            <label for="nomor_peserta">Nomor Peserta:</label>
                                            <input type="text" class="form-control" id="nomor_peserta"
                                                name="nomor_peserta" value="{{ old('nomor_peserta') }}"
                                                placeholder="000-0000" required>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end mt-3">
                                            <button type="submit" class="btn btn-primary"><span
                                                    class="bi bi-send me-3"></span>Cek Sertifikat</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
