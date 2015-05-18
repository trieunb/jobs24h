<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddMtWorkExps extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mt_work_exps', function(Blueprint $table)
		{
			$table->string('field');
			$table->string('specialized');
			$table->string('level');
			$table->string('salary');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mt_work_exps', function(Blueprint $table)
		{
			$table->dropColumn('field');
		});
	}

}
