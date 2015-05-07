<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$cates = array(
			'Bán hàng', 
			'Dịch vụ', 
			'Chăm sóc sức khỏe',
			'Sản xuất',
			'Hàng tiêu dùng',
			'Máy tính / Công nghệ thông tin',
			'Hành chính / Nhân sự',
			'Kế toán / Tài chính',
			'Truyền thông / Media',
			'Xây dựng',
			'Kỹ thuật',
			'Giáo dục / Đào tạo',
			'Khoa học',
			'Khách sạn / Du lịch',
			'Ngành khác'
		);
		foreach($cates as $index)
		{
			Category::create([
				'cat_name'	=>	$index,
				'parent_id'	=>	0
			]);
		}
		$sub_cate = array(
			'Bán hàng / Kinh doanh',
			'Tiếp thị / Marketing/ Pr',
			'Bán lẻ / Bán sỉ'
			);
		foreach($sub_cate as $index)
		{
			Category::create([
				'cat_name'	=>	$index,
				'parent_id'	=>	1

			]);
		}
	}

}