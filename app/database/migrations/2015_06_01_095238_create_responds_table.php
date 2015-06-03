<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRespondsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('responds', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ntv_id');
			$table->integer('ntd_id');
			$table->string('title');
			$table->text('content');
			$table->dateTime('submited_date');
			$table->integer('user_submit'); //1: ntv, 2:ntd
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
		Schema::drop('responds');
	}

}
