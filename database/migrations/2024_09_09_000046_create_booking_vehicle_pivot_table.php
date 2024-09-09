<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingVehiclePivotTable extends Migration
{
    public function up()
    {
        Schema::create('booking_vehicle', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id', 'booking_id_fk_10099601')->references('id')->on('bookings')->onDelete('cascade');
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id', 'vehicle_id_fk_10099601')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }
}
