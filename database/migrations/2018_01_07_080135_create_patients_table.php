<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id_patients');
            $table->string('name_Pat',50);
            $table->string('lastname_Pat',50);
            $table->string('nickname_Pat',50);
            $table->string('nationality_Pat',50);
            $table->string('race_Pat',50);
            $table->string('religion_Pat',50);
            $table->date('birthday_Pat');
            $table->integer('weight_Pat');
            $table->integer('hight_Pat');
            $table->string('id_card_Pat',13);
            $table->string('gender_Pat',2);
            $table->string('interesting_Pat',200)->nullable();
            $table->string('hospital_pat',200)->nullable();
            $table->string('img_name_Pat',50)->nullable();
            $table->timestamps();


            $table->integer('id_customer')->unsigned();
            //$table->foreign('id_customer')->references('id_customer')->on('customers');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
