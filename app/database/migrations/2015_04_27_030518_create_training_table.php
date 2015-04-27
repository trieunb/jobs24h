<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrainingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('training', function(Blueprint $table)
		{
			$table->increments('id');
			$table->longText('tieude');
			$table->text('noidung');
			$table->string('giangvien');
			$table->dateTime('khaigiang');
			$table->integer('cahoc');
			$table->integer('giohoc');
			$table->date('ngayhoc');
			$table->integer('thoiluong');
			$table->string('hocphi');
			$table->integer('featured_image');
			$table->string('files');
			$table->string('categories');
			$table->integer('status');
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
		Schema::drop('training');
	}

}
