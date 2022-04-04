<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOurServicesTable extends Migration
{
    public function up()
    {
        Schema::table('our_services', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id', 'type_fk_6336897')->references('id')->on('serviece_types');
        });
    }
}
