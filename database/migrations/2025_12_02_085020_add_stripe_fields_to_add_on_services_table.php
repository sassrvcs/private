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
        Schema::table('add_on_services', function (Blueprint $table) {
            $table->string('stripe_product_id')->nullable()->after('service_name');
            $table->string('stripe_price_id')->nullable()->after('stripe_product_id');
            $table->enum('billing_type', ['one_time', 'monthly', 'yearly'])->default('one_time')->after('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('add_on_services', function (Blueprint $table) {
            //
        });
    }
};
