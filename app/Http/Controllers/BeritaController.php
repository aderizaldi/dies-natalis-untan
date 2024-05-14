<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function berita()
    {
        $beritas = Berita::latest()->get();
        return view('dashboard.pages.berita', compact('beritas'));
    }

    public function beritaPost(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $berita = new Berita();
        $berita->tanggal = $request->tanggal;
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->gambar = $request->gambar->store('gambar', 'public');
        $berita->slug = Str::slug($request->judul);
        $berita->save();

        $tags = explode(',', $request->tags);
        foreach ($tags as $tag) {
            $berita->beritaTags()->create([
                'tag' => $tag,
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan berita');
    }

    public function beritaPut(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $berita = Berita::find($id);
        $berita->tanggal = $request->tanggal;
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if (filter_var($berita->gambar, FILTER_VALIDATE_URL)) Storage::delete('public/' . $berita->gambar);
            $berita->gambar = $request->gambar->store('gambar', 'public');
        }
        $berita->slug = Str::slug($request->judul);
        $berita->save();

        $tags = explode(',', $request->tags);
        $berita->beritaTags()->delete();
        foreach ($tags as $tag) {
            $berita->beritaTags()->create([
                'tag' => $tag,
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil mengubah berita');
    }

    public function beritaDelete($id)
    {
        $berita = Berita::find($id);
        if (filter_var($berita->gambar, FILTER_VALIDATE_URL)) Storage::delete('public/' . $berita->gambar);
        $berita->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus berita');
    }
}
