@extends('dashboard.layouts.main')
@use('App\Enums\RoleEnum')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content" style="min-height: 70vh;">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="{{ asset('assets-admin/compiled/jpg/1.jpg') }}" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{ auth()->user()->nama }}</h5>
                                <h6 class="text-muted mb-0">{{ RoleEnum::getKey(auth()->user()->getRoleNames()->first()) }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Selamat Datang</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Selamat datang di halaman dashboard, silahkan pilih menu yang tersedia.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('styles')
@endpush
@push('scripts')
    <script src="{{ asset('assets-admin/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets-admin/static/js/pages/dashboard.js') }}"></script>
@endpush
