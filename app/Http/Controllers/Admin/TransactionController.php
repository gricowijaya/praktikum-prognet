<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Models\UserNotifications;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;


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

        $user = Transactions::find($id)->user_id;

        UserNotifications::create([
            'type' => "notifikasi",
            'notifiable_type' => "notifikasi_transaksi",
            'notifiable_id' => $user,
            'data' => "Silahkan Cek Pesanan Anda",
        ]);

        Transactions::find($id)->update($request->all());
        return redirect('admins/transactions');
    }
}
