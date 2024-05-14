@extends('dashboard.layouts.main')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Logo</h3>
    </div>
    <div class="page-content" style="min-height: 70vh;">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <form action="{{ route('dashboard.logo.put') }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="col-12 w-full d-flex justify-content-center">
                                            <div class="logo">
                                                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo"
                                                    style="max-width:200px"></img>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="deskripsi" class="form-label">Deskripsi logo</label>
                                                <input id="editor-tambah-input" type="hidden" class="form-control"
                                                    id="deskripsi" name="deskripsi" required value="{{ $logo->deskripsi }}">
                                                <div id="editor-tambah" style="min-height: 200px;">
                                                    {!! $logo->deskripsi !!}</div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1"
                                                id="reset">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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

        document.getElementById('reset').addEventListener('click', function() {
            quill.root.innerHTML = '{!! $logo->deskripsi !!}';
        })
    </script>
@endpush
