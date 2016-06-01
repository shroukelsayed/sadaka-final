<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharityAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('charity_addresses', function(Blueprint $table) {
            $table->increments('id');
            $table->text('address');
            $table->integer('charity_id')->unsigned()->index()->unique();
            $table->foreign('charity_id')->references('id')->on('charities')->onDelete('cascade');
            $table->integer('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->integer('governorate_id')->unsigned()->index();
            $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');
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
		Schema::drop('charity_addresses');
	}

}
