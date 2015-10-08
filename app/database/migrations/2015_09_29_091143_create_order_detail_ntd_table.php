<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailNtdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_detail_ntd', function(Blueprint $table)
		{
			
			
			
			$table->increments('id');
			$table->integer('madonhang'); 
			$table->string('name_package'); 
			$table->integer('ntd_id'); 
			$table->integer('order_id');
			$table->integer('order_post_rec_id');
			$table->integer('price'); 
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
		Schema::drop('order_detail_ntd');
	}

}
