<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function beranda()
    {
        return view('landing.pages.beranda');
    }

    public function agenda()
    {
        return view('landing.pages.agenda');
    }

    public function berita()
    {
        return view('landing.pages.berita');
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

    public function detail_berita()
    {
        return view('landing.pages.detail_berita');
    }

    public function detail_agenda()
    {
        return view('landing.pages.detail_agenda');
    }
}
