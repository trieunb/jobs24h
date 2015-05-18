<?php 
namespace App\DTT\Forms;
class JobSeekersWorkExp extends FormValidator {
	protected $rules = array(
		"position"=>"required",
		"company_name"=>"required",
		"job_detail"=>"required",
		"field"=>"required",
		"specialized"=>"required",
		"level"=>"required",
		"salary"=>"required",
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