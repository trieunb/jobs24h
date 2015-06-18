<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('training', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->integer('time_day');//thời lượng 20 buổi
			$table->string('fee');// học phí 
			$table->date('date_open');// ngày khai giảng
			$table->string('shift');// ca sáng chiều tối
			$table->date('date_study');//ngày học
			$table->integer('time_hour');//giờ học 20 giờ
			$table->text('content'); // nội dung khóa học
			$table->string('discount');// giảm giá hay notice
			$table->integer('teacher_id');// giảng viên
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
		Schema::drop('training');
	}

}
