<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMtEducationHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mt_education_history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rs_id');
			$table->string('school');
			$table->integer('country_id');
			$table->string('subject');
			$table->string('level');
			$table->string('study_from', 50);
			$table->string('study_to', 50);
			$table->text('note');
			$table->text('social_activities');

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
		Schema::drop('mt_education_history');
	}

}
