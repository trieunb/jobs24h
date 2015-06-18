<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('training_document', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title'); // 
			$table->text('content');//nội dung giới thiệu
			$table->string('author');// tác giả 
			$table->integer('view');// lượt view
			$table->integer('download');// lượt download
			$table->string('store');//nơi lưu
			 
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
		Schema::drop('training_document');
	}

}
