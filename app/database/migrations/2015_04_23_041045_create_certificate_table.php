<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCertificateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('certificate', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ntv_ntvID');
			$table->string('ntv_chuyennganh');
			$table->string('ntv_truong', 255);
			$table->integer('ntv_bangcap');
			$table->string('ntv_thoigianbatdau', 10);
			$table->string('ntv_thoigianketthuc', 10);
			$table->text('ntv_thanhtuu');
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
		Schema::drop('certificate');
	}

}
