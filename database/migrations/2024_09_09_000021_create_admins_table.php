<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('permissions')->nullable();
            $table->string('role')->nullable();
            $table->string('status')->nullable();
            $table->string('blood_group')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
