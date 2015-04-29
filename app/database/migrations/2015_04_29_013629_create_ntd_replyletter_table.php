<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtdReplyletterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntd_replyletter',function(Blueprint $table){
			$table->increments('id');
			$table->integer('ntd_info_id');
			$table->integer('ntv_info_id');
			$table->string('title');
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
		Schema::drop('ntd_replyletter');
	}

}
