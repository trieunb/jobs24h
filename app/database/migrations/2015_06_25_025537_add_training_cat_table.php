<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrainingCatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('training_people', function(Blueprint $table)
		{
			$table->string('banner')->after('name');
			 
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
Schema::table('training_cat', function(Blueprint $table)
		{
			
		});
	}
	}

}
