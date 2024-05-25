@extends('dashboard.layouts.main')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Presensi Agenda {{ $agenda->judul }}</h3>
    </div>
    <div class="page-content" style="min-height: 70vh;">
        <section class="row">
            <div class="col-12">
                {{-- card datatable --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        @if ($form_agendas->count() > 0)
                            <div>
                                <a href="{{ route('dashboard.agenda.presensi.export', $agenda->id) }}"
                                    class="btn btn-secondary" target="_blank">Export Excel<i
                                        class="bi bi-file-earmark-excel ms-1"></i></a>
                            </div>
                        @endif
                        <div class="d-flex gap-2">
                            @if (!$agenda->sertifikat)
                                {{-- button aktifkan sertifikat --}}
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#aktifkanSertifikatModal">Aktifkan Sertifikat</button>
                            @else
                                {{-- button nonaktifkan sertifikat --}}
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#nonaktifkanSertifikatModal">Nonaktifkan Sertifikat</button>
                                {{-- button update sertifikat --}}
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#updateSertifikatModal">Update Sertifikat</button>
                                {{-- test sertifikat --}}
                                <a href="{{ route('dashboard.agenda.sertifikat', $agenda->id) }}" target="_blank"
                                    class="btn btn-info" target="_blank">Test Sertifikat</a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="dataTables-basic table table-responsive">
                            <thead>
                                <tr>
                                    <th data-searchable="false" data-sortable="false">No</th>
                                    <th>No Peserta</th>
                                    <th>Status</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Saran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($form_agendas as $form)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $form->nomor_peserta }}</td>
                                        <td>{{ $form->status_peserta }}</td>
                                        <td>{{ $form->nama }}</td>
                                        <td>{{ $form->jenis_kelamin }}</td>
                                        <td>{{ $form->umur }}</td>
                                        <td>{{ $form->no_hp }}</td>
                                        <td>{{ $form->alamat }}</td>
                                        <td>{{ $form->saran }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- modal aktifkan sertifikat --}}
    <div class="modal fade" id="aktifkanSertifikatModal" tabindex="-1" aria-labelledby="aktifkanSertifikatModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aktifkanSertifikatModalLabel">Aktifkan Sertifikat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.agenda.sertifikat.post', $agenda->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="modal-body">
                        {{-- input file --}}
                        <div class="mb-3">
                            <label for="sertifikat" class="form-label">File Sertifikat</label>
                            <input class="form-control" type="file" id="sertifikat" name="sertifikat" required>
                            <span class="text-muted text-sm">File harus berformat .docx dengan tagging ${nama_peserta} untuk
                                me-generate otomatis nama peserta</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Aktifkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal nonaktifkan sertifikat --}}
    <div class="modal fade" id="nonaktifkanSertifikatModal" tabindex="-1" aria-labelledby="nonaktifkanSertifikatModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nonaktifkanSertifikatModalLabel">Nonaktifkan Sertifikat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.agenda.sertifikat', $agenda->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menonaktifkan sertifikat?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Nonaktifkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal update sertifikat --}}
    <div class="modal fade" id="updateSertifikatModal" tabindex="-1" aria-labelledby="updateSertifikatModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateSertifikatModalLabel">Update Sertifikat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.agenda.sertifikat.put', $agenda->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        {{-- input file --}}
                        <div class="mb-3">
                            <label for="sertifikat" class="form-label">File Sertifikat</label>
                            <input class="form-control" type="file" id="sertifikat" name="sertifikat" required>
                            <span class="text-muted text-sm">File harus berformat .docx dengan tagging ${nama_peserta}
                                untuk
                                me-generate otomatis nama peserta</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
@endpush
@push('scripts')
@endpush
