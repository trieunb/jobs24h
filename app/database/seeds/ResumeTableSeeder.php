<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ResumeTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Resume::create([
				'ntv_id'	=>	NTV::orderBy(DB::raw('RAND()'))->first()->id,
				'ntv_tieudeCV'	=>	$faker->sentence(rand(5,10)),
				'ntv_muctieunghenghiep'	=>	$faker->paragraph(rand(5,20)),
				
			]);
		}
	}

}