<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_url');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('caption')->nullable();
            $table->string('link_url');
            $table->string('status')->nullable();
            $table->integer('display_order')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
