<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddHiringPosts1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hiring_posts', function(Blueprint $table)
		{
			$table->integer('views')->after('sub_cat_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hiring_posts', function(Blueprint $table)
		{
			
		});
	}

}
