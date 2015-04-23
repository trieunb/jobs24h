<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtvLetterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntv_letter',function(Blueprint $table){
			$table->increments('id');
			$table->increments('ntv_info_id');
			$table->string('ntv_tieudethu');
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
