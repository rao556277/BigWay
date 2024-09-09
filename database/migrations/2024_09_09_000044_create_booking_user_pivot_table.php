<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('booking_user', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id', 'booking_id_fk_10099598')->references('id')->on('bookings')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_10099598')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
