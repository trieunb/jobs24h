<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class NTVTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		foreach(range(1, 21) as $index)
		{
			$user = Sentry::createUser(array(
				'username'	=>	$faker->username,
				'password'	=>	'123456',
				'ntv_email'	=>	$faker->email,
				'ntv_hoten'	=>	$faker->firstName . " " . $faker->lastName,
				'ntv_ngaysinh'	=>	$faker->date(),
				'ntv_gioitinh'	=>	rand(1, 3),
				'ntv_tinhtranghonnhan'	=>	rand(0, 1),
				'ntv_diachi'	=>	$faker->address,
				'ntv_tinhthanh'	=>	Province::orderBy(DB::raw('RAND()'))->first()->tinhID,
				'ntv_quocgia'	=>	1,
				'activated'		=>	true,
				));
			/*NTV::create([
				'ntv_username'	=>	$faker->username,
				'ntv_password'	=>	Hasher::hash('123456'),
				'ntv_email'	=>	$faker->email,
				'ntv_hoten'	=>	$faker->firstName . " " . $faker->lastName,
				'ntv_ngaysinh'	=>	$faker->date(),
				'ntv_gioitinh'	=>	rand(1, 3),
				'ntv_tinhtranghonnhan'	=>	rand(0, 1),
				'ntv_diachi'	=>	$faker->address,
				'ntv_tinhthanh'	=>	Province::orderBy(DB::raw('RAND()'))->first()->tinhID,
				'ntv_quocgia'	=>	1
			]);*/
		}
	}

}