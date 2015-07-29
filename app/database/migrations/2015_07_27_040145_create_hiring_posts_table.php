<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHiringPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hiring_posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('thumbnail');
			$table->text('content');
			$table->integer('user_id');
			$table->integer('cat_id');
			$table->integer('sub_cat_id');
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
		Schema::drop('hiring_posts');
	}

}
