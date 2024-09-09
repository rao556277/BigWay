<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('route_name')->nullable();
            $table->date('start_location_type')->nullable();
            $table->integer('start_location')->nullable();
            $table->string('end_location_type')->nullable();
            $table->integer('end_location')->nullable();
            $table->float('total_distance', 15, 2)->nullable();
            $table->string('estimated_time')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
