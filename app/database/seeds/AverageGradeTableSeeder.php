<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AverageGradeTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$average_grade = array(
			'Loại A',
			'Loại B',
			'Loại C',
			'Loại D',
			'1st Class',
			'2nd Class UPPER',
			'2nd Class LOWER',
			'3rd Class',
			'CGPA/Điểm Trung Bình',
			'Đậu',
			'Rớt',
			'Chưa Hoàn Tất',
			'Đang Học'
			);
		foreach($average_grade as $index)
		{
			AverageGrade::create([
				'name' => $index
			]);
		}
	}

}