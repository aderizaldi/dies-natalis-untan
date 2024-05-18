@extends('landing.layouts.main')
@use('App\Enums\StatusPesertaEnum')
@use('App\Enums\JenisKelaminEnum')
@section('content')
    <main id="main">
        <section id="main-section" class="main-section section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Presensi Agenda Dies Natalis Untan</h3>
                    <h4>{{ $agenda->judul }}</h4>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-0 p-2">
                            <div class="card-body">
                                @if (session('success') && session('agenda')['agenda_id'] == $agenda->id)
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Terima kasih {{ session('agenda')['nama'] }}</strong> Anda telah
                                        terdaftar sebagai peserta acara ini. Nomor peserta anda adalah
                                        <strong>{{ session('agenda')['nomor_peserta'] }}</strong>. <strong>Screenshot
                                            halaman ini
                                            untuk simpan nomor peserta anda sebagai nomor undian doorprize</strong>
                                    </div>
                                    <script>
                                        localStorage.setItem('registered', {
                                            nama: "{{ session('agenda')['nama'] }}"
                                            ",
                                            nomor_peserta: "{{ session('agenda')['nomor_peserta'] }}",
                                            agenda_id: "{{ session('agenda')['agenda_id'] }}"
                                        });
                                    </script>
                                @else
                                    <div class="row mb-3">
                                        <form action="{{ route('presensi.post', $agenda->slug) }}" method="POST">
                                            @csrf
                                            @method('post')
                                            <div class="col-12 form-group mt-3">
                                                <label for="nama">Nama Lengkap:</label>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    required>
                                            </div>
                                            <div class="col-12 form-group mt-3">
                                                <label for="status">Status:</label>
                                                {{-- radio button --}}
                                                <div class="d-flex flex-wrap justify-content-start">
                                                    @foreach (StatusPesertaEnum::getValues() as $status)
                                                        <div class="form-check pe-5">
                                                            <input class="form-check-input" type="radio"
                                                                name="status_peserta" id="{{ $status }}"
                                                                value="{{ $status }}">
                                                            <label class="form-check-label"
                                                                for="{{ $status }}">{{ $status }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-12 form-group mt-3">
                                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                                {{-- radio button --}}
                                                <div class="d-flex flex-wrap justify-content-start">
                                                    @foreach (JenisKelaminEnum::getValues() as $jenis_kelamin)
                                                        <div class="form-check pe-5">
                                                            <input class="form-check-input" type="radio"
                                                                id="{{ $jenis_kelamin }}" name="jenis_kelamin"
                                                                value="{{ $jenis_kelamin }}">
                                                            <label class="form-check-label"
                                                                for="{{ $jenis_kelamin }}">{{ $jenis_kelamin }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-12 form-group mt-3">
                                                <label for="umur">Umur:</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="umur" name="umur"
                                                        aria-describedby="tahun" required>
                                                    <span class="input-group-text" id="tahun">Tahun</span>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group mt-3">
                                                <label for="no_hp">Nomor HP/Whatsapp:</label>
                                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                    required>
                                            </div>
                                            <div class="col-12 form-group mt-3">
                                                <label for="alamat">Alamat:</label>
                                                <textarea class="form-control" id="alamat" name="alamat" required rows="4"></textarea>
                                            </div>
                                            <div class="col-12 form-group mt-3">
                                                <label for="saran">Saran:</label>
                                                <textarea class="form-control" id="saran" name="saran" required rows="4"></textarea>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end mt-3">
                                                <button type="submit" class="btn btn-primary"><span
                                                        class="bi bi-send me-3"></span>Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
