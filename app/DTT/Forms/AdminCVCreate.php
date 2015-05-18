<?php 

namespace App\DTT\Forms;
use Lang;
class AdminCVCreate extends FormValidator {

	protected $rules = array(
		'email'					=>	'required|email|exists:jobseekers,email',
		'tieude_cv'				=>	'required|min:3|max:255',
		'namkinhnghiem'			=>	'numeric',
		'ctyganday'				=>	'min:3|max:255',
		'capbachientai'			=>	'exists:levels,id',
		'mucluong'				=>	'numeric',
		'loaitien'				=>	'in:1,2',
		'work_types'			=>	'exists:work_types,id',
		'is_public'				=>	'in:0,1',
		'is_default'			=>	'in:0,1',
		'trangthai'				=>	'in:0,1',
		);
	protected $messages = array(
		'email.required'	=>	'Email không được để trống.',
		'email.exists'	=>	'Không tìm thấy người tìm việc với email trên.',
		'email'		=>	'Email không đúng định dạng.',
		'tieude_cv.min'	=>	'Tiêu đề hồ sơ phải từ 3 đến 255 kí tự.',
		'tieude_cv.max'	=>	'Tiêu đề hồ sơ phải từ 3 đến 255 kí tự.',
		'namkinhnghiem.required'	=>	'Nhập vào số năm kinh nghiệm.',
		'namkinhnghiem.numeric'	=>	'Năm kinh nghiệm phải là 1 số.',
		'ctyganday.min'	=>	'Công ty gần đây phải nhập từ 3 đến 255 kí tự.',
		'ctyganday.max'	=>	'Công ty gần đây phải nhập từ 3 đến 255 kí tự.',
		'capbachientai.exists'		=>	'Cấp bậc sai, không tìm thấy.',
		'loaitien.in'=> 'Loại tiền phải là VND hoặc USD',
		'work_types.exists'=> 'Không tìm thấy loại việc làm',
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