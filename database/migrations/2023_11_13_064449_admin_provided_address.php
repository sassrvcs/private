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
        Schema::create('purchase_address', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->enum('address_type', ['registered_address', 'business_address', 'appointment_address'])->nullable();
            $table->string('house_number')->nullable();
            $table->string('street')->nullable();
            $table->string('locality')->nullable();
            $table->string('town')->nullable();
            $table->string('county')->nullable();
            $table->string('post_code')->nullable();
            $table->string('billing_country')->nullable();
            $table->float('price');
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
        Schema::dropIfExists('purchase_address');
    }
};
