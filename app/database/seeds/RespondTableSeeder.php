<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RespondTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			VResponse::create([
				'ntv_id'	=>	2,
				'ntd_id'	=>	2,
				'title'		=>	$faker->sentence(6),
				'content'	=>	$faker->paragraph(5),
				'submited_date'=>	date('Y-m-d H:i:s', time()-4000+$index),
				'user_submit'=>	rand(1,2),
			]);
		}
	}

}