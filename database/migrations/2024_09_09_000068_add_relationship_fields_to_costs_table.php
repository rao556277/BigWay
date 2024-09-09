<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCostsTable extends Migration
{
    public function up()
    {
        Schema::table('costs', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_10099518')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_10099519')->references('id')->on('users');
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->foreign('vehicle_id', 'vehicle_fk_10099538')->references('id')->on('vehicles');
        });
    }
}
