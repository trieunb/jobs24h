<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNtvExperienceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntv_experience', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ntv_ntvID');
			$table->string('ntv_tenCty', 50);
			$table->string('ntv_chucdanh', 50);
			$table->string('ntv_thoigianlamviec', 40);
			$table->text('ntv_noidungconviec');
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
		Schema::drop('ntv_experience');
	}

}
