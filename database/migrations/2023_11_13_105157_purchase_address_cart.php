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
        Schema::create('purchase_address_cart', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->integer('appointment_id')->nullable();
            $table->enum('address_type', ['registered_address', 'business_address', 'appointment_address'])->nullable();
            $table->float('price');
            $table->integer('qnt');
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
        Schema::dropIfExists('purchase_address_cart');
    }
};
