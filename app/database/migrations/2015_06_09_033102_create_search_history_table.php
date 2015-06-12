<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSearchHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('search_history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ntd_id');
			$table->string('keyword');
			$table->integer('category');
			$table->integer('level');
			$table->integer('location');
			$table->integer('total_result');
			$table->date('search_date');
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
		Schema::drop('search_history');
	}

}
