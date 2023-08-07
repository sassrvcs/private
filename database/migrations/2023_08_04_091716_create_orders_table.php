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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('cart_id')->index();
            $table->string('order_id')->nullable();

            $table->string('company_number')->nullable();
            $table->string('company_name')->nullable();
            $table->string('auth_code')->nullable();

            $table->string('payable_amount')->nullable();
            
            $table->enum('payment_mode', ['cod', 'online'])->nullable();
            $table->enum('payment_status', ['pending', 'refund', 'processig', 'paid'])->nullable();
            $table->enum('order_status', ['pending', 'progress', 'success'])->nullable();
            $table->timestamps();

            // Assign forign key
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cart_id')->references('id')->on('shopping_carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
