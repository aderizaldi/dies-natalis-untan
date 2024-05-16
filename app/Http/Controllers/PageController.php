<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Sambutan;
use App\Models\GaleriVideo;
use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function beranda()
    {
        $video_testimoni = Setting::where('key', 'VIDEO_TESTIMONI')->first();
        $gambar_header = Setting::where('key', 'GAMBAR_HEADER')->first();
        $agendas = Agenda::orderBy('tanggal')->limit(6)->get();
        $beritas = Berita::orderByDesc('tanggal')->limit(3)->get();
        return view('landing.pages.beranda', compact('agendas', 'beritas', 'video_testimoni', 'gambar_header'));
    }

    public function agenda()
    {
        $agendas = Agenda::orderBy('tanggal')->simplePaginate(6);
        return view('landing.pages.agenda', compact('agendas'));
    }

    public function berita()
    {
        $beritas = Berita::latest()->simplePaginate(6);
        return view('landing.pages.berita', compact('beritas'));
    }

    public function sambutan_rektor()
    {
        $sambutan = Sambutan::where('tipe', 'rektor')->first();
        return view('landing.pages.sambutan_rektor', compact('sambutan'));
    }

    public function sambutan_ketua_panitia()
    {
        $sambutan = Sambutan::where('tipe', 'ketua_panitia')->first();
        return view('landing.pages.sambutan_ketua_panitia', compact('sambutan'));
    }

    public function logo()
    {
        $logo = Logo::latest()->first();
        return view('landing.pages.logo', compact('logo'));
    }

    public function galeri()
    {
        $gambars = Galeri::latest()->get();
        $video = GaleriVideo::latest()->first();
        return view('landing.pages.galeri', compact('video', 'gambars'));
    }

    public function detail_berita($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        if (!$berita) return abort(404);

        return view('landing.pages.detail_berita', compact('berita'));
    }

    public function detail_agenda($slug)
    {
        $agenda = Agenda::where('slug', $slug)->first();
        if (!$agenda) return abort(404);

        return view('landing.pages.detail_agenda', compact('agenda'));
    }

    public function livestream()
    {
        $video_livestream = Setting::where('key', 'VIDEO_LIVESTREAM')->first();
        return view('landing.pages.livestream', compact('video_livestream'));
    }
}
