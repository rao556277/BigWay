<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentRoutePivotTable extends Migration
{
    public function up()
    {
        Schema::create('payment_route', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id', 'payment_id_fk_10099597')->references('id')->on('payments')->onDelete('cascade');
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id', 'route_id_fk_10099597')->references('id')->on('routes')->onDelete('cascade');
        });
    }
}
