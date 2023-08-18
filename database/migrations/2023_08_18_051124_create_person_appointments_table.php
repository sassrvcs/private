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
        Schema::create('person_appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('cart_id')->nullable();
            $table->unsignedBigInteger('person_officer_id')->nullable();
            $table->unsignedBigInteger('own_address_id')->nullable();
            $table->unsignedBigInteger('forwarding_address_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('position')->nullable();
            $table->string('noc_os')->nullable();
            $table->string('noc_vr')->nullable();
            $table->string('noc_appoint')->nullable();
            $table->string('noc_others')->nullable();
            $table->string('fci')->nullable();
            $table->string('fci_os')->nullable();
            $table->string('fci_vr')->nullable();
            $table->string('fci_appoint')->nullable();
            $table->string('fci_others')->nullable();
            $table->string('tci')->nullable();
            $table->string('tci_os')->nullable();
            $table->string('tci_vr')->nullable();
            $table->string('tci_appoint')->nullable();
            $table->string('tci_others')->nullable();
            $table->string('sh_quantity')->nullable();
            $table->string('sh_currency')->nullable();
            $table->string('sh_pps')->nullable();
            $table->string('perticularsTextArea')->nullable();

            $table->timestamps();

            $table->foreign("order_id")->references("id")->on("orders")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign("cart_id")->references("id")->on("shopping_carts")->onDelete('set null');
            $table->foreign("person_officer_id")->references("id")->on("person_officers")->onDelete('set null');
            $table->foreign("own_address_id")->references("id")->on("addresses")->onDelete('set null');
            $table->foreign("forwarding_address_id")->references("id")->on("addresses")->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_appointments');
    }
};
