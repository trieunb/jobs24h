<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrainingPeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('training_people', function(Blueprint $table)
		{
			$table->text('feeling')->after('phone');
			$table->text('worked')->after('phone');
			$table->text('yourself')->after('phone');
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	Schema::table('training_people', function(Blueprint $table)
		{
			
		});
	}
	

}
