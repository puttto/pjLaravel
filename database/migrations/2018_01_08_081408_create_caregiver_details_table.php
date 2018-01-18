<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaregiverDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caregiver__details', function (Blueprint $table) {
            $table->increments('id_caregiver__details');
            $table->integer('year_of_caregiver');
            $table->integer('edu_caregiver');
            $table->integer('type_of_living');
            $table->integer('rest_day');
            $table->timestamps();

            $table->integer('id_caregivers')->unsigned();
            $table->foreign('id_caregivers')->references('id_caregivers')->on('caregivers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caregiver__details');
    }
}
