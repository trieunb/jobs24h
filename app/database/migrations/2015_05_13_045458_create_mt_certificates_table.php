<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMtCertificatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mt_certificates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rs_id');
			$table->string('name');
			$table->string('completed_date');
			$table->integer('description');

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
		Schema::drop('mt_certificates');
	}

}
