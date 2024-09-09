<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteRouteHistoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('route_route_history', function (Blueprint $table) {
            $table->unsignedBigInteger('route_history_id');
            $table->foreign('route_history_id', 'route_history_id_fk_10099331')->references('id')->on('route_histories')->onDelete('cascade');
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id', 'route_id_fk_10099331')->references('id')->on('routes')->onDelete('cascade');
        });
    }
}
