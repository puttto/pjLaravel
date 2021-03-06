<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaregiverSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caregiver_skills', function (Blueprint $table) {
            $table->increments('id_caregiver_skills');
            $table->timestamps();
            $table->integer('id_caregivers')->unsigned();
            $table->foreign('id_caregivers')->references('id_caregivers')->on('caregivers');
            $table->integer('id_special_skills')->unsigned();
            $table->foreign('id_special_skills')->references('id_special_skills')->on('special__skills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caregiver_skills');
    }
}
