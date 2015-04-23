<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtvExperienceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntv_experience',function(Blueprint $table){
			$table->increments('id');
			$table->integer('ntv_info_id');
			$table->string('tenCty');
			$table->string('chucdanh');
			$table->string('thoigianlamviec');
			$table->text('noidungcongviec');
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
