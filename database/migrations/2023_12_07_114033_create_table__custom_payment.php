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
        Schema::create('Custom_payment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->string('name');
            $table->string('email');
            $table->integer('user_id')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('custom_payment_status')->default(0);
            $table->string('PAYID')->nullable();
            $table->string('ACCEPTANCE')->nullable();
            $table->longText('SHASIGN')->nullable();
            $table->float('amount');
            $table->longText('uuid')->nullable();
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
        Schema::dropIfExists('Custom_payment');
    }
};
