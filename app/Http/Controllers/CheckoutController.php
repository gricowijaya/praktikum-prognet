<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\carts;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $carts =  carts::with('product', 'user')->where('user_id', '=', $user_id)->where('status', '=', "checkedout")->get();
        return view('pages.users.checkout', ['carts' => $carts]);
    }
}
