<?php 

namespace App\DTT\Forms;
use Lang;
class AdminNTVCreate extends FormValidator {

	protected $rules = array(
		'username'				=>	'required|min:4|max:32|unique:ntv_info,username',
		'ntv_email'					=>	'required|email|unique:ntv_info,ntv_email',
		'password'				=>	'required|min:3',
		'ntv_ngaysinh'			=>	'date_format:Y-m-d',
		'ntv_gioitinh'			=>	'in:1,2,3',
		'ntv_tinhtranghonnhan'	=>	'in:1,2',
		'activated'				=>	'in:0,1',
		);
	protected $messages = array(
		'username.required'	=>	'Username không được để trống.',
		'ntv_email.required'	=>	'Email không được để trống.',
		'password.required'	=>	'Mật khẩu không được để trống.',
		'email'		=>	'Email không đúng định dạng.',
		'unique'	=>	':attribute đã tồn tại, vui lòng chọn tên khác',
		'min'		=>	':attribute tối thiểu là :min kí tự.',
		'date_format'=> 'Ngày sinh không đúng định dạng'
		);
}