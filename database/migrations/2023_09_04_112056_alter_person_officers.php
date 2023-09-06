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
        Schema::table('person_officers', function (Blueprint $table) {
            $table->string('legal_name')->nullable();
            $table->enum('uk_registered', ['Yes', 'No',])->default('Yes');
            $table->string('registration_number')->nullable();
            $table->string('place_registered')->nullable();
            $table->string('registry_held')->nullable();
            $table->string('law_governed')->nullable();
            $table->string('legal_form')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
