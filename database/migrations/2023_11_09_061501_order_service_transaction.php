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
        Schema::create('order_service_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->integer('user_id')->nullable();
            $table->string('status')->nullable();
            $table->longText('service_data');
            $table->text('service_name')->nullable();
            $table->text('company_name')->nullable();
            $table->text('company_number')->nullable();
            $table->text('service_slug')->nullable();
            $table->tinyInteger('service_payment_status')->default(0);
            $table->string('PAYID')->nullable();
            $table->string('ACCEPTANCE')->nullable();
            $table->longText('SHASIGN')->nullable();
            $table->bigInteger('invoice_id')->nullable();
            $table->float('base_amount');
            $table->float('vat');
            $table->float('amount');
            $table->tinyInteger('step')->default(1);
            $table->longText('uuid')->nullable();
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
        Schema::dropIfExists('order_service_transactions');
    }
};
