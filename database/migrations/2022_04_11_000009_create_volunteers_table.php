<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('name');
            $table->string('phone');
            $table->string('nationality');
            $table->string('identity');
            $table->string('city');
            $table->string('job_title');
            $table->string('age');
            $table->longText('during');
            $table->longText('days');
            $table->longText('hours');
            $table->longText('skills');
            $table->longText('experience');
            $table->boolean('volunteer_befor')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}