<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

class UserTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index($status)
    {
        $transactions = Transactions::where('user_id', auth()->id())
        ->where('status', $status)->get();

        return view('pages.users.transactions', compact('transactions', 'status'));
    }

    public function update($id, Request $request)
    {
        $status = $request->status;

        Transactions::find($id)->update([
            'status' => $status
        ]);

        return redirect('transactions/unverified');
    }
}
