<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningsTable extends Migration
{
    public function up()
    {
        Schema::create('earnings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('amount', 15, 2);
            $table->datetime('date')->nullable();
            $table->string('payment_method');
            $table->string('status')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
