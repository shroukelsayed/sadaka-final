<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compaigns', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('location');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->double('budget');
            $table->text('description');
            $table->integer('owner')->unsigned()->index();
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');

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
		Schema::drop('compaigns');
	}

}
