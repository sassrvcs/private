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
        Schema::create('Ticket_Replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained('Tickets')->onDelete('cascade');
            $table->text('replies');
            $table->enum('replay_by',['admin','customer'])->default('customer');
            $table->dateTime('read_by')->nullable();
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
        Schema::dropIfExists('Ticket_Replies');
    }
};
