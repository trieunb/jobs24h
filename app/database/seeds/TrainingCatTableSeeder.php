<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TrainingCatTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();


		 
		DB::table('training_cat')->truncate();
		$levels = array(
			'Phần Đào tạo',
			'DỊCH VỤ ĐÀO TẠO NHÂN SỰ',
			'DỊCH VỤ HEAD HUNTING',
			'THUÊ NGOÀI NHÂN SỰ',
			'DỊCH VỤ TUYỂN DỤNG',
			'TƯ VẤN CHIẾN LƯỢC NHÂN SỰ',
			'LƯƠNG VÀ CHẾ ĐỘ',
			'QUẢN LÝ NHÂN SỰ',
			'Tin tức Người tìm việc',
			'Cẩm nang Người tìm việc',
			'Cẩm nang Nhà tuyển dụng',

			);
		foreach($levels as $index)
		{
			TrainingCat::create([
				'name'	=>	$index
			]);
		}



		 
	}

}