<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discount';

    public function product() { 
      return $this->belongsTo(Product::class);
    }
}
