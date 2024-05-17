<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Setting;
use App\Models\Sambutan;
use App\Models\FormAgenda;
use App\Models\GaleriVideo;
use Illuminate\Http\Request;
use App\Enums\JenisGaleriEnum;
use App\Enums\JenisKelaminEnum;
use App\Enums\StatusPesertaEnum;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;

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
        $gambar_kegiatan = Galeri::where('jenis', JenisGaleriEnum::KEGIATAN)->latest()->simplePaginate(6, ['*'], 'kegiatan');
        $gambar_selamat_datang = Galeri::where('jenis', JenisGaleriEnum::SELAMAT_DATANG)->latest()->simplePaginate(6, ['*'], 'selamat-datang');
        $video = GaleriVideo::latest()->first();
        return view('landing.pages.galeri', compact('video', 'gambar_kegiatan', 'gambar_selamat_datang'));
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

    public function presensiAgenda($slug)
    {
        $agenda = Agenda::where('slug', $slug)->first();
        if (!$agenda) return abort(404);

        return view('landing.pages.presensi_agenda', compact('agenda'));
    }

    public function presensiAgendaPost(Request $request, $slug)
    {
        $agenda = Agenda::where('slug', $slug)->first();
        if (!$agenda) return abort(404);

        $request->validate([
            'status_peserta' => 'required|in:' . implode(',', StatusPesertaEnum::getValues()),
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:' . implode(',', JenisKelaminEnum::getValues()),
            'umur' => 'required|integer',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'nullable|string',
            'saran' => 'nullable|string',
        ]);

        $form_agenda = new FormAgenda();
        $nomor_peserta = $form_agenda->makeNumber($agenda->id);
        if (!$nomor_peserta) return redirect()->back()->with('error', 'Gagal membuat nomor peserta');
        $form_agenda->create([
            'agenda_id' => $agenda->id,
            'nomor_peserta' => $nomor_peserta,
            'status_peserta' => $request->status_peserta,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'saran' => $request->saran,
        ]);

        Cache::put('registered', [
            'agenda_id' => $agenda->id,
            'nomor_peserta' => $nomor_peserta,
            'status_peserta' => $request->status_peserta,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'saran' => $request->saran,
        ], 60 * 60 * 24 * 30 * 12 * 5);

        return redirect()->back()->with('success', 'Berhasil melakukan presensi');
    }
}
