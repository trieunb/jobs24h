<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class FieldsInWorkExpTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$fields =array(
			'An ninh / Thi hành Luật',
			'Bán lẻ / Hàng hóa',
			'Báo chí',
			'Bảo hiểm',
			'Biển / Nuôi trồng thủy sản',
			'Chăm sóc / Làm đẹp / Thể dục thẩm mỹ',
			'Chăm sóc sức khỏe / Y tế',
			'Chế tạo / Sản xuất',
			'Chế tạo chất Bán dẫn/IC',
			'Chính phủ / Quốc phòng',
			'Công nghệ sinh học / Dược / Nghiên cứu lâm sàng',
			'Công nghiệp nặng / Máy móc / Trang thiết bị',
			'Dầu / Khí / Dầu mỏ',
			'Dệt / May mặc',
			'Dịch vụ Kiến trúc / Thiết kế nội thất',
			'Dịch vụ Ngân hàng / Tài chính',
			'Dịch vụ Sửa chữa &amp; Bảo trì',
			'Giải trí / Truyền thông đa phương tiện',
			'Giáo dục',
			'Gỗ / Sợi / Giấy',
			'Hàng không Vũ trụ / Hàng không / Đường không ',
			'Hàng tiêu dùng / FMCG',
			'Hóa học / Phân bón / Thuốc trừ sâu ',
			'In ấn / Xuất bản',
			'Kế toán / Kiểm toán / Dịch vụ thuế',
			'Khách sạn / Nhà nghỉ',
			'Khai thác Mỏ',
			'Khoa học &amp; Công nghệ',
			'Lữ hành / Du lịch',
			'Luật / Pháp lý',
			'May mặc',
			'Máy tính / Công nghệ thông tin (Phần cứng)',
			'Máy tính / Công nghệ thông tin (Phần mềm)',
			'Môi giới chứng khoán / Chức khoán',
			'Môi trường / Y tế / An toàn',
			'Mỹ thuật / Thiết kế / Thời trang',
			'Nghiên cứu &amp; Phát triển',
			'Nhà đất / Bất động sản',
			'Nông nghiệp / Trồng rừng / Chăn nuôi / Ngư nghiệp',
			'Ô tô / Phụ trợ Ô tô / Phương tiện',
			'Pôlime / Nhựa / Cao su / Săm lốp',
			'Quản lý / Tư vấn nhân sự',
			'Quảng cáo / Tiếp thị / Quảng bá thương hiệu / PR',
			'Thể thao',
			'Thư viện / Bảo tàng',
			'Thực phẩm &amp; Đồ uống / Dịch vụ ăn uống /  Nhà hàng',
			'Thuốc lá',
			'Thương mại Chung &amp; Bán buôn',
			'Tiện ích / Năng lượng',
			'Tổ chức phi lợi nhuận / Dịch vụ xã hội / Tổ chức phi chính phủ',
			'Triển lãm / Quản lý sự kiện / MICE',
			'Trung tâm Cuộc gọi / Dịch vụ IT / Gia công Quy trình Kinh doanh',
			'Tư vấn (IT, Khoa học, Công nghệ &amp; Kỹ thuật)',
			'Tư vấn (Kinh doanh &amp; Quản lý)',
			'Vận tải / Kho vận',
			'Viễn thông',
			'Xây dựng Công trình / Xây dựng / Kỹ thuật',
			'Đá quý / Trang sức',
			'Điện & Điện tử',
			'Khác'
		);
		foreach($fields as $index)
		{
			FieldsInWorkExp::create([
				'name' => $index
			]);
		}
	}

}