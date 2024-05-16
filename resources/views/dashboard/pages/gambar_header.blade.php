@extends('dashboard.layouts.main')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Gambar Header</h3>
    </div>
    <div class="page-content" style="min-height: 70vh;">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <form action="{{ route('dashboard.gambar_header.put') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="gambar" class="form-label">Gambar</label>
                                                <input type="file" class="form-control" id="gambar" name="gambar"
                                                    required>
                                                <span class="text-muted text-sm">Max size 20MB</span>
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
            <div class="col-12 w-full d-flex justify-content-center mb-5">
                <img src="{{ asset('storage/' . $gambar->value) }}" alt="gambar_header" class="img-fluid">
            </div>
        </section>
    </div>
@endsection

@push('styles')
@endpush
@push('scripts')
@endpush
