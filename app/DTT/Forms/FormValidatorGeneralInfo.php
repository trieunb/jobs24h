<?php 
namespace App\DTT\Forms;
class FormValidatorGeneralInfo extends FormValidator {
	protected $rules = array(
		"years-of-experience"=>"required|numeric|max:2",
		"highest-degree"=>"required",
		"current-level"=>"required",
		"wish-position"=>"required",
		"wish-level"=>"required",
		"wish-place-work"=>"required",
		"category" =>"required",
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