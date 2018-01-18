<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pat__equipments', function (Blueprint $table) {
            $table->increments('id_pat__equipments');
            $table->timestamps();

            $table->integer('id_patients')->unsigned();
            $table->foreign('id_patients')->references('id_patients')->on('patients');

            $table->integer('id_equipment')->unsigned();
            $table->foreign('id_equipment')->references('id_equipment')->on('equipment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pat__equipments');
    }
}
