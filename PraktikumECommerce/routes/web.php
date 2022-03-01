<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
        Route::get('login', [AdminController::class, 'showLogin'])->name('showLogin');
        // Route::post('login', [AdminController::class, 'login'])->name('login');
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
