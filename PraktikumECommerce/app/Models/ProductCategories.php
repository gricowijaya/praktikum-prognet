<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategorysDetails;;

class ProductCategories extends Model
{
    use HasFactory;
    
    protected $table = 'product_categories';

    public function product_category_details() { 
      return $this->hasMany(ProductCategorysDetails::class);
    }   
}
