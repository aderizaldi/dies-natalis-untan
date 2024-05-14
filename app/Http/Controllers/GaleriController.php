<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\GaleriVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function galeriGambar()
    {
        $gambars = Galeri::latest()->get();
        return view('dashboard.pages.galeri_gambar', compact('gambars'));
    }

    public function galeriGambarPost(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required|string',
        ]);

        $gambar = new Galeri();
        $gambar->judul = $request->judul;
        $gambar->gambar = $request->file('gambar')->store('gambar', 'public');
        $gambar->save();

        return redirect()->back()->with('success', 'Gambar berhasil ditambahkan', compact('gambar'));
    }

    public function galeriGambarPut(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string',
        ]);

        $gambar = Galeri::findOrFail($id);
        $gambar->judul = $request->judul;

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if (filter_var($gambar->gambar, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($gambar->gambar);
            }

            $gambar->gambar = $request->file('gambar')->store('gambar', 'public');
        }
        $gambar->save();

        return redirect()->back()->with('success', 'Gambar berhasil diubah', compact('gambar'));
    }

    public function galeriGambarDelete($id)
    {
        $gambar = Galeri::findOrFail($id);
        if (filter_var($gambar->gambar, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($gambar->gambar);
        }
        $gambar->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus', compact('gambar'));
    }

    public function galeriVideo()
    {
        $video = GaleriVideo::latest()->first();
        return view('dashboard.pages.galeri_video', compact('video'));
    }

    public function galeriVideoPut(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $video = GaleriVideo::latest()->first();
        $video->url = $request->url;
        $video->save();

        return redirect()->back()->with('success', 'Video berhasil diubah', compact('video'));
    }
}
