<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddNtvReferenceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ntv_reference', function(Blueprint $table)
		{
			$table->dropColumn('ntv_ntvID');
			$table->integer('ntvcv_id')->after('ntv_ref');
			//$table->renameColumn('ntv_ntvID', 'ntvcv_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ntv_reference', function(Blueprint $table)
		{
			
		});
	}

}
