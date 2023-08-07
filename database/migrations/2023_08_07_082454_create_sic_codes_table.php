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
        Schema::create('sic_codes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('companie_id')->index()->nullable();

            $table->string('name');
            $table->string('code');
            $table->timestamps();

            $table->foreign('companie_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sic_codes');
    }
};
