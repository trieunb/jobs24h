<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtvCvCreate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntv_cv',function(Blueprint $table){
			$table->increments('id');
			$table->integer('ntv_info_id');
			$table->string('ntv_tieudeCV');
			$table->text('ntv_muctieunghenghiep');
			$table->string('capbac');
			$table->string('nganhnghe');
			$table->string('mucluong');
			$table->string('noilamviec');
			$table->string('quocgia');
			$table->string('hinhthuclamviec');
			$table->string('kinhnghiem');
			$table->string('capbachientai');
			$table->text('kynangchuyenmon');
			$table->text('thanhtich');
			$table->string('thamkhao');
			$table->boolean('chopheptimkiem');
			$table->integer('solanxem');
			$table->boolean('hosomacdinh');
			$table->string('ntv_file');
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
		Schema::drop('ntv_cv');
	}

}
