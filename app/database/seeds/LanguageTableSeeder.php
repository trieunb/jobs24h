<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LanguageTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$langs = array(
			'Bengali',
			'Bulgarian',
			'Burmese',
			'Cambodian',
			'Cebuano',
			'Chinese (Cantonese)',
			'Chinese (Mandarin)',
			'Czech',
			'Danish',
			'Dutch',
			'English',
			'Finnish',
			'French',
			'German',
			'Greek',
			'Hindi',
			'Hungarian',
			'Indonesian',
			'Italian',
			'Japanese',
			'Javanese',
			'Korean',
			'Laotian',
			'Malay',
			'Norwegian',
			'Polish',
			'Portuguese',
			'Romanian',
			'Russian',
			'Spanish',
			'Swedish',
			'Tagolog',
			'Taiwanese',
			'Thai',
			'Turkish',
			'Ukranian',
			'Vietnamese',
			'Khác'
			);
		foreach($langs as $index)
		{
			Language::create([
				'lang_name'	=>	$index
			]);
		}
	}

}