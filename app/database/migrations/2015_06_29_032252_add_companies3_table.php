<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCompanies3Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('companies', function(Blueprint $table)
		{
			DB::statement('ALTER TABLE `companies` MODIFY `work_type` text;');
			$table->string('display_logo')->after('work_type');
			$table->text('work_field')->after('display_logo');
			$table->string('started_year')->after('work_field');
			$table->string('google_map')->after('started_year');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('companies', function(Blueprint $table)
		{
			
		});
	}

}
