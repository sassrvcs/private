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
        Schema::create('company_edit_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->bigInteger('company_order_id');
            $table->integer('user_id')->nullable();
            $table->longText('service_data');
            $table->text('company_name')->nullable();
            $table->text('company_number')->nullable();
            $table->tinyInteger('payment_status')->default(0);
            $table->string('PAYID')->nullable();
            $table->string('ACCEPTANCE')->nullable();
            $table->longText('SHASIGN')->nullable();
            $table->bigInteger('invoice_id')->nullable();
            $table->float('base_amount');
            $table->float('vat');
            $table->float('amount');
            $table->string('order_note')->nullable();
            $table->string('recipient_name')->nullable();
            $table->string('recipient_email')->nullable();
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
        Schema::dropIfExists('company_edit_transactions');
    }
};
