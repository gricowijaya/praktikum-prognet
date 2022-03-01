<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('pages.users.login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('users')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('pegawai/dashboard');
        }

        return back()->withErrors([
            'name' => 'username yang anda masukkan salah. Coba kembali!',
        ]);
    }
  
    public function logout(Request $request)
    {
        Auth::guard('users')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('users.showLogin');
    }

    public function dashboard()
    {
        return view('pages.users.dashboard.index');
    }
}
