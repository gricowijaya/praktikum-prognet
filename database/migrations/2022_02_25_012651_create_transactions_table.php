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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // $table->uuid('id')->primary();
            $table->timestamp('timeout');
            $table->string('address');
            $table->string('regency');
            $table->string('province');
            $table->decimal('total');
            $table->decimal('shipping_cost');
            $table->decimal('sub_total');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('courier_id')->constrained('couriers');
            // $table->foreignUuid('user_id')->constrained('users');
            // $table->foreignUuid('courier_id')->constrained('couriers');
            $table->string('proof_of_payment');
            $table->timestamps();
            $table->enum('status', ['not_verified', 'verfied', 'delievered', 'success', 'failed']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
