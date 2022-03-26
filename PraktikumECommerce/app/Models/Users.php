<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductReviews;
use App\Models\carts;
use App\Models\UserNotifications;
use App\Models\Transactions;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function product_reviews() {
      return $this->hasMany(ProductReviews::class);
    }

    public function carts() {
      return $this->hasMany(carts::class);
    }

    public function user_notification() {
      return $this->hasMany(UserNotifications::class);
    }

    public function transactions() {
      return $this->hasMany(Transactions::class);
    }
}
