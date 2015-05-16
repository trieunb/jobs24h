<?php 
namespace App\DTT\Forms;
class JobseekersLogin extends FormValidator {

	protected $rules = array(
		'email'	=>	'required|email',
		'password'	=>	'required|min:3'
		);
	protected $messages = array(
		'required'	=>	':attribute không được để trống.',
		'password.min'	=>	'Password tối thiểu :min kí tự.',
		'email'		=>	'Email không đúng định dạng.',
		);
}