<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteHistoryVehicletypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('route_history_vehicletype', function (Blueprint $table) {
            $table->unsignedBigInteger('route_history_id');
            $table->foreign('route_history_id', 'route_history_id_fk_10099330')->references('id')->on('route_histories')->onDelete('cascade');
            $table->unsignedBigInteger('vehicletype_id');
            $table->foreign('vehicletype_id', 'vehicletype_id_fk_10099330')->references('id')->on('vehicletypes')->onDelete('cascade');
        });
    }
}
