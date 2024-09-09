<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJunctionsTable extends Migration
{
    public function up()
    {
        Schema::table('junctions', function (Blueprint $table) {
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_10099307')->references('id')->on('locations');
        });
    }
}
