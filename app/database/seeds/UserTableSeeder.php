<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$user = Sentry::createUser(array(
	        'email'     => 'admin@localhost.com',
	        'username'  => 'admin',
	        'password'  => 'admin',
	        'first_name'=> 'Admin MP',
	        'ngaysinh'		=> '1990-04-10',
	        'diachi'	=> 'Da Nang',
	        'activated' => true,
	    ));
	    $adminGroup = Sentry::findGroupById(1);
	    $user->addGroup($adminGroup);

	    $userGroup = Sentry::findGroupById(3);
		foreach(range(1, 100) as $index)
		{
			$user = Sentry::createUser(array(
		        'email'     => $faker->email,
		        'username'     => $faker->username,
		        'password'  => '123456',
		        'first_name'  => $faker->firstName . " " . $faker->lastName,
		        'diachi'	=>	$faker->address,
		        'ngaysinh'	=>	$faker->date(),
		        'tinhtranghonnhan'=> 1,
		        'tinhthanh'	=>	$faker->state,
		        'quocgia'	=>	1,
		        'activated' => true,
		    ));
		    $user->addGroup($userGroup);
		}
	}

}