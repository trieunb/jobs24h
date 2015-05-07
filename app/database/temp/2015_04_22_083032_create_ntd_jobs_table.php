<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNtdJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntd_jobs',function(Blueprint $table){
			$table->increments('id');
			$table->integer('ntd_info_id');
			$table->integer('ntd_capbac_id');
			$table->integer('ntd_nganhnghe_id');
			$table->string('ntd_vitrituyendung');
			$table->longText('ntd_motacongviec');
			$table->longText('ntd_yeucaucongviec');
			$table->text('ntd_yeucauhoso');
			$table->string('ntd_chucdanh');
			$table->string('ntd_phucloi');
			$table->string('ntd_lhcongviec');
			$table->string('ntd_soluong');
			$table->string('ntd_kinhnghiem');
			$table->string('ntd_mucluong');
			$table->string('ntd_hancuoinophs');
			$table->string('ntd_tennguoilienhe');
			$table->string('ntd_emailnhanhoso');
			$table->string('ntd_ngonngutrinhbay');
			$table->string('ntd_jobs_image');
			$table->string('ntd_jobs_video');
			$table->tinyInteger('ntd_jobs_active');
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
		Schema::drop('ntd_jobs');
	}

}
