<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('application', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('job_id');
			$table->integer('cv_id');
			$table->string('prefix_title');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('headline');
			$table->string('email');
			$table->string('contact_phone');
			$table->string('address');
			$table->integer('province_id');
			$table->string('file_name');
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
		Schema::drop('application');
	}

}
