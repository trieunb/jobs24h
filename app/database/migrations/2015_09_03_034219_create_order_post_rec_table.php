<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPostRecTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_post_rec', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ntd_id');
			$table->integer('epackage_id');
			$table->integer('total_date');
			$table->integer('remain_date');
			$table->timestamp('date_end'); //ngày kết thúc dịch vụ, nếu ngày hiện tại > ngày kêt thúc thì hết hạn dùng; khi set thì dùng ngày hiện tại + them ngày của gói dịch v
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
		//
	}

}
