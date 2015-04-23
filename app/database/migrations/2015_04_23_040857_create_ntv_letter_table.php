<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNtvLetterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntv_letter', function(Blueprint $table)
		{
			$table->increments('ntv_letterID');
			$table->integer('ntv_ntvID');
			$table->string('ntv_tieudethu', 128);
			$table->text('ntv_noidungthu');
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
		Schema::drop('ntv_letter');
	}

}
