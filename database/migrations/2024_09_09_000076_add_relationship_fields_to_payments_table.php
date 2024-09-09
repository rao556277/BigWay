<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('guardian_id')->nullable();
            $table->foreign('guardian_id', 'guardian_fk_10099428')->references('id')->on('guardians');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id', 'student_fk_10099429')->references('id')->on('students');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_10099533')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_10099534')->references('id')->on('users');
        });
    }
}
