<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function showLogin()
    {
        return view('pages.admins.login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admins')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('pegawai/dashboard');
        }

        return back()->withErrors([
            'name' => 'username yang anda masukkan salah. Coba kembali!',
        ]);
    }
  
    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admins.showLogin');
    }

    public function dashboard()
    {
        // $ = Mahasiswa::where('status_mahasiswa', 1)->get()->count();
        // $dosen = Dosen::where('status_dosen', 1)->get()->count();
        // return view('pages.admins.dashboard.index', compact('mahasiswa', 'dosen'));
        return view('pages.admins.dashboard.index');
    }
}
