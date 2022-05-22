<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:admins']);
    }
    
    public function index()
    {
        $transactions = Transactions::paginate(5);
        return view('pages.admins.transactions.transactionindex', compact('transactions'));
    }

    public function update(Request $request, $id)
    {
        Transactions::find($id)->update($request->all());

        return redirect('admins/transactions');
    }
}
