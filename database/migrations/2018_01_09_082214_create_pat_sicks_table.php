<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatSicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pat_sicks', function (Blueprint $table) {
            $table->increments('id_pat_sicks');
            $table->timestamps();

            $table->integer('id_sickness')->unsigned();
            $table->foreign('id_sickness')->references('id_sickness')->on('sicknesses');

            $table->integer('id_patients')->unsigned();
            $table->foreign('id_patients')->references('id_patients')->on('patients');
            $table->string('status',10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pat_sicks');
    }
}
