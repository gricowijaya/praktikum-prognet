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

    public function couriers() { 
      return $this->hasMany(Couriers::class);
    }

    public function user() { 
      return $this->hasMany(User::class);
    }
}
