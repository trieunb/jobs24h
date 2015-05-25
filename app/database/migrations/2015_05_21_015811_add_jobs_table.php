<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jobs', function(Blueprint $table)
		{

			DB::statement('ALTER TABLE jobs CHANGE chucvu chucvu VARCHAR(255),CHANGE namkinhnghiem namkinhnghiem INT(11) , CHANGE mucluong mucluong INT(11) ');
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
