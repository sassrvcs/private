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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name')->nullable()->index();
            $table->string('package_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('notes')->nullable();
            $table->string('online_formation_within')->nullable();
            $table->string('cerificate_incorporation')->nullable();
            $table->string('articles_association')->nullable();
            $table->string('share_certificate')->nullable();
            $table->string('company_reg')->nullable();
            $table->string('maintain_company')->nullable();
            $table->string('house_filling_fee')->nullable();
            $table->string('business_bank_account')->nullable();
            $table->string('company_manager')->nullable();
            $table->string('reg_office_address')->nullable();
            $table->string('free_domain_name')->nullable();
            $table->string('printed_coi')->nullable();
            $table->string('printed_articles_association')->nullable();
            $table->string('printed_share_certificate')->nullable();
            $table->string('free_call')->nullable();
            $table->string('vat_reg')->nullable();
            $table->string('confirmation_statement')->nullable();
            $table->string('gdpr_compliance')->nullable();
            $table->string('paye_reg')->nullable();
            $table->string('good_standing')->nullable();
            $table->string('hijack_protection')->nullable();
            $table->string('ico_reg')->nullable();
            $table->string('logo_design')->nullable();
            $table->string('website_design')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
