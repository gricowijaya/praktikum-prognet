<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Couriers;
use App\Models\User;

class Transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = ['timeout', 'address', 'regency', 'province', 'total',
    'shipping_cost', 'sub_total', 'user_id', 'courier_id', 'proof_of_payment', 'status'];

    public function couriers() { 
      return $this->belongsTo(Couriers::class, 'courier_id');
    }

    public function user() { 
      return $this->belongsTo(User::class);
    }
}
