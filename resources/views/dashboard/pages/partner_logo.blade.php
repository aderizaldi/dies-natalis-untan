@extends('dashboard.layouts.main')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Partner Logo</h3>
    </div>
    <div class="page-content" style="min-height: 70vh;">
        <section class="row">
            <div class="col-12">
                {{-- card datatable --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        {{-- button tambah --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah"><i
                                class="bi bi-plus me-1"></i>Logo</button>
                    </div>
                    <div class="card-body">
                        <table class="dataTables-basic table table-responsive">
                            <thead>
                                <tr>
                                    <th data-searchable="false" data-sortable="false">No</th>
                                    <th>Nama</th>
                                    <th data-searchable="false" data-sortable="false">Logo</th>
                                    <th>Url</th>
                                    <th data-searchable="false" data-sortable="false" data-width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logos as $logo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $logo->nama }}</td>
                                        <td>
                                            <img src="{{ filter_var($logo->logo, FILTER_VALIDATE_URL) ? $logo->logo : asset('storage/' . $logo->logo) }}"
                                                alt="{{ $logo->nama }}" class="img-fluid" style="max-width: 100px;"
                                                loading="lazy">
                                        </td>
                                        <td><a href="{{ $logo->url }}" target="_blank">{{ $logo->url }}</a></td>
                                        {{-- action edit and delete button --}}
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm mb-1"
                                                data-bs-toggle="modal" data-bs-target="#edit-{{ $logo->id }}"><span
                                                    class="bi bi-pencil-square"></span></button>
                                            <button type="button" class="btn btn-danger btn-sm mb-1" data-bs-toggle="modal"
                                                data-bs-target="#hapus-{{ $logo->id }}"><span
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
                    <h5 class="modal-title" id="tambahLabel">Tambah logo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.partner_logo.post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="logo" class="form-label">logo</label>
                            <input type="file" class="form-control" id="logo" name="logo" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">Url</label>
                            <input type="text" class="form-control" id="url" name="url">
                            <span class="text-muted text-sm">Masukkan url website partner jika ada</span>
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
    @foreach ($logos as $logo)
        <div class="modal fade" id="edit-{{ $logo->id }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Edit logo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dashboard.partner_logo.put', $logo->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="logo" class="form-label">logo</label>
                                <input type="file" class="form-control" id="logo" name="logo">
                                <span class="text-muted text-sm">Kosongkan jika tidak ingin mengubah logo</span>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $logo->nama }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">Url</label>
                                <input type="text" class="form-control" id="url" name="url"
                                    value="{{ $logo->url }}">
                                <span class="text-muted text-sm"></span>Masukkan url website partner jika ada</span>
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

        <div class="modal fade" id="hapus-{{ $logo->id }}" tabindex="-1" aria-labelledby="hapusLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusLabel">Hapus logo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dashboard.partner_logo.delete', $logo->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus logo ini?</p>
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
