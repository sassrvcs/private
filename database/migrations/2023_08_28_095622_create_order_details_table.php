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
        Schema::create('delivery_partner_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('order_desc')->nullable();
            $table->string('recipient_name');
            $table->string('recipient_email');
            $table->enum('regulated_body', ['yes', 'no']);
            $table->date('dob');
            $table->string('residential_address');
            $table->text('relation');
            $table->string('referring');
            $table->string('referrer_name')->nullable();
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('contact_mobile');
            $table->string('contact_calltime');
            $table->string('contact_address');
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
        Schema::dropIfExists('delivery_partner_details');
    }
};
