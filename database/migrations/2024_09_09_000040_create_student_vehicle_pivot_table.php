<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentVehiclePivotTable extends Migration
{
    public function up()
    {
        Schema::create('student_vehicle', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id', 'student_id_fk_10099352')->references('id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id', 'vehicle_id_fk_10099352')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }
}
