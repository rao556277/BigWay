<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCaretakersTable extends Migration
{
    public function up()
    {
        Schema::table('caretakers', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_type_id')->nullable();
            $table->foreign('vehicle_type_id', 'vehicle_type_fk_10099365')->references('id')->on('vehicletypes');
            $table->unsignedBigInteger('emergency_contact_id')->nullable();
            $table->foreign('emergency_contact_id', 'emergency_contact_fk_10099414')->references('id')->on('emergencycontacts');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_10099529')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_10099530')->references('id')->on('users');
        });
    }
}
