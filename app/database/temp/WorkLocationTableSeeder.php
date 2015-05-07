<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class WorkLocationTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			WorkLocation::create([
				'ntvcv_id'	=>	$index,
				'province_id'	=>	Province::orderBy(DB::raw('RAND()'))->first()->tinhID
			]);
		}
	}

}