<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categorys_details', function (Blueprint $table) {
            $table->id();
            // $table->uuid('id')->primary();
            $table->foreignId('product_id')->constrained('products');
            // $table->foreignUuid('product_id')->constrained('products');
            $table->foreignId('category_id')->constrained('product_categories');
            // $table->foreignUuid('category_id')->constrained('product_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categorys_details');
    }
};
