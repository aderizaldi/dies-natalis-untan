@extends('dashboard.layouts.main')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Agenda</h3>
    </div>
    <div class="page-content" style="min-height: 70vh;">
        <section class="row">
            <div class="col-12">
                {{-- card datatable --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        {{-- button tambah --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah"><i
                                class="bi bi-plus me-1"></i>Agenda</button>
                    </div>
                    <div class="card-body">
                        <table class="dataTables-basic table table-responsive">
                            <thead>
                                <tr>
                                    <th data-searchable="false" data-sortable="false">No</th>
                                    <th>Tanggal</th>
                                    <th data-searchable="false" data-sortable="false">Gambar</th>
                                    <th>Judul</th>
                                    <th>Deskripsi Singkat</th>
                                    <th data-searchable="false" data-sortable="false" data-width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agendas as $agenda)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $agenda->tanggal->format('d M Y H:i') }}</td>
                                        <td>
                                            <img src="{{ filter_var($agenda->gambar, FILTER_VALIDATE_URL) ? $agenda->gambar : asset('storage/' . $agenda->gambar) }}"
                                                alt="{{ $agenda->judul }}" class="img-fluid" style="max-width: 100px;"
                                                loading="lazy">
                                        </td>
                                        <td>{{ $agenda->judul }}</td>
                                        <td>{{ $agenda->deskripsi_singkat }}</td>
                                        {{-- action edit and delete button --}}
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm mb-1"
                                                data-bs-toggle="modal" data-bs-target="#edit-{{ $agenda->id }}"><span
                                                    class="bi bi-pencil-square"></span></button>
                                            <button type="button" class="btn btn-danger btn-sm mb-1" data-bs-toggle="modal"
                                                data-bs-target="#hapus-{{ $agenda->id }}"><span
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
                    <h5 class="modal-title" id="tambahLabel">Tambah Agenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.agenda.post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
                            <input type="text" class="form-control" id="deskripsi_singkat" name="deskripsi_singkat"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="redirect" class="form-label">Link Berita</label>
                            <input type="text" class="form-control" id="redirect" name="redirect">
                            <span class="text-muted text-sm">Kosongkan jika tidak ingin di redirect ke halaman
                                lain</span>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input id="editor-tambah-input" type="hidden" class="form-control" id="deskripsi"
                                name="deskripsi" required>
                            <div id="editor-tambah" style="min-height: 200px;"></div>
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
    @foreach ($agendas as $agenda)
        <div class="modal fade" id="edit-{{ $agenda->id }}" tabindex="-1" aria-labelledby="editLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Edit Agenda</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dashboard.agenda.put', $agenda->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ $agenda->tanggal->format('Y-m-d\TH:i') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                                <span class="text-muted text-sm">Kosongkan jika tidak ingin mengubah gambar</span>
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="{{ $agenda->judul }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
                                <input type="text" class="form-control" id="deskripsi_singkat"
                                    name="deskripsi_singkat" value="{{ $agenda->deskripsi_singkat }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="redirect" class="form-label">Link Berita</label>
                                <input type="text" class="form-control" id="redirect" name="redirect"
                                    value="{{ $agenda->redirect }}">
                                <span class="text-muted text-sm">Kosongkan jika tidak ingin di redirect ke halaman
                                    lain</span>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input id="editor-edit-input-{{ $agenda->id }}" type="hidden" class="form-control"
                                    id="deskripsi" name="deskripsi" required value="{{ $agenda->deskripsi }}">
                                <div id="editor-edit-{{ $agenda->id }}" style="min-height: 200px;">
                                    {!! $agenda->deskripsi !!}
                                </div>
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

        <div class="modal fade" id="hapus-{{ $agenda->id }}" tabindex="-1" aria-labelledby="hapusLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusLabel">Hapus Agenda</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dashboard.agenda.delete', $agenda->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus agenda ini?</p>
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
    <script>
        var quill = new Quill("#editor-tambah", {
            bounds: "#full-container .editor",
            modules: {
                toolbar: [
                    [{
                        font: []
                    }, {
                        size: []
                    }],
                    ["bold", "italic", "underline", "strike"],
                    [{
                        color: []
                    }, {
                        background: []
                    }],
                    [{
                        script: "super"
                    }, {
                        script: "sub"
                    }],
                    [{
                            list: "ordered"
                        },
                        {
                            list: "bullet"
                        },
                        {
                            indent: "-1"
                        },
                        {
                            indent: "+1"
                        },
                    ],
                    ["direction", {
                        align: []
                    }],
                    ["link", "image", "video"],
                    ["clean"],
                ],
            },
            theme: "snow",
        })
        quill.on("text-change", function() {
            var html = quill.root.innerHTML
            document.querySelector("#editor-tambah-input").value = html
        })

        @foreach ($agendas as $agenda)
            var quillEdit{{ $agenda->id }} = new Quill("#editor-edit-{{ $agenda->id }}", {
                bounds: "#full-container .editor",
                modules: {
                    toolbar: [
                        [{
                            font: []
                        }, {
                            size: []
                        }],
                        ["bold", "italic", "underline", "strike"],
                        [{
                            color: []
                        }, {
                            background: []
                        }],
                        [{
                            script: "super"
                        }, {
                            script: "sub"
                        }],
                        [{
                                list: "ordered"
                            },
                            {
                                list: "bullet"
                            },
                            {
                                indent: "-1"
                            },
                            {
                                indent: "+1"
                            },
                        ],
                        ["direction", {
                            align: []
                        }],
                        ["link", "image", "video"],
                        ["clean"],
                    ],
                },
                theme: "snow",
            })
            quillEdit{{ $agenda->id }}.on("text-change", function() {
                var html = quillEdit{{ $agenda->id }}.root.innerHTML
                document.querySelector("#editor-edit-input-{{ $agenda->id }}").value = html
            })
        @endforeach
    </script>
@endpush
