<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction')->unique();
            $table->float('amount', 15, 2)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('status')->nullable();
            $table->datetime('date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
