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
            $table->string('name_cus', 50);
            $table->string('lastname_cus', 50);
            $table->string('telephone_cus', 15);
            $table->string('mobilephone_cus', 15);
            $table->string('address_cus');
            $table->string('lineid_cus', 50);
            $table->string('id_card_cus', 13);
            $table->string('email_cus', 50)->nullable();

            $table->integer('id_user_customers')->unsigned();
            $table->foreign('id_user_customers')->references('id')->on('user_customers');


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
