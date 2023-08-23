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
        Schema::create('person_officers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('shopping_cart_id')->nullable();
            $table->string('title')->nullable();
            $table->string('dob_day')->nullable();
            $table->string('dob_month')->nullable();
            $table->string('dob_year')->nullable();
            $table->string('first_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('last_name')->nullable();
            $table->string('occupation')->nullable();
            $table->unsignedBigInteger('add_id')->nullable();
            $table->string('authenticate_one')->nullable();
            $table->string('authenticate_one_ans')->nullable();
            $table->string('authenticate_two')->nullable();
            $table->string('authenticate_two_ans')->nullable();
            $table->string('authenticate_three')->nullable();
            $table->string('authenticate_three_ans')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts')->onDelete('set null');
            $table->foreign('add_id')->references('id')->on('addresses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_officers');
    }
};
