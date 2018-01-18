<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelectCareStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('select_care_statuses', function (Blueprint $table) {
            $table->increments('id_select_care_statuses');
            $table->integer('id_patients');
            $table->integer('id_caregivers');
            $table->integer('status_care');
            $table->timestamps();
            $table->date('createAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('select_care_statuses');
    }
}
