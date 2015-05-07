<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlacklistEmployersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blacklist_employers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ntv_id');
			$table->integer('ntd_id');
			$table->dateTime('blacklist_date');

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
		Schema::drop('blacklist_employers');
	}

}
