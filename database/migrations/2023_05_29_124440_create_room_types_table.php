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
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->text('desc');
            $table->unsignedInteger('size');
            $table->unsignedSmallInteger('capacity');
            $table->string('bed_type');
            $table->unsignedSmallInteger('bed_qty');
            $table->text('facility');
            $table->unsignedInteger('price_per_day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};
