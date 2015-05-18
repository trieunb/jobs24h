<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SpecializedTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$specialized = array(
			'Bán hàng - Bán lẻ/Chung',
			'Bán hàng - Công ty',
			'Bán hàng - Dịch vụ Tài chính (Bảo hiểm, Đầu tư Tín thác, v.v…)',
			'Bán hàng - Kỹ nghệ/Kỹ thuật/IT',
			'Bảo trì/Sửa chữa (Trang thiết bị và máy móc)',
			'Buôn bán',
			'Chiến lược doanh nghiệp/Quản lý Cấp cao',
			'Công nghệ Sinh học',
			'Công nghệ Thực phẩm/Dinh dưỡng học',
			'Dịch vụ An ninh',
			'Dịch vụ Chăm sóc tư/Làm đẹp/Thể dục Thẩm mỹ',
			'Dịch vụ khách hàng',
			'Dịch vụ Luật/Pháp lý',
			'Dịch vụ Ngân hàng/Tài chính',
			'Dịch vụ xã hội & tư vấn',
			'Giải trí/Nghệ thuật biểu diễn',
			'Giáo dục',
			'Hàng không/Bảo trì Máy bay',
			'Hỗ trợ kỹ thuật',
			'Hóa học',
			'IT/Máy tính - Mạng/Hệ thống/Quản trị Cơ sở dữ liệu',
			'IT/Máy tính - Phần cứng',
			'IT/Máy tính - Phần mềm',
			'Kho vận/Chuỗi cung ứng',
			'Khoa học & Công nghệ/Thí nghiệm',
			'Khoa học/Thống kê Bảo hiểm',
			'Kiểm soát/Bảo đảm Chất lượng',
			'Kiến trúc/Thiết kế Nội thất',
			'Kinh doanh - Bán hàng/Tiếp thị qua điện thoại',
			'Kỹ thuật - Cơ khí/Ô tô',
			'Kỹ thuật - Công nghiệp',
			'Kỹ thuật - Dầu/Khí',
			'Kỹ thuật - Hóa học',
			'Kỹ thuật - Khác',
			'Kỹ thuật - Môi trường/Y tế/An toàn',
			'Kỹ thuật - Xây dựng dân dụng/Xây dựng/Kết cấu',
			'Kỹ thuật - Điện',
			'Kỹ thuật - Điện tử/Viễn thông',
			'Lao động phổ thông (Trông nhà, Lái xe, Vận chuyển, Đưa thư, v.v…)',
			'Mỹ thuật/Sáng tạo/Thiết kế Đồ họa',
			'Nhà báo/Biên tập viên',
			'Nhân sự',
			'Nông nghiệp/Lâm nghiệp/Ngư nghiệp',
			'Quan hệ Công chúng/Truyền thông',
			'Quản lý Khách sạn/Dịch vụ Du lịch',
			'Quản lý Mua hàng/Kho hàng/Vật tư & Kho bãi',
			'Quảng cáo/Kế hoạch truyền thông',
			'Sản xuất/Hoạt động Sản xuất',
			'Tài chính - Kế toán Tổng hợp/Chi phí',
			'Tài chính - Kiểm toán/Thuế',
			'Tài chính - Tài chính Doanh nghiệp/Đầu tư/Ngân hàng thương mại',
			'Thiết kế & Điều khiển quá trình/Công cụ',
			'Thư ký/Trợ lý Hành chính',
			'Thư ký/Trợ lý Điều hành & Cá nhân',
			'Thực phẩm/Đồ uống/Dịch vụ Nhà hàng',
			'Tiếp thị/Phát triển kinh doanh',
			'Xuất bản/In ấn',
			'Y tế - Bác sĩ/Chẩn đoán',
			'Y tế - Dược',
			'Y tế - Y tá/Hộ lý',
			'Đào tạo & Phát triển',
			'Đất đai/Bất động sản',
			'Địa chất/Địa Vật lý',
			'Định giá xây dựng',
			'Khác'
			);
		foreach($specialized as $index)
		{
			Specialized::create([
				'name'=> $index
			]);
		}
	}

}