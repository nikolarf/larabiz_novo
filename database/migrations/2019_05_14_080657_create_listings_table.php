<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('listing_name');
            $table->string('listing_username');
            $table->string('email');
            $table->string('address');
            $table->string('country');
            $table->string('state');
            $table->string('zip');
            $table->int('shipping_address');
            $table->integer('save_information');
            $table->integer('paymentMethod');
            $table->string('name_on_card');
            $table->string('credit_card_number');
            $table->integer('expiration');
            $table->string('cvv');
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
        Schema::dropIfExists('listings');
    }
}
