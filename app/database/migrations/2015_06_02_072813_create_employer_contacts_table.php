<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployerContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employer_contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ntd_id');
			$table->string('full_name');
			$table->string('phone');
			$table->string('email');
			$table->string('company');
			$table->integer('province_id');
			$table->integer('service_id');
			$table->text('content');
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
		Schema::drop('employer_contacts');
	}

}
