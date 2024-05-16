@extends('dashboard.layouts.main')
@use('App\Enums\RoleEnum')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Profil</h3>
    </div>
    <div class="page-content" style="min-height: 70vh;">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">
                            <h4 class="card-title">Detail Profil</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <form action="{{ route('dashboard.profil.put') }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nama" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="nama" class="form-control" name="nama"
                                                    value="{{ auth()->user()->nama }}" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" id="username" class="form-control" name="username"
                                                    value="{{ auth()->user()->username }}" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="role" class="form-label">Role</label>
                                                <input type="text" id="role" class="form-control"
                                                    value="{{ RoleEnum::getKey(auth()->user()->getRoleNames()->first()) }}"
                                                    disabled>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">
                            <h4 class="card-title">Ganti Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <form action="{{ route('dashboard.profil.password.put') }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password_lama" class="form-label">Password Lama</label>
                                                <input type="password" id="password_lama" class="form-control"
                                                    name="password_lama" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password_baru" class="form-label">Password Baru</label>
                                                <input type="password" id="password_baru" class="form-control"
                                                    name="password_baru" required>
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
@endpush
