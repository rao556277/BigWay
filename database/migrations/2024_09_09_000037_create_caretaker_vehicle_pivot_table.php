<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaretakerVehiclePivotTable extends Migration
{
    public function up()
    {
        Schema::create('caretaker_vehicle', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id', 'vehicle_id_fk_10099332')->references('id')->on('vehicles')->onDelete('cascade');
            $table->unsignedBigInteger('caretaker_id');
            $table->foreign('caretaker_id', 'caretaker_id_fk_10099332')->references('id')->on('caretakers')->onDelete('cascade');
        });
    }
}
