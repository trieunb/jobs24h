<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messager',function(Blueprint $table){
			$table->increments('id');
			$table->integer('ntv_info_id');
			$table->integer('ntd_info_id');
			$table->string('title_mess');
			$table->text('content_mess');
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
		Schema::drop('messager');
	}

}
