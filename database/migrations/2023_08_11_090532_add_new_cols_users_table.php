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
        Schema::table('users', function (Blueprint $table) {
            $table->string('primary_email')->nullable()->after('business_email');
            $table->boolean('newsletter')->nullable()->default(1)->after('password');
            $table->boolean('confirmation_statements')->nullable()->default(1)->after('newsletter');
            $table->boolean('accounts')->nullable()->default(1)->after('confirmation_statements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('newsletter');
            $table->dropColumn('confirmation_statements');
            $table->dropColumn('accounts');
        });
    }
};
