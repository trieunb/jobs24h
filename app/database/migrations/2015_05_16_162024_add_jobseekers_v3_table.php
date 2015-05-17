<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddJobseekersV3Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jobseekers', function(Blueprint $table)
		{
			$table->integer('is_publish');
			DB::statement('ALTER TABLE jobseekers MODIFY COLUMN date_of_birth DATE DEFAULT NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jobseekers_v3', function(Blueprint $table)
		{
			$table->dropColumn('is_publish');
		});
	}

}
