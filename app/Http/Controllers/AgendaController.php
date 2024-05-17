<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    public function agenda()
    {
        $agendas = Agenda::latest()->get();
        return view('dashboard.pages.agenda', compact('agendas'));
    }

    public function agendaPost(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
            'deskripsi_singkat' => 'required',
            'redirect' => 'nullable|url',
        ]);

        $agenda = new Agenda();
        $agenda->tanggal = $request->tanggal;
        $agenda->judul = $request->judul;
        $agenda->deskripsi = $request->deskripsi;
        $agenda->deskripsi_singkat = $request->deskripsi_singkat;
        $agenda->gambar = $request->gambar->store('gambar', 'public');
        $agenda->slug = Str::slug($request->judul);
        $agenda->redirect = $request->redirect;
        $agenda->save();

        return redirect()->back()->with('success', 'Berhasil menambahkan agenda');
    }

    public function agendaPut(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'deskripsi_singkat' => 'required',
            'redirect' => 'nullable|url',
        ]);

        $agenda = Agenda::find($id);
        $agenda->tanggal = $request->tanggal;
        $agenda->judul = $request->judul;
        $agenda->deskripsi = $request->deskripsi;
        $agenda->deskripsi_singkat = $request->deskripsi_singkat;
        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if (filter_var($agenda->gambar, FILTER_VALIDATE_URL)) Storage::delete('public/' . $agenda->gambar);
            $agenda->gambar = $request->gambar->store('gambar', 'public');
        }
        $agenda->slug = Str::slug($request->judul);
        $agenda->redirect = $request->redirect;
        $agenda->save();

        return redirect()->back()->with('success', 'Berhasil mengubah agenda');
    }

    public function agendaDelete($id)
    {
        $agenda = Agenda::find($id);
        if (filter_var($agenda->gambar, FILTER_VALIDATE_URL)) Storage::delete('public/' . $agenda->gambar);
        $agenda->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus agenda');
    }

    /*
    |--------------------------------------------------------------------------
    | Form Agenda
    |--------------------------------------------------------------------------
    */

    public function qrCodeAgenda($id)
    {
        $agenda = Agenda::findOrfail($id);
        $url_image = "https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=" . route('presensi', $agenda->slug);

        //return download image from url_image
        $base64_image = base64_encode(file_get_contents($url_image));
        return response(base64_decode($base64_image))->header('Content-Type', 'image/png');
    }
}
