<?php 

namespace App\DTT\Forms;
use Lang;
class EmployerPostForgetPass extends FormValidator {

	protected $rules = array(
		'password'	=>	'required|confirmed|min:4',
		 		
		);
	protected $messages = array(
		'password.required'	=>	'Mật khẩu mới không được trống.',
		'password.confirmed'	=>	'Nhập lại mật khẩu không chính xác.',
		'password.min'	=>	'Độ dài mật khẩu tối thiểu 4 kí tự.',
		 
		);

}