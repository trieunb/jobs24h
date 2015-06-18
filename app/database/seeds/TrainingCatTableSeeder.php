<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TrainingCatTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();


		$faker = Faker::create();
		$levels = array(
			'Cung ứng lao động',
			'Đào tạo'
			);
		foreach($levels as $index)
		{
			TrainingCat::create([
				'name'	=>	$index
			]);
		}



		 
	}

}