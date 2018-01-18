<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaregiverEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caregiver__equipments', function (Blueprint $table) {
            $table->increments('id_caregiver__equipments');
            $table->timestamps();

            $table->integer('id_caregivers')->unsigned();
            $table->foreign('id_caregivers')->references('id_caregivers')->on('caregivers');

            $table->integer('id_medical_equipments')->unsigned();
            $table->foreign('id_medical_equipments')->references('id_medical_equipments')->on('medical_equipments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caregiver__equipments');
    }
}
