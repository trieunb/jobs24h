<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrderTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$p = Package::orderBy(DB::raw('RAND()'))->first();
			Order::create([
				'ntd_id'	=>	rand(1,2),
				'service_id'	=>	1,
				'package_name'	=>	$p->package_name,
				'total'			=>	$p->total_date,
				'remain'		=>	rand(0,$p->total_date),
				'created_date'	=>	date('Y-m-d'),
				'ended_date'	=>	date('Y-m-d', time() + (86400*$p->total_date))
			]);
		}
	}

}