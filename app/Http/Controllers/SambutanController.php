<?php

namespace App\Http\Controllers;

use App\Models\Sambutan;
use Illuminate\Http\Request;

class SambutanController extends Controller
{
    public function sambutanRektor()
    {
        $sambutan = Sambutan::where('tipe', 'rektor')->first();
        return view('dashboard.pages.sambutan_rektor', compact('sambutan'));
    }

    public function sambutanKetuaPanitia()
    {
        $sambutan = Sambutan::where('tipe', 'ketua_panitia')->first();
        return view('dashboard.pages.sambutan_ketua_panitia', compact('sambutan'));
    }

    public function sambutanRektorPut(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required'
        ]);
        $sambutan = Sambutan::where('tipe', 'rektor')->first();
        $sambutan->deskripsi = $request->deskripsi;
        $sambutan->save();

        return redirect()->back()->with('success', 'Kata sambutan berhasil diubah');
    }

    public function sambutanKetuaPanitiaPut(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required'
        ]);
        $sambutan = Sambutan::where('tipe', 'ketua_panitia')->first();
        $sambutan->deskripsi = $request->deskripsi;
        $sambutan->save();

        return redirect()->back()->with('success', 'Kata sambutan berhasil diubah');
    }
}
