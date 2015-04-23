<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtvReferenceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntv_reference',function(Blueprint $table){
			$table->increments('id');
			$table->string('ntv_tennguoithamkhao');
			$table->string('chucdanh');
			$table->string('dienthoai');
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
		Schema::drop('ntv_reference');
	}

}
