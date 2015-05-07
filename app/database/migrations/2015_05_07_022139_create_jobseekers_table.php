<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobseekersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobseekers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('password', 50);
			$table->string('email', 255);
			$table->string('permission');
			$table->tinyInteger('activated');
			$table->string('activation_code');
			$table->timestamp('activated_at');
			$table->timestamp('last_login');
			$table->string('persist_code');
			$table->string('reset_password_code');
			$table->string('full_name', 50);
			$table->date('date_of_birth');
			$table->tinyInteger('gender');
			$table->string('phone_number', 50);
			$table->boolean('marital_status');
			$table->string('address');
			$table->integer('province_id');
			$table->integer('country_id');
			$table->string('avatar');
			$table->string('facebook_ID');
			$table->string('gplus_ID');
			$table->string('linkedin_ID');
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
		Schema::drop('jobseekers');
	}

}
