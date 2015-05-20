<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('company_name');
			$table->integer('ntd_id');
			$table->string('website');
			$table->string('logo');
			$table->text('sort_description');
			$table->text('full_description');
			$table->string('work_type');
			$table->string('total_staff');
			$table->string('video_link');
			$table->string('company_images');

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
		Schema::drop('companies');
	}

}
