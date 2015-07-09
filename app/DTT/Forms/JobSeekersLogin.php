<?php 
namespace App\DTT\Forms;
class JobseekersLogin extends FormValidator {

	protected $rules = array(
		'email'	=>	'required|email',
		'password'	=>	'required|min:3'
		);
	protected $messages = array(
		'email.required'	=>	'Email không được để trống.',
		'password.required'	=>	'Mật khẩu không được để trống.',
		'password.min'	=>	'Mật khẩu tối thiểu :min kí tự.',
		'email'		=>	'Email không đúng định dạng.',
		);
}