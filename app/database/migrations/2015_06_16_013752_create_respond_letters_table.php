<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRespondLettersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('respond_letters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ntd_id');
			$table->date('created_date');
			$table->string('subject');
			$table->text('content');
			$table->integer('type');
			$table->integer('status');

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
		Schema::drop('respond_letters');
	}

}
