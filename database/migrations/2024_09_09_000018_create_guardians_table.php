<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiansTable extends Migration
{
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('payment_details')->nullable();
            $table->string('verified')->nullable();
            $table->string('status')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
