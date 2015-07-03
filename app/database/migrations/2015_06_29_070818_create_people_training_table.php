<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTrainingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	Schema::create('people_training', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('people_id');
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
		Schema::drop('people_training');
	}

}
