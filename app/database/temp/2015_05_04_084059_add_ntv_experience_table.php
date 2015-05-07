<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddNtvExperienceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ntv_experience', function(Blueprint $table)
		{
			$table->dropColumn('ntv_ntvID');
			$table->integer('ntvcv_id')->after('id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ntv_experience', function(Blueprint $table)
		{
			
		});
	}

}
