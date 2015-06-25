<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddRespondsV1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('responds', function(Blueprint $table)
		{
			$table->string('first_name')->after('ntd_id');
			$table->string('last_name')->after('first_name');
			$table->string('email')->after('last_name');
			$table->string('feedback')->after('email');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('responds_v1', function(Blueprint $table)
		{
			$table->dropColumn('first_name');
		});
	}

}
