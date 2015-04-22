<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::table('users', function(Blueprint $table)
		{
			$table->string('username')->after('email');
			$table->date('ngaysinh')->after('last_name');
			$table->text('diachi')->after('ngaysinh');
			$table->tinyInteger('tinhtranghonnhan')->after('diachi');
			$table->tinyInteger('gioitinh')->after('tinhtranghonnhan');
			$table->string('tinhthanh');
			$table->integer('quocgia');
			$table->string('photo');
			$table->string('fbID');
			$table->string('googleID');
			$table->string('linkedID');

		});*/
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			
		});
	}

}
