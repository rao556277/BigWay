<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo_url')->nullable();
            $table->string('company_name');
            $table->string('currency')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('language')->nullable();
            $table->string('maintenance_mode')->nullable();
            $table->string('backup_frequency')->nullable();
            $table->string('backup_location')->nullable();
            $table->string('support_url')->nullable();
            $table->string('social_media_links')->nullable();
            $table->string('terms_url')->nullable();
            $table->string('privacy_policy_url')->nullable();
            $table->string('status')->nullable();
            $table->string('timezone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
