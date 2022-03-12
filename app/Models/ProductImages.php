<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductImages extends Model
{
    use HasFactory;
    
    protected $table = 'product_images';

    public function product() { 
      return $this->belongsTo(Product::class);
    }
}
