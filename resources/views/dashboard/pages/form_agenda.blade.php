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
                    @if ($form_agendas->count() > 0)
                        <div class="card-header d-flex justify-content-start">
                            <a href="{{ route('dashboard.agenda.presensi.export', $agenda->id) }}" class="btn btn-secondary"
                                target="_blank">Export Excel<i class="bi bi-file-earmark-excel ms-1"></i></a>
                        </div>
                    @endif
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
@endsection

@push('styles')
@endpush
@push('scripts')
@endpush
