@extends('dashboard.layouts.main')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Berita</h3>
    </div>
    <div class="page-content" style="min-height: 70vh;">
        <section class="row">
            <div class="col-12">
                {{-- card datatable --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        {{-- button tambah --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah"><i
                                class="bi bi-plus me-1"></i>Berita</button>
                    </div>
                    <div class="card-body">
                        <table class="dataTables-basic table table-responsive">
                            <thead>
                                <tr>
                                    <th data-searchable="false" data-sortable="false">No</th>
                                    <th>Tanggal</th>
                                    <th data-searchable="false" data-sortable="false">Gambar</th>
                                    <th>Judul</th>
                                    <th>Tag</th>
                                    <th data-searchable="false" data-sortable="false" data-width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beritas as $berita)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $berita->tanggal->format('d M Y H:i') }}</td>
                                        <td>
                                            <img src="{{ filter_var($berita->gambar, FILTER_VALIDATE_URL) ? $berita->gambar : asset('storage/' . $berita->gambar) }}"
                                                alt="{{ $berita->judul }}" class="img-fluid" style="max-width: 100px;"
                                                loading="lazy">
                                        </td>
                                        <td>{{ $berita->judul }}</td>
                                        <td>
                                            @foreach ($berita->beritaTags as $tag)
                                                <span class="badge bg-primary">{{ $tag->tag }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm mb-1"
                                                data-bs-toggle="modal" data-bs-target="#edit-{{ $berita->id }}"><span
                                                    class="bi bi-pencil-square"></span></button>
                                            <button type="button" class="btn btn-danger btn-sm mb-1" data-bs-toggle="modal"
                                                data-bs-target="#hapus-{{ $berita->id }}"><span
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
                    <h5 class="modal-title" id="tambahLabel">Tambah berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.berita.post') }}" method="post" enctype="multipart/form-data">
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
                            <label for="tags" class="form-label">Tag</label>
                            <input type="text" class="form-control" id="tags" name="tags" required>
                            <span class="text-muted text-sm">Pisahkan dengan koma (,)</span>
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
    @foreach ($beritas as $berita)
        <div class="modal fade" id="edit-{{ $berita->id }}" tabindex="-1" aria-labelledby="editLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Edit berita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dashboard.berita.put', $berita->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ $berita->tanggal->format('Y-m-d\TH:i') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                                <span class="text-muted text-sm">Kosongkan jika tidak ingin mengubah gambar</span>
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="{{ $berita->judul }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags"
                                    value="{{ implode(',',$berita->beritaTags->map(function ($item) {return $item->tag;})->toArray()) }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input id="editor-edit-input-{{ $berita->id }}" type="hidden" class="form-control"
                                    id="deskripsi" name="deskripsi" required value="{{ $berita->deskripsi }}">
                                <div id="editor-edit-{{ $berita->id }}" style="min-height: 200px;">
                                    {!! $berita->deskripsi !!}
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

        <div class="modal fade" id="hapus-{{ $berita->id }}" tabindex="-1" aria-labelledby="hapusLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusLabel">Hapus berita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dashboard.berita.delete', $berita->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus berita ini?</p>
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

        @foreach ($beritas as $berita)
            var quillEdit{{ $berita->id }} = new Quill("#editor-edit-{{ $berita->id }}", {
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
            quillEdit{{ $berita->id }}.on("text-change", function() {
                var html = quillEdit{{ $berita->id }}.root.innerHTML
                document.querySelector("#editor-edit-input-{{ $berita->id }}").value = html
            })
        @endforeach
    </script>
@endpush
