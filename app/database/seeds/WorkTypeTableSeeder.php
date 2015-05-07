<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class WorkTypeTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$types = array(
			'Nhân viên chính thức',
			'Nhân viên thời vụ',
			'Bán thời gian',
			'Làm thêm ngoài giờ',
			'Thực tập và dự án'
			);
		foreach($types as $index)
		{
			WorkType::create([
				'name'	=>	$index
			]);
		}
	}

}