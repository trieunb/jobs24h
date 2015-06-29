<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateViewResumeTableV1 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('view_resume', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ntv_id');
			$table->integer('ntd_id');
			$table->integer('cv_id');
			$table->integer('counter');
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
		Schema::drop('view_resume');
	}

}
