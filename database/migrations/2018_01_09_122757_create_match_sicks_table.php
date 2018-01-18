<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchSicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_sicks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_sickness')->unsigned();
            $table->integer('id_special__skills')->unsigned();

            $table->foreign('id_sickness')->references('id_sickness')->on('sicknesses');
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
        Schema::dropIfExists('match_sicks');
    }
}
