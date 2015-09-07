<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerPackageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employer_package', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ntd_id');
			$table->integer('package_id');
			$table->timestamp('date_end'); //ngày kết thúc dịch vụ, nếu ngày hiện tại > ngày kêt thúc thì hết hạn dùng; khi set thì dùng ngày hiện tại + them ngày của gói dịch vụ
			$table->integer('cv_end');
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
		Schema::drop('employer_package');
	}

}
