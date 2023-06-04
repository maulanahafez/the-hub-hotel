<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id');
            $table->foreignId('user_id');
            $table->string('slug')->unique();
            $table->date('date_in');
            $table->date('date_out');
            $table->string('status');
            $table->unsignedSmallInteger('range');
            $table->unsignedBigInteger('total_price');
            $table->string('payment_mtd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
