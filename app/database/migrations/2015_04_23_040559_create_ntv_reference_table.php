<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNtvReferenceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntv_reference', function(Blueprint $table)
		{
			$table->increments('ntv_ref');
			$table->integer('ntv_ntvID');
			$table->string('ntv_tennguoithamkhao', 50);
			$table->string('ntv_chucdanh', 50);
			$table->string('ntv_dienthoai', 40);
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
