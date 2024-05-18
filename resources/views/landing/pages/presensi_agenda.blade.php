@extends('landing.layouts.main')
@use('App\Enums\StatusPesertaEnum')
@use('App\Enums\JenisKelaminEnum')
@push('scripts')
    <script>
        var agenda = @json($agenda);
        var registered = localStorage.getItem('registered');
        if (registered && agenda.id == JSON.parse(registered).agenda_id) {
            var nama = JSON.parse(registered).nama;
            var nomor_peserta = JSON.parse(registered).nomor_peserta;
            console.log(nama);
            var content = document.getElementById('presensi-content');
            content.innerHTML = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Terima kasih ${nama}</strong> Anda telah terdaftar sebagai peserta acara ini. Nomor peserta anda adalah <strong>${nomor_peserta}</strong>.
                <br><br><strong>Screenshot halaman ini untuk simpan nomor peserta anda sebagai nomor undian doorprize</strong>
            </div>
        `;
        }
    </script>
@endpush
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
                            <div class="card-body" id="presensi-content">
                                @if (session('success') && session('agenda')['agenda_id'] == $agenda->id)
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Terima kasih {{ session('agenda')['nama'] }}</strong> Anda telah
                                        terdaftar sebagai peserta acara ini. Nomor peserta anda adalah
                                        <strong>{{ session('agenda')['nomor_peserta'] }}</strong>.
                                        <br><br><strong>Screenshot
                                            halaman ini
                                            untuk simpan nomor peserta anda sebagai nomor undian doorprize</strong>
                                    </div>
                                    <script>
                                        var registered = @json(session('agenda'));
                                        console.log(registered);
                                        localStorage.setItem('registered', JSON.stringify(registered));
                                    </script>
                                @else
                                    <div class="row mb-3">
                                        <form action="{{ route('presensi.post', $agenda->slug) }}" method="POST">
                                            @csrf
                                            @method('post')
                                            <div class="col-12 form-group mt-3">
                                                <label for="nama">Nama Lengkap:</label>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    value="{{ old('nama') }}">
                                            </div>
                                            <div class="col-12 form-group mt-3">
                                                <label for="status">Status:</label>
                                                {{-- radio button --}}
                                                <div class="d-flex flex-wrap justify-content-start">
                                                    @foreach (StatusPesertaEnum::getValues() as $status)
                                                        <div class="form-check pe-5">
                                                            <input class="form-check-input" type="radio"
                                                                name="status_peserta" id="{{ $status }}"
                                                                value="{{ $status }}" @checked(old('status_peserta') == $status)>
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
                                                                value="{{ $jenis_kelamin }}" @checked(old('jenis_kelamin') == $jenis_kelamin)>
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
                                                        aria-describedby="tahun" min="0" max="200"
                                                        value="{{ old('umur') }}">
                                                    <span class="input-group-text" id="tahun">Tahun</span>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group mt-3">
                                                <label for="no_hp">Nomor HP/Whatsapp:</label>
                                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                    value="{{ old('no_hp') }}">
                                            </div>
                                            <div class="col-12 form-group mt-3">
                                                <label for="alamat">Alamat:</label>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="4">{{ old('alamat') }}</textarea>
                                            </div>
                                            <div class="col-12 form-group mt-3">
                                                <label for="saran">Saran:</label>
                                                <textarea class="form-control" id="saran" name="saran" rows="4">{{ old('saran') }}</textarea>
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
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets-admin/extensions/sweetalert2/sweetalert2.min.css') }}">
@endpush
@push('js-extensions')
    <script src="{{ asset('assets-admin/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-admin/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        @if (session('errors'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('errors')->first() }}'
            });
        @endif
        @if (session('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            });
        @endif
        @if (session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        @endif
    </script>
@endpush
