<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PackageTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$packages = array(
			['service_id'=>1, 'package_name'=>'RD1 240CV', 'total_date'=>14, 'total_resume'=>240, 'price'=>1000000],
			['service_id'=>1, 'package_name'=>'RD1 600CV', 'total_date'=>30, 'total_resume'=>600, 'price'=>2000000],
			['service_id'=>1, 'package_name'=>'RD1 1800CV', 'total_date'=>90, 'total_resume'=>1800, 'price'=>4000000],
			['service_id'=>1, 'package_name'=>'RD1 3600CV', 'total_date'=>180, 'total_resume'=>3600, 'price'=>8000000],
			['service_id'=>1, 'package_name'=>'RD1 7200CV', 'total_date'=>365, 'total_resume'=>7200, 'price'=>16000000],
			);
		Package::insert($packages);
	}

}