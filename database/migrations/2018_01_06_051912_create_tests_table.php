<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
          //  $table->integer('id_search');
            //$table->increments('test_id');
            $table->foreign('id')->references('id')->on('users');
          //  $table->foreign('id_search')->references('id')->on('searches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test');
    }
}
