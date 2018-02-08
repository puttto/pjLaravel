<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pat__allergies', function (Blueprint $table) {
          $table->increments('id_pat__allergies');
          $table->timestamps();

          $table->integer('id_patients')->unsigned();
          $table->foreign('id_patients')->references('id_patients')->on('patients');

          $table->integer('id_allergies')->unsigned();
          $table->foreign('id_allergies')->references('id_allergies')->on('allergies');
          $table->string('status',10)->nullable();

          // $table->integer('id_drug__allergies')->unsigned();
          // $table->foreign('id_drug__allergies')->references('id_drug__allergies')->on('drug__allergies');
          //
          // $table->integer('id_food__allergies')->unsigned();
          // $table->foreign('id_food__allergies')->references('id_food__allergies')->on('food__allergies');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pat__allergies');
    }
}
