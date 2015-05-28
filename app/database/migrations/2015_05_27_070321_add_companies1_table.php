<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCompanies1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('companies', function(Blueprint $table)
		{
			$table->text('chonchungtoi')->after('contact_name');
			$table->string('sodangky')->after('chonchungtoi');
			$table->integer('quymocty')->after('sodangky');
			$table->integer('nganhnghe')->after('quymocty');
			$table->string('giolamviec')->after('nganhnghe');
			$table->string('ngonngu')->after('giolamviec');
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
