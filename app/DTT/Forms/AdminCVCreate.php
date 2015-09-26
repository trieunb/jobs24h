<?php 

namespace App\DTT\Forms;
use Lang;
class AdminCVCreate extends FormValidator {

	protected $rules = array(
		'introduct_yourself' => 'required|max:5000',
		"position"=>"required",
		"company_name"=>"required",
		"job_detail"=>"required|max:5000",
		"from_date" => "required",
		"specialized"=>"required",
		"school"=>"required",
		"level"=>"required",
		"average_grade_id"=>"required",
		"info_highest_degree"	=>"required",
		"info_current_level"	=>"required",
		"info_wish_level"		=>"required",
		"info_wish_place_work"	=>"required",
		"info_category" 		=>"required",
		"foreign_languages_1"	=>"required",
		"level_languages_1" 	=>"required",
		"tieude" 				=>"required",
		'is_public'				=>	'in:0,1',
		'is_default'			=>	'in:0,1',
		'trangthai'				=>	'in:0,1',
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
	public function __construct($rules = array(), $messages = array())
	{
		if(count($rules))
		{
			foreach ($rules as $key => $value) {
				if(array_key_exists($key, $this->rules))
				{
					$this->rules[$key] = $value;
				}
			}
		}
		if(count($messages))
		{
			foreach ($messages as $key => $value) {
				if(array_key_exists($key, $this->messages))
				{
					$this->messages[$key] = $value;
				}
			}
		}
		parent::__construct();
	}
}