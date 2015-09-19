<?php 
namespace App\DTT\Forms;
class JobSeekersWorkExp extends FormValidator {
	protected $rules = array(
		"position"=>"required",
		"company_name"=>"required",
		"job_detail"=>"required|max:5000",
		"from_date" => "required",
		);
	protected $messages = array(
		'required'	=>	'Thông tin này bắt buộc',
		'min'		=>	'Tối thiểu :min kí tự.',
		'max'		=>	'Tối đa :max ký tự.',
		'email'		=>	'Email không đúng định dạng.',
		'unique'	=>	'Đã tồn tại.',
		);
}