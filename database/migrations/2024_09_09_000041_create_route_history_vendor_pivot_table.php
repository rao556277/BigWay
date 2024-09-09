<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteHistoryVendorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('route_history_vendor', function (Blueprint $table) {
            $table->unsignedBigInteger('route_history_id');
            $table->foreign('route_history_id', 'route_history_id_fk_10099300')->references('id')->on('route_histories')->onDelete('cascade');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id', 'vendor_id_fk_10099300')->references('id')->on('vendors')->onDelete('cascade');
        });
    }
}
