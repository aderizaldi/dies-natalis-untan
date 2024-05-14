<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function logo()
    {
        $logo = Logo::latest()->first();
        return view('dashboard.pages.logo', compact('logo'));
    }

    public function logoPut(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
        ]);

        $logo = Logo::latest()->first();
        $logo->deskripsi = $request->deskripsi;
        $logo->save();

        return redirect()->back()->with('success', 'Logo berhasil diubah');
    }
}
