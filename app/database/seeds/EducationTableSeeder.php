<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EducationTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$educations = array(
			'Chưa tốt nghiệp',
			'Trung học',
			'trung cấp',
			'cao đẳng',
			'Sau đại học',
			'Khác',

			);
		foreach($educations as $index)
		{
			Education::create([
				'name'	=>	$index
			]);
		}
	}

}