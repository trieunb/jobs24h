<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class NTVTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			NTV::create([
				'ntv_username'	=>	$faker->username,
				'ntv_password'	=>	'123456',
				'ntv_email'	=>	$faker->email,
				'ntv_hoten'	=>	$faker->firstName . " " . $faker->lastName,
				'ntv_ngaysinh'	=>	$faker->date(),
				'ntv_gioitinh'	=>	rand(1, 3),
				'ntv_tinhtranghonnhan'	=>	rand(0, 1),
			]);
		}
	}

}