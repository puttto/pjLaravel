<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_equipments', function (Blueprint $table) {
            $table->increments('id_match_equipments');
            $table->timestamps();

            $table->integer('id_equipment')->unsigned();
            $table->foreign('id_equipment')->references('id_equipment')->on('equipment');

            $table->integer('id_special__skills')->unsigned();
            $table->foreign('id_special__skills')->references('id_special__skills')->on('special__skills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_equipments');
    }
}
