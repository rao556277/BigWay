<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('log_user', function (Blueprint $table) {
            $table->unsignedBigInteger('log_id');
            $table->foreign('log_id', 'log_id_fk_10099344')->references('id')->on('logs')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_10099344')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
