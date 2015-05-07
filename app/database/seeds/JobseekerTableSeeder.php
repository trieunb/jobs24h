<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class JobseekerTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$faker->addProvider(new \Faker\Provider\vi_VN\Person($faker));
		//$faker->addProvider(new \Faker\Provider\vi_VN\PhoneNumber($faker));

		foreach(range(1, 21) as $index)
		{
			$user = Sentry::createUser(array(
			'password'	=>	'123456',
			'email'	=>	$faker->email,
			'full_name'	=>	$faker->firstName . " " . $faker->lastName,
			'date_of_birth'	=>	$faker->date(),
			'gender'	=>	rand(1, 3),
			'phone_number'	=>	'0977 777 777',
			'marital_status'	=>	rand(0, 1),
			'address'	=>	$faker->address,
			'province_id'	=>	Province::orderBy(DB::raw('RAND()'))->first()->id,
			'country_id'	=>	1,
			'activated'		=>	true,
			));
		}
	}

}