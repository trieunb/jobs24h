<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResumesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resumes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ntv_id');
			$table->integer('namkinhnghiem');
			$table->integer('bangcapcaonhat');
			$table->string('ctyganday');
			$table->string('cvganday');
			$table->integer('capbachientai');
			$table->string('vitrimongmuon');
			$table->integer('capbacmongmuon');
			$table->integer('mucluong');
			$table->integer('loaitien');
			$table->text('dinhhuongnn');
			$table->text('kynang');
			$table->text('danhgiabanthan');
			$table->text('sothich');
			$table->integer('hinhthuclamviec');
			$table->tinyInteger('loaihs');
			$table->tinyInteger('trangthai');
			$table->boolean('is_public');
			$table->boolean('is_visible');
			$table->string('file_name');
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
		Schema::drop('resumes');
	}

}
