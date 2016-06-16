<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people', function(Blueprint $table) {
            $table->increments('id');
            $table->date('publishat');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('interval_type_id')->unsigned()->index();
            $table->foreign('interval_type_id')->references('id')->on('interval_types')->onDelete('cascade');
            $table->integer('donation_type_id')->unsigned()->index();
            $table->foreign('donation_type_id')->references('id')->on('donation_types')->onDelete('cascade');
            $table->integer('person_status_id')->unsigned()->index();
            $table->foreign('person_status_id')->references('id')->on('person_statuses')->onDelete('cascade');
            $table->integer('person_info_id')->unsigned()->index();
            $table->foreign('person_info_id')->references('id')->on('person_infos')->onDelete('cascade');
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
		Schema::drop('people');
	}

}
