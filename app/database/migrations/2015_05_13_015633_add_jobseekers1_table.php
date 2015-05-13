<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddJobseekers1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jobseekers', function(Blueprint $table)
		{
			DB::statement('ALTER TABLE jobseekers MODIFY COLUMN password VARCHAR(255)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jobseekers1', function(Blueprint $table)
		{
			
		});
	}

}
