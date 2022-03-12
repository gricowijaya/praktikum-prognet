<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

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
      return redirect()->route('login');
});

Route::prefix('users/')->name('users.')->group(function () {

  Route::get('/', function() { 
      return redirect()->route('login');
  });

  Route::middleware(['guest'])->group(function () { 
        Route::get('register', [UserController::class, 'register_index'])->name('register-index');
        Route::post('register', [UserController::class, 'register'])->name('register');
        Route::get('login', [UserController::class, 'index'])->name('login-index');
        Route::post('login', [UserController::class, 'login'])->name('login');

        // Route::get('/email/verify', function() {
        //       return view('pages.users.email');
        // })->name('verification.notice');
        //
        // Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        //     $request->fulfill();
        //
        //     return redirect('/dashboard');
        // })->name('verification.verify');
        //
        // Route::post('/email/verification-notification', function (Request $request) {
        //     $request->user()->sendEmailVerificationNotification();
        //     return back()->with('message', 'Verification link sent!');
        //
        // })->name('verification.send');
  });

  Route::middleware('auth:users', 'verified')->group(function () {
        Route::post('logout', [UserController::class, 'logout'])->name('logout');
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
  });


});

Route::prefix('admins/')->name('admins.')->group(function () {
  Route::get('/', function() { 
      return redirect()->route('admins.login');
  });

  Route::middleware('guest')->group(function () { Route::get('login', [AdminController::class, 'index'])->name('login-index');
        Route::post('login', [AdminController::class, 'login'])->name('login');
  });

  Route::middleware('auth:admins')->group(function () {
        Route::post('logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
  });
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
