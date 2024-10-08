<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencycontactsTable extends Migration
{
    public function up()
    {
        Schema::create('emergencycontacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('relationship');
            $table->integer('contact_1');
            $table->integer('contact_2')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
