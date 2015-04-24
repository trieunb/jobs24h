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
			$table->increments('id');
			$table->string('username', 50);
			$table->string('password', 50);
			$table->string('ntv_email', 255);
			$table->string('permission');
			$table->tinyInteger('activated');
			$table->string('activation_code');
			$table->timestamp('activated_at');
			$table->timestamp('last_login');
			$table->string('persist_code');
			$table->string('reset_password_code');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('ntv_hoten', 50);
			$table->date('ntv_ngaysinh');
			$table->tinyInteger('ntv_gioitinh');
			$table->boolean('ntv_tinhtranghonnhan');
			$table->text('ntv_diachi');
			$table->integer('ntv_tinhthanh');
			$table->integer('ntv_quocgia');
			$table->string('ntv_photo');
			$table->string('ntv_fbID');
			$table->string('ntv_googleID');
			$table->string('ntv_linkedinID');
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
