<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddMtWorkExpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mt_work_exps', function(Blueprint $table)
		{
			$table->text('job_detail')->after('company_name');
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
			
		});
	}

}
