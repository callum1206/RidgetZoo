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
        Schema::create('hotel_booking', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->dateTime('check_in_date', precision: 0);
            $table->dateTime('check_out_date', precision: 0);
            $table->integer('person_count');
            $table->unsignedBigInteger('room_id');
        });

        Schema::table('hotel_booking', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('room_id')->references('id')->on('hotel_rooms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_booking');
    }
};
