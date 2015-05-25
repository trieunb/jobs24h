<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddMyJobV1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('my_jobs', function(Blueprint $table)
		{
			$table->integer('job_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('my_job_v1', function(Blueprint $table)
		{
			$table->dropColumn('job_id');
		});
	}

}
