<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddJobs1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jobs', function(Blueprint $table)
		{
			$table->renameColumn('mucluong', 'mucluong_min');
			$table->renameColumn('dotuoi', 'dotuoi_min');
			$table->integer('mucluong_max')->after('mucluong');
			$table->integer('dotuoi_max')->after('dotuoi');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jobs', function(Blueprint $table)
		{
			
		});
	}

}
