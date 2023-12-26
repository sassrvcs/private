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
        Schema::table('company_edit_requests', function (Blueprint $table) {
            $table->boolean('add_on_service')->default(0)->after('data');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_edit_requests', function (Blueprint $table) {
            $table->dropColumn('add_on_service');
        });
    }
};
