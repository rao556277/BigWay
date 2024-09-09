<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEarningsTable extends Migration
{
    public function up()
    {
        Schema::table('earnings', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_10099522')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_10099523')->references('id')->on('users');
        });
    }
}
