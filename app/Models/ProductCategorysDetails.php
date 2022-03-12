<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategories;
use App\Models\Product;

class ProductCategorysDetails extends Model
{
    use HasFactory;

    protected $table = 'product_category_details';

    public function product_categories() { 
      return $this->belongsTo(ProductCategories::class);
    }   

    public function product() { 
      return $this->belongsTo(Product::class);
    }   
}
