<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonInfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('person_infos', function(Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('address');
            $table->date('birthdate');
            $table->enum('gender', array('male', 'female'));
            $table->enum('maritalstatus', array('single', 'married', 'divorced'));
            $table->double('phone');
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
		Schema::drop('person_infos');
	}

}
