<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMtContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mt_contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rs_id');
			$table->integer('country_id');
			$table->integer('province_id');
			$table->string('address');
			$table->string('phone_number', 50);
			$table->string('another_phone', 50);

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
		Schema::drop('mt_contacts');
	}

}
