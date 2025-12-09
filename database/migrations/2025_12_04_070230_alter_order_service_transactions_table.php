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
        Schema::table('order_service_transactions', function (Blueprint $table) {
            $table->enum('item_type', ['package','one_time','monthly','yearly']);
            $table->string('stripe_product_id')->nullable();
            $table->string('stripe_price_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_service_transactions', function (Blueprint $table) {
            $table->enum('item_type', ['package','one_time','monthly','yearly']);
            $table->string('stripe_product_id')->nullable();
            $table->string('stripe_price_id')->nullable();
        });
    }
};
