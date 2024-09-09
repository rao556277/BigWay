<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSchoolsTable extends Migration
{
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_10099481')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_10099482')->references('id')->on('users');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_10101858')->references('id')->on('locations');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10102070')->references('id')->on('users');
        });
    }
}
