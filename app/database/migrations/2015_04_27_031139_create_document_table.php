<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('file_title');
			$table->string('file_name');
			$table->integer('file_size');
			$table->dateTime('uploaded_date');
			$table->integer('total_views');
			$table->integer('total_downloaded');
			$table->integer('user_id');

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
		Schema::drop('document');
	}

}
