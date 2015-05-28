<?php 

namespace App\DTT\Forms;
use Lang;
class EmployerChangePass extends FormValidator {

	protected $rules = array(
		'password'	=>	'required|confirmed|min:4',
		'captcha'	=>	'required|captcha',			
		);
	protected $messages = array(
		'password.required'	=>	'Mật khẩu mới không được trống.',
		'password.confirmed'	=>	'Nhập lại mật khẩu không chính xác.',
		'password.min'	=>	'Độ dài mật khẩu tối thiểu 4 kí tự.',
		'captcha.required'	=>	'Bạn phải nhập mã bảo vệ.',
		'captcha.captcha'	=>	'Mã bảo vệ không chính xác.',
		);

}