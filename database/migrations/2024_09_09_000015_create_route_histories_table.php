<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('route_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vehicle')->nullable();
            $table->datetime('start_time')->nullable();
            $table->datetime('end_time')->nullable();
            $table->float('distance_travelled', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
