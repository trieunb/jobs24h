<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddMtWorkLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mt_work_locations', function(Blueprint $table)
		{
			$table->integer('count_work_location');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mt_work_location', function(Blueprint $table)
		{
			$table->dropColumn('count_work_localtion');
		});
	}

}
