<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddJobseekersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jobseekers', function(Blueprint $table)
		{
			$table->string('first_name')->after('reset_password_code');
			$table->string('last_name')->after('first_name');
			$table->string('subscribe')->after('linkedin_ID');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jobseekers', function(Blueprint $table)
		{
			
		});
	}

}
