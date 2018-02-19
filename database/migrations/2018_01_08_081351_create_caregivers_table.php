<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaregiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caregivers', function (Blueprint $table) {
            $table->increments('id_caregivers');
            $table->string('name_care',50);
            $table->string('lastname_care',50);
            $table->string('nickname_care',50);
            $table->string('gender_care',2);
            $table->date('birthday_care')->nullable();
            $table->integer('weight_care');
            $table->integer('hight_care');
            $table->string('nationality_care',50);
            $table->string('race_care',50);
            $table->string('religion_care',50);
            $table->string('id_line_care',50);
            $table->string('mobilephone_care',15);
            $table->string('id_card_care');
            $table->string('address_care',200);
            $table->string('caregiver_status',10)->nullable();
            $table->string('img_name')->nullable();
            $table->timestamps();
            $table->integer('id_user_caregivers')->unsigned();
            $table->foreign('id_user_caregivers')->references('id')->on('user_caregivers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caregivers');
    }
}
