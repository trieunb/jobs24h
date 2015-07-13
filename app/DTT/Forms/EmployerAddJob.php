<?php 

namespace App\DTT\Forms;
use Lang;
class EmployerAddJob extends FormValidator {

	protected $rules = array(
		'namkinhnghiem'			=>	'numeric',
		'sltuyen'				=>	'numeric',
		'dotuoi_min'			=>	'numeric',
		'dotuoi_max'			=>	'numeric',
		'mucluong_min'			=>	'numeric',
		'mucluong_max'			=>	'numeric',
		'ntd_diadiem'			=>	'required',
		'ntd_nganhnghe'			=>	'required',
		'mota'					=>	'required|min:100|max:99999',
		'quyenloi'				=>	'min:0|max:99999',
		'hannop'				=>	'required|regex:/[0-9]{4}-[0-9]{2}-[0-9]{2}/',
		'hinhanh1'				=>	'mimes:jpeg,png,gif,bmp|max:2000',
		'hinhanh2'				=>	'mimes:jpeg,png,gif,bmp|max:2000',
		'hinhanh3'				=>	'mimes:jpeg,png,gif,bmp|max:2000',
		
		);
	protected $messages = array(
		'namkinhnghiem.numeric'	=>	'Năm kinh nghiệm phải là số.',
		'sltuyen.numeric'	=>	'Số lượng tuyển phải là số.',
		'dotuoi_min.numeric'	=>	'Độ tuổi phải là số.',
		'dotuoi_max.numeric'	=>	'Độ tuổi phải là số.',
		'mucluong_min.numeric'	=>	'Mức lương phải là số.',
		'mucluong_max.numeric'	=>	'Mức lương phải là số.',
		'mucluong_max.required'	=>	'Bạn phải nhập mức lương.',
		'mucluong_min.required'	=>	'Bạn phải nhập mức lương.',
		'ntd_nganhnghe.required'	=>	'Bạn phải chọn ít nhất 1 ngành nghề.',
		'ntd_diadiem.required'	=>	'Bạn phải chọn ít nhất 1 địa điểm.',
		'mota.required'			=>	'Bạn phải nhập mô tả công việc.',
		'mota.min'				=>	'Mô tả công việc quá ngắn. Tối thiểu 100 kí tự.',
		'mota.max'				=>	'Mô tả công việc quá dài. Tối đa 99999 kí tự.',
		'quyenloi.min'			=>	'Quyền lợi phải từ 0 đến 99999 kí tự.',
		'quyenloi.max'			=>	'Quyền lợi phải từ 0 đến 99999 kí tự.',
		'hannop.required'		=>	'Hạn nộp hồ sơ không được bỏ trống.',
		'hannop.regex'			=>	'Hạn nộp hồ sơ không đúng định dạng.',
		'hinhanh1.mimes'		=>	'Hình ảnh 1 không đúng định dạng.',
		'hinhanh2.mimes'		=>	'Hình ảnh 2 không đúng định dạng.',
		'hinhanh3.mimes'		=>	'Hình ảnh 3 không đúng định dạng.',
		'hinhanh3.size'			=>	'Hình ảnh 1 dung lượng quá lớn. Hình ảnh không quá 2MB',
		'hinhanh3.size'			=>	'Hình ảnh 2 dung lượng quá lớn. Hình ảnh không quá 2MB',
		'hinhanh3.size'			=>	'Hình ảnh 3 dung lượng quá lớn. Hình ảnh không quá 2MB',
		
		);
	
}