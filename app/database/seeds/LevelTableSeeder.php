<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LevelTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$levels = array(
			'Sinh viên / thực tập sinh',
			'Mới tốt nghiệp',
			'Nhân viên',
			'Trưởng nhóm/ giám sát',
			'Quản lý',
			'Phó giám đốc',
			'Giám đốc',
			'Phó chủ tịch'
			);
		foreach($levels as $index)
		{
			Level::create([
				'name'	=>	$index
			]);
		}
	}

}