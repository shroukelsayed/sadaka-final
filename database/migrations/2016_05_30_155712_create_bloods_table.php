<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bloods', function(Blueprint $table) {
            $table->increments('id');
            $table->string('bloodtype');
            $table->integer('amount');
            $table->text('hospital');
            $table->text('address');
            $table->integer('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->integer('governorate_id')->unsigned()->index();
            $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');
            $table->integer('person_id')->unsigned()->index();
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
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
		Schema::drop('bloods');
	}

}
