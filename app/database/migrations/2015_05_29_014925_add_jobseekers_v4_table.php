<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddJobseekersV4Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jobseekers', function(Blueprint $table)
		{
			$table->string('nghenghiep')->after('date_of_birth');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jobseekers_v4', function(Blueprint $table)
		{
			$table->dropColumn('nghenghiep');
		});
	}

}
