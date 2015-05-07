<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMtWorkExpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mt_work_exps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rs_id');
			$table->string('position');
			$table->string('company_name');
			$table->string('from_date', 10);
			$table->string('to_date', 10);

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
		Schema::drop('mt_work_exps');
	}

}
