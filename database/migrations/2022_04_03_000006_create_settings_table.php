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
            $table->string('email');
            $table->string('phone');
            $table->longText('about_us');
            $table->longText('description');
            $table->integer('product')->nullable();
            $table->string('snapchat')->nullable();
            $table->integer('supportive_partner');
            $table->integer('service');
            $table->integer('experience_year');
            $table->longText('contact_text');
            $table->longText('service_text');
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('website');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
