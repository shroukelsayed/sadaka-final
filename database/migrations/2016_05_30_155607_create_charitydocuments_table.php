<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharityDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('charity_documents', function(Blueprint $table) {
            $table->increments('id');
            $table->binary('doc');
            $table->integer('charity_id')->unsigned()->index()->unique();
            $table->foreign('charity_id')->references('id')->on('charities')->onDelete('cascade');
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
		Schema::drop('charity_documents');
	}

}
