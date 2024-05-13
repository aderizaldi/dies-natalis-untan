<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/agenda', [PageController::class, 'agenda'])->name('agenda');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/sambutan/rektor', [PageController::class, 'sambutan_rektor'])->name('sambutan_rektor');
Route::get('/sambutan/ketua-panitia', [PageController::class, 'sambutan_ketua_panitia'])->name('sambutan_ketua_panitia');
Route::get('/logo', [PageController::class, 'logo'])->name('logo');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/berita/{slug}', [PageController::class, 'detail_berita'])->name('detail_berita');
Route::get('/agenda/{slug}', [PageController::class, 'detail_agenda'])->name('detail_agenda');
