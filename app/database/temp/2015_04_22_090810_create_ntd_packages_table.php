<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtdPackagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntd_packages',function(Blueprint $table){
			$table->increments('id');
			$table->integer('ntd_info_id');
			$table->string('package_id');
			$table->tinyInteger('active');
			$table->string('payment');
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
		Schema::drop('ntd_packages');
	}

}
