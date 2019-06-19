<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Central extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('central', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descriptiveName');
            $table->string('geographicLocation');
            $table->string('centralType');
            $table->integer('transmissionKW');
            $table->integer('associatedCentral');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
