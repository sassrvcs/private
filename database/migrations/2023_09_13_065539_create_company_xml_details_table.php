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
        Schema::create('company_xml_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('submission_no')->nullable();
            $table->string('company_name')->nullable();
            $table->string('tans_no')->nullable();
            $table->string('status')->nullable();
            $table->string('comment')->nullable();
            $table->longtext('xml_body')->nullable();
            $table->string('authentication_code')->nullable();
            $table->string('company_no')->nullable();
            $table->string('approval')->nullable();
            $table->string('doc_request_key')->nullable();
            $table->string('pdf_content')->nullable();
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
        Schema::dropIfExists('company_xml_details');
    }
};
