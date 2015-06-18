<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingPostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('training_post', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title'); // 
			$table->string('subtitle');//nội dung giới thiệu
			$table->text('content');// nội dung 
			$table->integer('training_cat_id');// thể loại  gì
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
		Schema::drop('training_post');
	}

}
