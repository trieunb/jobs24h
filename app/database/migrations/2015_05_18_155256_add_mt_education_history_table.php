<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddMtEducationHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mt_education_history', function(Blueprint $table)
		{
			$table->integer('average_grade_id');
			$table->integer('field_of_study');
			$table->string('specialized');
			$table->renameColumn('note', 'achievement');
			$table->dropColumn('country_id');
			$table->dropColumn('subject');
			$table->dropColumn('social_activities');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
	}

}
