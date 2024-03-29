<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partner', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('thumbnail');
			$table->string('link');
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
		Schema::drop('partner');
	}

}
