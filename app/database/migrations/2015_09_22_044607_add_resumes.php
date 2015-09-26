<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddResumes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('resumes', function(Blueprint $table)
		{
			$table->string('second_file_name')->after('file_name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('resumes', function(Blueprint $table)
		{
			$table->dropColumn('second_file_name');
		});
	}

}
