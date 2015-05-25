<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ntd_id');
			$table->string('vitri');
			$table->integer('chucvu');
			$table->integer('namkinhnghiem');
			$table->integer('bangcap');
			$table->integer('hinhthuc');
			$table->integer('gioitinh');
			$table->integer('dotuoi');
			$table->integer('mucluong');
			$table->integer('sltuyen');
			$table->mediumText('mota');
			$table->mediumText('quyenloi');
			$table->text('yeucaukhac');
			$table->text('hosogom');
			$table->date('hannop');
			$table->integer('hinhthucnop');
			$table->string('keyword_tags');
			$table->string('nguoilienhe');
			$table->string('emaillienhe');
			$table->string('dienthoailienhe');
			$table->text('yeucaulienhe');
			$table->integer('status');

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
		Schema::drop('jobs');
	}

}
