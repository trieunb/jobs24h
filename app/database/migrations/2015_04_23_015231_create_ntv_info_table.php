<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNtvInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntv_info', function(Blueprint $table)
		{
			$table->increments('ntv_ntvID');
			$table->string('ntv_username', 50);
			$table->string('ntv_password', 50);
			$table->string('ntv_email', 255);
			$table->string('ntv_hoten', 50);
			$table->date('ntv_ngaysinh');
			$table->tinyInteger('ntv_gioitinh');
			$table->boolean('ntv_tinhtranghonnhan');
			$table->text('ntv_diachi');
			$table->string('ntv_tinhthanh');
			$table->integer('ntv_quocgia');
			$table->string('ntv_photo');
			$table->string('ntv_fbID');
			$table->string('ntv_googleID');
			$table->string('ntv_linkdleID');
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
		Schema::drop('ntv_info');
	}

}
