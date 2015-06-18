<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TrainingRollTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$levels = array(
			'Giảng viên',
			'Học viên mới',
			'Học viên cũ'
			);
		foreach($levels as $index)
		{
			TrainingRoll::create([
				'name'	=>	$index
			]);
		}


		 
	}

}