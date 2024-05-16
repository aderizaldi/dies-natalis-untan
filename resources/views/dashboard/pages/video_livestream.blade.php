@extends('dashboard.layouts.main')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Video Livestream</h3>
    </div>
    <div class="page-content" style="min-height: 70vh;">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <form action="{{ route('dashboard.video_livestream.put') }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="video" class="form-label">URL Iframe Youtube</label>
                                                <input type="text" class="form-control" id="video" name="video"
                                                    required value="{{ $video->value }}">
                                                <span class="text-muted text-sm">Masukkan url embed dari video
                                                    youtube</span>
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
                <iframe width="560" height="315" src="{{ $video->value }}" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </section>
    </div>
@endsection

@push('styles')
@endpush
@push('scripts')
@endpush
