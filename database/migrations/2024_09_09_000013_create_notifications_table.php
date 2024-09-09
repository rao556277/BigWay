<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user')->nullable();
            $table->string('type')->nullable();
            $table->string('message')->nullable();
            $table->string('status')->nullable();
            $table->integer('for_user')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
