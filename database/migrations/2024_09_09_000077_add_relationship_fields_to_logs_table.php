<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLogsTable extends Migration
{
    public function up()
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->unsignedBigInteger('performed_by_id')->nullable();
            $table->foreign('performed_by_id', 'performed_by_fk_10099345')->references('id')->on('users');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_10099473')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_10099474')->references('id')->on('users');
        });
    }
}
