<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaretakersTable extends Migration
{
    public function up()
    {
        Schema::create('caretakers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('cnic')->nullable();
            $table->string('image_url')->nullable();
            $table->string('medical_condition')->nullable();
            $table->string('emergency_medication')->nullable();
            $table->string('allergies')->nullable();
            $table->date('employment_date')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('status')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
