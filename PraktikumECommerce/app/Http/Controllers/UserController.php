<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Faker\Provider\Uuid;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.users.login.index');
    }

    public function register_index()
    {
        return view('pages.users.registration.index');
    }

    public function register(Request $request) { 
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        // if ($request->file('foto_mahasiswa')) {
        //     $foto = $request->file('foto_mahasiswa');
        //     $nameFile = date('ymdhis') . '_' . $request->nama . '.' . $foto->getClientOriginalExtension();
        //     $foto->storeAs('foto_mahasiswa', $nameFile);
        // }


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('users.login-index')->with('success', 'Users berhasil dibuat');
        // return redirect()->route('pegawai.mahasiswa.index')->with('success', 'Data berhasil disimpan');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('users')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('users/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email yang anda masukkan salah. Coba input kembali!',
        ]);
    }
  
    public function logout(Request $request)
    {
        Auth::guard('users')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('users.login-index');
    }

    public function dashboard()
    {
        return view('pages.users.dashboard.index');
    }
}
