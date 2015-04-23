<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$cates = array('Bán hàng', 'Bán hàng kĩ thuật', 'Bán lẻ/Bán sỉ');
		foreach($cates as $index)
		{
			Category::create([
				'tennganh'	=>	$index
			]);
		}
	}

}