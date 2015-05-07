<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddNtvCvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ntv_cv', function(Blueprint $table)
		{
			$table->string('ntv_avatar')->after('ntv_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ntv_cv', function(Blueprint $table)
		{
			
		});
	}

}
