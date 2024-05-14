<?php

namespace App\Http\Controllers;

use App\Models\GaleriVideo;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function galeriGambar()
    {
        return view('dashboard.pages.galeri_gambar');
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
