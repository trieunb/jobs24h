<?php 
namespace App\DTT\Forms;
class JobseekersBasicInfo extends FormValidator {
	protected $rules = array(
		"date_of_birth"=>"required",
		"nationality_id"=>"required",
		"province_id"=>"required",
		"phone_number"=>"required|numeric|min:9",
		);
	protected $messages = array(
		'required'	=>	'Thông tin này bắt buộc',
		'min'		=>	'Tối thiểu :min kí tự.',
		'max'		=>	'Tối đa :max kí tự.',
		'email'		=>	'Email không đúng định dạng.',
		'unique'	=>	'Đã tồn tại.',
		'date'		=>	'Vui lòng nhập kiểu YYYY-MM-DD',
		'numeric'   =>  'Vui lòng nhập số'
		);
}