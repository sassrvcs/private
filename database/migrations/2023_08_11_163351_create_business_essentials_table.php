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
        Schema::create('business_essentials', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('companie_id')->index()->nullable();
            $table->unsignedBigInteger('business_banking_id')->index()->nullable();
            $table->unsignedBigInteger('business_service_id')->index()->nullable();

            $table->foreign('companie_id')->references('id')->on('companies');
            $table->foreign('business_banking_id')->references('id')->on('business_bankings');
            $table->foreign('business_service_id')->references('id')->on('accountings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_essentials');
    }
};
