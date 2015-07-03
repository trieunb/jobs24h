<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTrainingPeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('training_training_people', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('training_people_id');
			$table->integer('training_id');
			
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
		Schema::drop('training_training_people');
	}

}
