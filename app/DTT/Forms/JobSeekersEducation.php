<?php 
namespace App\DTT\Forms;
class JobSeekersEducation extends FormValidator {
	protected $rules = array(
		"specialized"=>"required",
		"school"=>"required",
		"level"=>"required",
		"average_grade_id"=>"required",
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