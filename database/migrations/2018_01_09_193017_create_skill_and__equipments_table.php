<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillAndEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_and__equipments', function (Blueprint $table) {
            $table->increments('id_skill_and__equipments');
            $table->timestamps();

            $table->integer('id_special__skills')->unsigned();
            $table->foreign('id_special__skills')->references('id_special__skills')->on('special__skills');

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
        Schema::dropIfExists('skill_and__equipments');
    }
}
