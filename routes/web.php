<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\SettingController;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/agenda', [PageController::class, 'agenda'])->name('agenda');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/sambutan/rektor', [PageController::class, 'sambutan_rektor'])->name('sambutan_rektor');
Route::get('/sambutan/ketua-panitia', [PageController::class, 'sambutan_ketua_panitia'])->name('sambutan_ketua_panitia');
Route::get('/logo', [PageController::class, 'logo'])->name('logo');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/berita/{slug}', [PageController::class, 'detail_berita'])->name('detail_berita');
Route::get('/agenda/{slug}', [PageController::class, 'detail_agenda'])->name('detail_agenda');
Route::get('/livestream', [PageController::class, 'livestream'])->name('livestream');
Route::get('/presensi/{slug}', [PageController::class, 'presensiAgenda'])->name('presensi');
Route::post('/presensi/{slug}', [PageController::class, 'presensiAgendaPost'])->name('presensi.post');
Route::get('/sertifikat', [PageController::class, 'sertifikat'])->name('sertifikat');
Route::post('/sertifikat', [PageController::class, 'cekSertifikat'])->name('sertifikat.post');
Route::get('/sertifikat/{nomor_peserta}', [PageController::class, 'downloadSertifikat'])->name('sertifikat.download');


Route::prefix('auth')->group(function () {
    Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');
    Route::post('/login', [UserController::class, 'loginPost'])->middleware('guest')->name('login.post');
    Route::match(['get', 'post'], '/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');
});

Route::prefix('admin/dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/agenda', [AgendaController::class, 'agenda'])->name('dashboard.agenda');
    Route::post('/agenda', [AgendaController::class, 'agendaPost'])->name('dashboard.agenda.post');
    Route::put('/agenda/{id}', [AgendaController::class, 'agendaPut'])->name('dashboard.agenda.put');
    Route::delete('/agenda/{id}', [AgendaController::class, 'agendaDelete'])->name('dashboard.agenda.delete');
    Route::get('/agenda/presensi/{id}', [AgendaController::class, 'presensiAgenda'])->name('dashboard.agenda.presensi');
    Route::get('/agenda/presensi/{id}/export', [AgendaController::class, 'exportPresensiAgenda'])->name('dashboard.agenda.presensi.export');
    Route::get('/agenda/qr-code/{id}', [AgendaController::class, 'qrCodeAgenda'])->name('dashboard.agenda.qr_code');
    Route::get('/agenda/big-qr-code/{id}', [AgendaController::class, 'bigQrCodeAgenda'])->name('dashboard.agenda.big_qr_code');
    Route::post('/agenda/presensi/{id}/sertifikat', [AgendaController::class, 'aktifkanSertifikat'])->name('dashboard.agenda.sertifikat.post');
    Route::delete('/agenda/presensi/{id}/sertifikat', [AgendaController::class, 'nonaktifkanSertifikat'])->name('dashboard.agenda.sertifikat.delete');
    Route::get('/agenda/presensi/{id}/sertifikat', [AgendaController::class, 'downloadSertifikat'])->name('dashboard.agenda.sertifikat');
    Route::put('/agenda/presensi/{id}/sertifikat', [AgendaController::class, 'updateSertifikat'])->name('dashboard.agenda.sertifikat.put');

    Route::get('/berita', [BeritaController::class, 'berita'])->name('dashboard.berita');
    Route::post('/berita', [BeritaController::class, 'beritaPost'])->name('dashboard.berita.post');
    Route::put('/berita/{id}', [BeritaController::class, 'beritaPut'])->name('dashboard.berita.put');
    Route::delete('/berita/{id}', [BeritaController::class, 'beritaDelete'])->name('dashboard.berita.delete');

    Route::get('/sambutan/rektor', [SambutanController::class, 'sambutanRektor'])->name('dashboard.sambutan_rektor');
    Route::put('/sambutan/rektor', [SambutanController::class, 'sambutanRektorPut'])->name('dashboard.sambutan_rektor.put');
    Route::get('/sambutan/ketua-panitia', [SambutanController::class, 'sambutanKetuaPanitia'])->name('dashboard.sambutan_ketua_panitia');
    Route::put('/sambutan/ketua-panitia', [SambutanController::class, 'sambutanKetuaPanitiaPut'])->name('dashboard.sambutan_ketua_panitia.put');

    Route::get('/logo', [LogoController::class, 'logo'])->name('dashboard.logo');
    Route::put('/logo', [LogoController::class, 'logoPut'])->name('dashboard.logo.put');

    Route::get('/galeri/gambar', [GaleriController::class, 'galeriGambar'])->name('dashboard.galeri.gambar');
    Route::post('/galeri/gambar', [GaleriController::class, 'galeriGambarPost'])->name('dashboard.galeri.gambar.post');
    Route::put('/galeri/gambar/{id}', [GaleriController::class, 'galeriGambarPut'])->name('dashboard.galeri.gambar.put');
    Route::delete('/galeri/gambar/{id}', [GaleriController::class, 'galeriGambarDelete'])->name('dashboard.galeri.gambar.delete');

    Route::get('/galeri/video', [GaleriController::class, 'galeriVideo'])->name('dashboard.galeri.video');
    Route::put('/galeri/video', [GaleriController::class, 'galeriVideoPut'])->name('dashboard.galeri.video.put');

    Route::get('/profil', [UserController::class, 'profil'])->name('dashboard.profil');
    Route::put('/profil', [UserController::class, 'profilPut'])->name('dashboard.profil.put');
    Route::put('/profil/password', [UserController::class, 'profilPasswordPut'])->name('dashboard.profil.password.put');

    Route::get('/gambar-header', [SettingController::class, 'gambarHeader'])->name('dashboard.gambar_header');
    Route::put('/gambar-header', [SettingController::class, 'gambarHeaderPut'])->name('dashboard.gambar_header.put');
    Route::get('/video-testimoni', [SettingController::class, 'videoTestimoni'])->name('dashboard.video_testimoni');
    Route::put('/video-testimoni', [SettingController::class, 'videoTestimoniPut'])->name('dashboard.video_testimoni.put');
    Route::get('/video-livestream', [SettingController::class, 'videoLivestream'])->name('dashboard.video_livestream');
    Route::put('/video-livestream', [SettingController::class, 'videoLivestreamPut'])->name('dashboard.video_livestream.put');

    Route::get('/partner-logo', [SettingController::class, 'partnerLogo'])->name('dashboard.partner_logo');
    Route::post('/partner-logo', [SettingController::class, 'partnerLogoPost'])->name('dashboard.partner_logo.post');
    Route::put('/partner-logo/{id}', [SettingController::class, 'partnerLogoPut'])->name('dashboard.partner_logo.put');
    Route::delete('/partner-logo/{id}', [SettingController::class, 'partnerLogoDelete'])->name('dashboard.partner_logo.delete');

    Route::get('/user', [UserController::class, 'user'])->name('dashboard.user');
    Route::post('/user', [UserController::class, 'userPost'])->name('dashboard.user.post');
    Route::put('/user/{id}', [UserController::class, 'userPut'])->name('dashboard.user.put');
    Route::delete('/user/{id}', [UserController::class, 'userDelete'])->name('dashboard.user.delete');
});
