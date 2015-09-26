<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddEmpViewResumeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('emp_view_resume', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rs_id');
			$table->integer('ntd_id');
			$table->integer('luotxem');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('emp_view_resume', function(Blueprint $table)
		{
			$table->dropColumn('id');
		});
	}

}
