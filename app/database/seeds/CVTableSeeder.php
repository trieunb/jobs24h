<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CVTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Resume::create([
				'ntv_id'	=>	NTV::orderBy(DB::raw('RAND()'))->first()->id,
				'ntv_tieudeCV'	=>	$faker->sentence(rand(3,6)),
				'ntv_muctieunghenghiep'	=>	$faker->paragraph(rand(5, 10)),
				'ntv_hocvan'	=>	$index,
				'ntv_ctyganday'	=>	$faker->sentence(rand(3,6)),
				'ntv_cvganday'	=>	$faker->sentence(rand(1,3)),
				'ntv_capbachientai'	=>	$faker->sentence(rand(1,2)),
				'ntv_vitrimongmuon'	=>	$faker->sentence(rand(1,2)),
				'ntv_cbmongmuon'	=>	$faker->sentence(rand(1,2)),
				//'ntv_noilamviec'	=>
				//'ntv_nganhnghe'
				'ntv_mucluongmongmuon'	=>	500,
				'ntv_thanhtich'	=>	$faker->paragraph(5),
				//'ntv_thamkhao'	=>	
				'ntv_chopheptimkiem'	=>	rand(0, 1),
				'ntv_solanxem'	=>	0,
				'ntv_hosomacdinh'	=>	rand(0, 1)

			]);
		}
	}

}