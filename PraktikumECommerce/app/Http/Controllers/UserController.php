<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'name' => ['required' , 'string' , 'max:255'],
            'email' => ['required' , 'email' , 'max:255'],
            'password' => ['required', 'min:8', 
               'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 
               'confirmed'] ,
        ]);
    
        // if ($request->file('users_profile_picture')) {
        //     $picture = $request->file('users_profile_picture');
        //     $nameFile = date('ymdhis') . '_' . $request->name . '.' . $picture->getClientOriginalExtension();
        //     $picture->storeAs('users_profile_picture', $nameFile);
        // }


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.login-index')->with('success', 'Users sucessfully created');
    }

    public function login(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required' , 'email' , 'max:255'],
            'password' => ['required', 'min:8', 
               'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 
               'confirmed'] ,
        ]);

        if (Auth::guard('users')->attempt($credentials)) {
            if (!Hash::check(request()->password, auth()->user()->password)) {
                return back()->withErrors(['password' => 'The provided password does not match our records.']);
            }
      
            $request->session()->regenerate();
            return redirect()->intended('users/dashboard');
        }

        return back()->withErrors([
            'email' => 'Your email does not match our records, Please enter the registered email !!',
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
