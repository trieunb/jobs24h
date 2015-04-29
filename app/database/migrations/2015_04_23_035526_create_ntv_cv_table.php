<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNtvCvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ntv_cv', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ntv_id');
			$table->string('ntv_tieudeCV');
			$table->text('ntv_muctieunghenghiep');
			$table->integer('ntv_hocvan');
			$table->string('ntv_ctyganday');
			$table->string('ntv_cvganday');
			$table->string('ntv_capbachientai', 50);
			$table->string('ntv_vitrimongmuon', 50);
			$table->string('ntv_cbmongmuon', 50);
			$table->integer('ntv_noilamviec');
			$table->integer('ntv_nganhnghe');
			$table->integer('ntv_mucluongmongmuon');
			$table->text('ntv_thanhtich');
			$table->integer('ntv_thamkhao');
			$table->boolean('ntv_chopheptimkiem');
			$table->integer('ntv_solanxem')->default(0);
			$table->boolean('ntv_hosomacdinh')->default(1);
			$table->string('ntv_file');
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
		Schema::drop('ntv_cv');
	}

}
