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
        Schema::create('company_form_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('section')->nullable();
            $table->string('step')->nullable();

            $table->timestamps();
            $table->foreign("order_id")->references("id")->on("orders")
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign("company_id")->references("id")->on("companies")
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_form_steps');
    }
};
