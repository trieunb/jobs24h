<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CountryTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		Country::create(array(
			'tenquocgia'	=>	'Việt Nam'
			));
	}

}