<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Auth
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'remember' => 'nullable',
        ]);

        $credentials = $request->only('username', 'password');

        if (auth()->attempt($credentials, $request->remember ? true : false)) {
            $request->session()->regenerate();
            $user = User::find(auth()->user()->id);
            $user->updated_at = now();

            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput($request->only('username', 'remember'));
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /*
    |--------------------------------------------------------------------------
    | Profil
    |--------------------------------------------------------------------------
    */
    public function profil()
    {
        return view('dashboard.pages.profil');
    }

    public function profilPut(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'username' => 'required|string|unique:users,username,' . auth()->user()->id,
        ]);

        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->save();

        return redirect()->route('dashboard.profil')->with('success', 'Profil berhasil diperbarui.');
    }

    public function profilPasswordPut(Request $request)
    {
        $request->validate([
            'password_baru' => 'required|string|min:5',
            'password_lama' => 'required|string',
        ]);

        $user = User::find(auth()->user()->id);

        if (!password_verify($request->password_lama, $user->password)) {
            return redirect()->route('dashboard.profil')->withErrors([
                'password_lama' => 'Password lama salah.',
            ]);
        }

        $user->password = bcrypt($request->password_baru);
        $user->save();

        return redirect()->route('dashboard.profil')->with('success', 'Password berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | CRUD User {Superadmin}
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('dashboard.pages.user', compact('users'));
    }

    public function userPost(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:5',
        ]);

        $user = new User();
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        $user->assignRole('ADMIN');

        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
    }

    public function userPut(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'username' => 'required|string|unique:users,username,' . $id,
            'password' => 'nullable|string|min:5',
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->username = $request->username;
        if ($request->password) $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diperbarui.');
    }

    public function userDelete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }
}
