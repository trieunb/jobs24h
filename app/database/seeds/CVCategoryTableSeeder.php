<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CVCategoryTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			CVCategory::create([
				'ntvcv_id'	=>	$index,
				'category_id'	=>	Category::orderBy(DB::raw('RAND()'))->first()->nganhID
			]);
		}
	}

}