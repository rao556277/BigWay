<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementsTable extends Migration
{
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('party_type')->nullable();
            $table->datetime('agreement_date')->nullable();
            $table->longText('description')->nullable();
            $table->string('party')->nullable();
            $table->string('terms')->nullable();
            $table->datetime('expiry_date')->nullable();
            $table->string('signature_image')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
