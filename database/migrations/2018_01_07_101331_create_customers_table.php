<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id_customer');
            $table->string('name_cus',50);
            $table->string('lastname_cus');
          $table->string('telephone_cus');
            $table->string('mobilephone_cus');
            $table->string('address_cus');
            $table->string('lineid_cus');
          $table->string('id_card_cus');
            $table->string('email_cus');

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
        Schema::dropIfExists('customers');
    }
}
