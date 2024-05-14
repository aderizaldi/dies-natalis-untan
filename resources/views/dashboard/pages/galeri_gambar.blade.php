@extends('dashboard.layouts.main')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Galeri Gambar</h3>
    </div>
    <div class="page-content" style="min-height: 70vh;">
        <section class="row">
            <div class="col-12">
                {{-- card datatable --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        {{-- button tambah --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah"><i
                                class="bi bi-plus me-1"></i>Gambar</button>
                    </div>
                    <div class="card-body">
                        <table class="dataTables-basic table table-responsive">
                            <thead>
                                <tr>
                                    <th data-searchable="false" data-sortable="false">No</th>
                                    <th data-searchable="false" data-sortable="false">Gambar</th>
                                    <th>Judul</th>
                                    <th data-searchable="false" data-sortable="false" data-width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gambars as $gambar)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ filter_var($gambar->gambar, FILTER_VALIDATE_URL) ? $gambar->gambar : asset('storage/' . $gambar->gambar) }}"
                                                alt="{{ $gambar->judul }}" class="img-fluid" style="max-width: 100px;"
                                                loading="lazy">
                                        </td>
                                        <td>{{ $gambar->judul }}</td>
                                        {{-- action edit and delete button --}}
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm mb-1"
                                                data-bs-toggle="modal" data-bs-target="#edit-{{ $gambar->id }}"><span
                                                    class="bi bi-pencil-square"></span></button>
                                            <button type="button" class="btn btn-danger btn-sm mb-1" data-bs-toggle="modal"
                                                data-bs-target="#hapus-{{ $gambar->id }}"><span
                                                    class="bi bi-trash"></span></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- modal tambah --}}
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.galeri.gambar.post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal edit & delete --}}
    @foreach ($gambars as $gambar)
        <div class="modal fade" id="edit-{{ $gambar->id }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Edit gambar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dashboard.galeri.gambar.put', $gambar->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                                <span class="text-muted text-sm">Kosongkan jika tidak ingin mengubah gambar</span>
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="{{ $gambar->judul }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="hapus-{{ $gambar->id }}" tabindex="-1" aria-labelledby="hapusLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusLabel">Hapus gambar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dashboard.galeri.gambar.delete', $gambar->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus gambar ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('styles')
@endpush
@push('scripts')
@endpush
