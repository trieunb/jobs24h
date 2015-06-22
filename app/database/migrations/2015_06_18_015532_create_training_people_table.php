<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingPeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('training_people', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name'); // họ tên
			$table->boolean('sex');//giới tính 
			$table->string('address');// địa chỉ 
			$table->string('phone');// sđt
			$table->string('email');// email
			$table->string('facebook');//link face
			$table->string('twitter');//
			$table->string('skype'); // 
			$table->string('linkedin');// 
			$table->integer('training_roll_id');// là học viên hay giảng vien
			$table->integer('training_id');// thuộc khóa đào tạo nào
			$table->string('thumbnail');// ảnh đại diện
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
		Schema::drop('training_people');
	}

}
