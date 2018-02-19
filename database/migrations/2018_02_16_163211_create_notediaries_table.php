<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotediariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notediaries', function (Blueprint $table) {
          $table->increments('id_notediaries');
          $table->string('overview',10);
          $table->string('howare',200)->nullable();
          $table->string('prob',200)->nullable();
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
        Schema::dropIfExists('notediaries');
    }
}
