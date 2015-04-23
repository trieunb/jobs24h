<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtdHosoungvienTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntd_hosoungvien',function(Blueprint $table){
			$table->increments('id');
			$table->integer('ntv_info_id');
			$table->string('tenungvien');
			$table->string('vitriungtuyen');
			$table->string('diadiem');
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
		Schema::drop('ntd_hosoungvien');
	}

}
