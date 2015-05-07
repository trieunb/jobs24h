<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CertificateTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$certificate = Config::get('custom_bangcap.bang_cap', 1);
			Certificate::create([
				'ntv_ntvID'	=>	$index,
				'ntv_chuyennganh'	=>	$faker->sentence(6),
				'ntv_truong'	=>	$faker->sentence(rand(3,5)),
				'ntv_bangcap'	=>	rand(1, count($certificate)-1),
				'ntv_thoigianbatdau'	=>	date( 'm/Y', strtotime('2010-01-01') ),
				'ntv_thoigianketthuc'	=>	date( 'm/Y', strtotime('2012-01-01') ),
				'ntv_thanhtuu'	=>	$faker->paragraph(rand(5, 10))
			]);
		}
	}

}