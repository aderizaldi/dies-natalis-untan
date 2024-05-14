<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function beranda()
    {
        $agendas = Agenda::orderByDesc('tanggal')->limit(6)->get();
        $beritas = Berita::orderByDesc('tanggal')->limit(3)->get();
        return view('landing.pages.beranda', compact('agendas', 'beritas'));
    }

    public function agenda()
    {
        $agendas = Agenda::orderByDesc('tanggal')->simplePaginate(6);
        return view('landing.pages.agenda', compact('agendas'));
    }

    public function berita()
    {
        $beritas = Berita::latest()->simplePaginate(6);
        return view('landing.pages.berita', compact('beritas'));
    }

    public function sambutan_rektor()
    {
        return view('landing.pages.sambutan_rektor');
    }

    public function sambutan_ketua_panitia()
    {
        return view('landing.pages.sambutan_ketua_panitia');
    }

    public function logo()
    {
        return view('landing.pages.logo');
    }

    public function galeri()
    {
        return view('landing.pages.galeri');
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
}
