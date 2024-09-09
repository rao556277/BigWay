<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('license_number')->nullable();
            $table->longText('address')->nullable();
            $table->string('cnic')->nullable();
            $table->longText('medical_condition')->nullable();
            $table->longText('emergency_medication')->nullable();
            $table->string('allergies')->nullable();
            $table->string('hire_date')->nullable();
            $table->string('image_url')->nullable();
            $table->string('status')->nullable();
            $table->string('blood_group')->nullable();
            $table->date('dob')->nullable();
            $table->date('license_expiry_date')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
