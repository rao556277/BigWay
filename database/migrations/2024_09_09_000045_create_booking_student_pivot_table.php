<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingStudentPivotTable extends Migration
{
    public function up()
    {
        Schema::create('booking_student', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id', 'booking_id_fk_10099599')->references('id')->on('bookings')->onDelete('cascade');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id', 'student_id_fk_10099599')->references('id')->on('students')->onDelete('cascade');
        });
    }
}
