<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('notification_user', function (Blueprint $table) {
            $table->unsignedBigInteger('notification_id');
            $table->foreign('notification_id', 'notification_id_fk_10099602')->references('id')->on('notifications')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_10099602')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
