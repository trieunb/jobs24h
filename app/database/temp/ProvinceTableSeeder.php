<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProvinceTableSeeder extends Seeder {

	public function run()
	{
		$provinces = array(
			'Hồ Chí Minh',
			'Hà Nội',
			'Đà Nẵng',
			'An Giang',
			'Bà Rịa - Vũng Tàu',
			'Bắc Cạn',
			'Bắc Giang',
			'Bạc Liêu',
			'Bắc Ninh',
			'Bến Tre',
			'Bình Định',
			'Bình Dương',
			'Bình Phước',
			'Bình Thuận',
			'Cà Mau',
			'Cần Thơ',
			'Cao Bằng',
			'Đắk Lắk',
			'Đăk Nông',
			'Điện Biên',
			'Đồng Nai',
			'Đồng Tháp',
			'Gia Lai',
			'Hà Giang',
			'Hà Nam',
			'Hà Tây',
			'Hà Tĩnh',
			'Hải Dương',
			'Hải Phòng',
			'Hậu Giang',
			'Hòa Bình',
			'Hưng Yên',
			'Kiên Giang',
			'Khánh Hòa',
			'Kon Tum',
			'Lai Châu',
			'Lâm Đồng',
			'Lạng Sơn',
			'Lào Cai',
			'Long An',
			'Nam Định',
			'Nghệ An',
			'Ninh Bình',
			'Ninh Thuận',
			'Phú Thọ',
			'Phú Yên',
			'Quảng Bình',
			'Quảng Nam',
			'Quảng Ngãi',
			'Quảng Ninh',
			'Quảng Trị',
			'Sóc Trăng',
			'Sơn La',
			'Tây Ninh',
			'Thái Bình',
			'Thái Nguyên',
			'Thanh Hóa',
			'Thừa Thiên - Huế',
			'Tiền Giang',
			'Trà Vinh',
			'Tuyên Quang',
			'Vĩnh Long',
			'Vĩnh Phúc',
			'Yên Bái',
			'Khác'
			);
			foreach ($provinces as $index) {
				Province::create([
					'province_name'	=>	$index,
					'country_id'	=>	1,
					'sort_order'	=>	1
				]);
			}
			
		}
	}

}