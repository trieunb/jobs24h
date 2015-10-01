<?php 

namespace App\DTT\Forms;
use Lang;
class EmployerForgetPass extends FormValidator {

	protected $rules = array(
		'captcha'	=>	'required|captcha',			
		);
	protected $messages = array(
		'captcha.required'	=>	'Bạn phải nhập mã bảo vệ.',
		'captcha.captcha'	=>	'Mã bảo vệ không chính xác.',
		);

}