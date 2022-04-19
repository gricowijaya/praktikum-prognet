<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\HomeUnauthController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\CartController; 
use App\Http\Controllers\CheckoutController; 
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

Route::get('/', [HomeUnauthController::class, 'index']);
Route::get('/product/{id}', [HomeUnauthController::class, 'show']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/cart', [CartController::class, 'index']);
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);


// Route::get('/', function () {
//       return redirect()->route('login');
// });

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

  Route::middleware('guest')->group(function () { 
        Route::get('login', [AdminController::class, 'index'])->name('login-index');
        Route::post('login', [AdminController::class, 'login'])->name('login');
  });

  Route::middleware('auth:admins')->group(function () {
        Route::post('logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        
        
  });


  Route::get('categories', [CategoryController::class, 'index']);
  Route::get('categories/create', [CategoryController::class, 'create']);
  Route::post('categories/store', [CategoryController::class, 'store']);
  Route::get('categories/{id}/edit', [CategoryController::class, 'edit']);
  Route::post('categories/{id}/update', [CategoryController::class, 'update']);
  Route::get('categories/{id}/delete', [CategoryController::class, 'delete']);
  
  Route::get('products', [ProductController::class, 'index']);
  Route::get('products/create', [ProductController::class, 'create']);
  Route::post('products/store', [ProductController::class, 'store']);
  Route::get('products/{id}/show', [ProductController::class, 'show']);
  Route::get('products/{id}/edit', [ProductController::class, 'edit']);
  Route::post('products/{id}/update', [ProductController::class, 'update']);
  Route::get('products/{id}/delete', [ProductController::class, 'delete']);
  Route::get('/{id}/addImage', [ProductController::class, 'uploadImage']);
  Route::post('/{id}/addImage', [ProductController::class, 'upload']);
  Route::get('/{id}/deleteImage', [ProductController::class, 'deleteImage']);

  Route::get('discounts', [DiscountController::class, 'index']);
  
  Route::get('couriers', [CourierController::class, 'index']);
  Route::get('couriers/create', [CourierController::class, 'create']);
  Route::post('couriers/store', [CourierController::class, 'store']);
  Route::get('couriers/{id}/edit', [CourierController::class, 'edit']);
  Route::post('couriers/{id}/update', [CourierController::class, 'update']);
  Route::get('couriers/{id}/delete', [CourierController::class, 'delete']);

});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

