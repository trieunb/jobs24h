<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrderDetailTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		
		OrderDetail::create([
			'order_id'	=>	1,
			'viewed_date'	=>	date('Y-m-d H:i:s', time()-86400*10),
			'rs_id'	=>	2,
		]);
		OrderDetail::create([
			'order_id'	=>	1,
			'viewed_date'	=>	date('Y-m-d H:i:s', time()-86400*10),
			'rs_id'	=>	3,
		]);
		OrderDetail::create([
			'order_id'	=>	1,
			'viewed_date'	=>	date('Y-m-d H:i:s', time()-86400*5),
			'rs_id'	=>	4,
		]);
	}

}