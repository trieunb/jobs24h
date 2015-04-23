<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProvinceTableSeeder extends Seeder {

	public function run()
	{
		$pro = @file_get_contents('http://www.careerlink.vn/');	

		$table = explode('id="quickJobSearch_province"', $pro);
		$table = explode('</select', $table[1]);
		$table = $table[0];
		$line = explode('<option', $table);
		for($i = 2; $i < count($line)-2; $i++)
		{
			$tinh = explode('">', $line[$i]);
			if(count($tinh) < 2) continue;
			$tinh = explode("<", $tinh[1]);
			$tinh = $tinh[0];
			Province::create([
				'tentinh'	=>	$tinh
			]);
		}
	}

}