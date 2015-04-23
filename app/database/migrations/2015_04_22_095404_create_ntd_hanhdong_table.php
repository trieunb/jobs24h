<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtdHanhdongTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntd_hanhdong',function(Blueprint $table){
			$table->increments('id');
			$table->integer('ntd_info_id');
			$table->string('tenhanhdong');
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
		Schema::drop('ntd_hanhdong');

	}

}
