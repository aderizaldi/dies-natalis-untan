<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\SambutanController;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/agenda', [PageController::class, 'agenda'])->name('agenda');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/sambutan/rektor', [PageController::class, 'sambutan_rektor'])->name('sambutan_rektor');
Route::get('/sambutan/ketua-panitia', [PageController::class, 'sambutan_ketua_panitia'])->name('sambutan_ketua_panitia');
Route::get('/logo', [PageController::class, 'logo'])->name('logo');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/berita/{slug}', [PageController::class, 'detail_berita'])->name('detail_berita');
Route::get('/agenda/{slug}', [PageController::class, 'detail_agenda'])->name('detail_agenda');


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
});
