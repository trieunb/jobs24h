<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddApplicationV1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('application', function(Blueprint $table)
		{
			$table->date('apply_date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('application_v1', function(Blueprint $table)
		{
			$table->dropColumn('apply_date');
		});
	}

}
