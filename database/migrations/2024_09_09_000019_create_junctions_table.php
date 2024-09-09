<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJunctionsTable extends Migration
{
    public function up()
    {
        Schema::create('junctions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('junction_name')->nullable();
            $table->datetime('arrival_time')->nullable();
            $table->datetime('departure_time')->nullable();
            $table->float('distance_from_last_location', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
