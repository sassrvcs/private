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
        Schema::table('person_appointments', function (Blueprint $table) {
            $table->float('amount_guarantee')->nullable()->after('sh_pps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('person_appointments', function (Blueprint $table) {
            $table->dropColumn('amount_guarantee');
        });
    }
};
