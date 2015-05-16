<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LevelLangTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$levels = array(
			'Sơ cấp',
			'Trung cấp',
			'Cao cấp',
			'Bản ngữ'
			);
		foreach($levels as $index)
		{
			LevelLang::create([
				'name' => $index
			]);
		}
	}

}