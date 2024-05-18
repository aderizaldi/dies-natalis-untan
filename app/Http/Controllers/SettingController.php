<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\PartnerLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function gambarHeader()
    {
        $gambar = Setting::where('key', "GAMBAR_HEADER")->first();
        return view('dashboard.pages.gambar_header', compact('gambar'));
    }

    public function gambarHeaderPut(Request $request)
    {
        // max 20MB
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:20480',
        ]);

        $gambar = Setting::where('key', "GAMBAR_HEADER")->first();
        if (!filter_var($gambar->value, FILTER_VALIDATE_URL)) Storage::disk('public')->delete($gambar->value);
        $gambar->value = $request->file('gambar')->store('gambar', 'public');
        $gambar->save();

        return redirect()->back()->with('success', 'Gambar berhasil diubah');
    }

    public function videoTestimoni()
    {
        $video = Setting::where('key', "VIDEO_TESTIMONI")->first();
        return view('dashboard.pages.video_testimoni', compact('video'));
    }

    public function videoTestimoniPut(Request $request)
    {
        $request->validate([
            'video' => 'required|url',
        ]);

        $video = Setting::where('key', "VIDEO_TESTIMONI")->first();
        $video->value = $request->video;
        $video->save();

        return redirect()->back()->with('success', 'Video berhasil diubah');
    }

    public function videoLivestream()
    {
        $video = Setting::where('key', "VIDEO_LIVESTREAM")->first();
        return view('dashboard.pages.video_livestream', compact('video'));
    }

    public function videoLivestreamPut(Request $request)
    {
        $request->validate([
            'video' => 'required|url',
        ]);

        $video = Setting::where('key', "VIDEO_LIVESTREAM")->first();
        $video->value = $request->video;
        $video->save();

        return redirect()->back()->with('success', 'Video berhasil diubah');
    }

    public function partnerLogo()
    {
        $logos = PartnerLogo::latest()->get();
        return view('dashboard.pages.partner_logo', compact('logos'));
    }

    public function partnerLogoPost(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
        ]);

        $logo = new PartnerLogo();
        $logo->nama = $request->nama;
        $logo->logo = $request->file('logo')->store('gambar', 'public');
        $logo->link = $request->link;
        $logo->save();

        return redirect()->back()->with('success', 'Logo berhasil ditambahkan');
    }

    public function partnerLogoPut(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
        ]);

        $logo = PartnerLogo::find($id);
        $logo->nama = $request->nama;
        if ($request->hasFile('logo')) {
            if (!filter_var($logo->logo, FILTER_VALIDATE_URL)) Storage::disk('public')->delete($logo->logo);
            $logo->logo = $request->file('logo')->store('gambar', 'public');
        }
        $logo->link = $request->link;
        $logo->save();

        return redirect()->back()->with('success', 'Logo berhasil diubah');
    }

    public function partnerLogoDelete($id)
    {
        $logo = PartnerLogo::find($id);
        if (!filter_var($logo->logo, FILTER_VALIDATE_URL)) Storage::disk('public')->delete($logo->logo);
        $logo->delete();

        return redirect()->back()->with('success', 'Logo berhasil dihapus');
    }
}
