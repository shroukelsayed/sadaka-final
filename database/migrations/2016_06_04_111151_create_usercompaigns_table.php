<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsercompaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usercompaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('compaign_id')->unsigned()->index();
            $table->foreign('compaign_id')->references('id')->on('compaigns')->onDelete('cascade');
            $table->integer('amount');
            $table->integer('donate_type_id')->unsigned()->index();
            $table->foreign('donate_type_id')->references('id')->on('compaign_donate_types')->onDelete('cascade');

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
        Schema::drop('usercompaigns');
    }
}
