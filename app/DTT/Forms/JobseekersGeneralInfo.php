<?php 
namespace App\DTT\Forms;
class JobseekersGeneralInfo extends FormValidator {
	protected $rules = array(
		"info_highest_degree"	=>"required",
		"info_current_level"	=>"required",
		"info_wish_level"		=>"required",
		"info_wish_place_work"	=>"required",
		"info_category" 		=>"required",
		"foreign_languages_1"	=>"required",
		"level_languages_1" 	=>"required",
		"tieude" 				=>"required",
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