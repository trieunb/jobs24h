<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddEmployerRsFolder1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('employer_rs_folder', function(Blueprint $table)
		{
			$table->integer('left_status')->after('status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('employer_rs_folder', function(Blueprint $table)
		{
			
		});
	}

}
