<?php 

namespace App\DTT\Forms;
use Lang;
class AdminNTVCreate extends FormValidator {

	protected $rules = array(
		'email'					=>	'required|email|unique:jobseekers,email',
		'password'				=>	'required|min:3',
		'date_of_birth'			=>	'date_format:Y-m-d',
		'gender'			=>	'in:1,2,3',
		'marital_status'	=>	'in:1,2',
		'activated'				=>	'in:0,1',
		);
	protected $messages = array(
		'email.required'	=>	'Email không được để trống.',
		'password.required'	=>	'Mật khẩu không được để trống.',
		'email'		=>	'Email không đúng định dạng.',
		'unique'	=>	':attribute đã tồn tại, vui lòng chọn tên khác',
		'min'		=>	':attribute tối thiểu là :min kí tự.',
		'date_format'=> 'Ngày sinh không đúng định dạng'
		);
}