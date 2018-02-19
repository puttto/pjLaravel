<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVitalSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->increments('id_vital_signs');
            $table->integer('sys');
            $table->integer('dia');
            $table->integer('heart_rate');
            $table->double('temp',4,2);
            $table->integer('spo2')->nullable();
            $table->string('comment',200)->nullable();
            $table->timestamp('date_time')->nullable();
            $table->integer('id_caregivers')->unsigned();
            $table->foreign('id_caregivers')->references('id_caregivers')->on('caregivers');
            $table->integer('id_patients')->unsigned();
            $table->foreign('id_patients')->references('id_patients')->on('patients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vital_signs');
    }
}
