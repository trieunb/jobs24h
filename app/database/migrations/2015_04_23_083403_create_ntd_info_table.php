<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtdInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntd_info',function(Blueprint $table){
			$table->increments('id');
			$table->string('ntd_email',200);
			$table->string('password',50);
			$table->string('ntd_tencty',200);
			$table->string('ntd_quymocty',50);
			$table->string('ntd_diachi',128);
			$table->string('ntd_tinhthanh',50);
			$table->string('ntd_quocgia',50);
			$table->text('ntd_soluocvecty',5000);
			$table->string('ntd_nguoilienlac',50);
			$table->string('ntd_dienthoai',50);
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
		Schema::drop('ntd_info');
	}
}
