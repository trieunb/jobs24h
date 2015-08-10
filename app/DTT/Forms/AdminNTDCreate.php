<?php 

namespace App\DTT\Forms;
use Lang;
class AdminNTDCreate extends FormValidator {

	protected $rules = array(
		'email'					=>	'required|email|unique:employers,email',
		'password'				=>	'required|min:3',
		'is_active'				=>	'in:0,1',
		);
	protected $messages = array(
		'email.required'	=>	'Email không được để trống.',
		'password.required'	=>	'Mật khẩu không được để trống.',
		'email'		=>	'Email không đúng định dạng.',
		'unique'	=>	':attribute đã tồn tại, vui lòng chọn tên khác',
		'min'		=>	':attribute tối thiểu là :min kí tự.'
		);
}