<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('dob');
            $table->integer('location')->nullable();
            $table->string('grade')->nullable();
            $table->string('attendance_status')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('medical_condition')->nullable();
            $table->string('emergency_medication')->nullable();
            $table->string('allergies')->nullable();
            $table->string('status')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
