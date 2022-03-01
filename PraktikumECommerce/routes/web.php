<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
        // return redirect()->route('users.login');
    return view('pages.users.login.index');

});

Route::prefix('users/')->name('users')->group(function () {
  Route::get('/', function() { 
      return redirect()->route('users.login');
  });

  Route::middleware('guest')->group(function () { 
        Route::get('login', [UserController::class, 'showLogin'])->name('showLogin');
        Route::post('login', [UserController::class, 'login'])->name('login');
  });

  Route::middleware('auth:users')->group(function () {
        Route::post('logout', [MahasiswaController::class, 'logout'])->name('logout');
        Route::get('dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');
  });
});

Route::prefix('admins/')->name('admins')->group(function () {
  Route::get('/', function() { 
      return redirect()->route('admins.login');
  });

  Route::middleware('guest')->group(function () { 
        Route::get('login', [UserController::class, 'showLogin'])->name('showLogin');
        Route::post('login', [UserController::class, 'login'])->name('login');
  });

  Route::middleware('auth:admins')->group(function () {
        Route::post('logout', [MahasiswaController::class, 'logout'])->name('logout');
        Route::get('dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');
  });
});

Route::get('home', function () {
    return view('layouts.main');
});

Route::get('shop', function () {
    return view('homepage');
});

Route::get('item', function () {
    return view('item');
});
