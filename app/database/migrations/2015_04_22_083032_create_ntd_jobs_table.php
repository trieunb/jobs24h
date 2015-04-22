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
			$table->integer('info_id');
			$table->string('ntd_vitrituyendung');
			$table->longText('ntd_motacongviec');
			$table->longText('ntd_yeucaucongviec');
			$table->string('ntd_nganhnghe');
			$table->string('ntd_lhcongviec');
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
