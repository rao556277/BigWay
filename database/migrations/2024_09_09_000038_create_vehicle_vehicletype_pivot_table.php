<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleVehicletypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle_vehicletype', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id', 'vehicle_id_fk_10099539')->references('id')->on('vehicles')->onDelete('cascade');
            $table->unsignedBigInteger('vehicletype_id');
            $table->foreign('vehicletype_id', 'vehicletype_id_fk_10099539')->references('id')->on('vehicletypes')->onDelete('cascade');
        });
    }
}
