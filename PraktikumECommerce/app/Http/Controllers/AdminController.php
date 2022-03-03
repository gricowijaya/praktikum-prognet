<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admins.login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admins')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admins/dashboard');
        }

        return back()->withErrors([
            'username' => 'Use the right admin username!',
        ]);
    }
  
    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admins.login');
    }

    public function dashboard()
    {
        // $ = Mahasiswa::where('status_mahasiswa', 1)->get()->count();
        // $dosen = Dosen::where('status_dosen', 1)->get()->count();
        // return view('pages.admins.dashboard.index', compact('mahasiswa', 'dosen'));
        return view('pages.admins.dashboard.index');
    }
}
