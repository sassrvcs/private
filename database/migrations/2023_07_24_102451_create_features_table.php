<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->string('feature')->nullable();

            $table->timestamps();
            
            $table->foreign("package_id")->references("id")->on("packages")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // $table->foreign("service_id")->references("id")->on("add_on_services")
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
};
