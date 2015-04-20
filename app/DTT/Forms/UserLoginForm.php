<?php 

namespace App\DTT\Forms;

class UserLoginForm extends FormValidator {

	protected $rules = array(
		'username'	=>	'required',
		'password'	=>	'required|min:6'
		);
	protected $messages = array(
		 'required' => ':attribute không được để trống thím ơi.',
		 'min'		=>	':attribute tối thiểu là :min ký tự cơ mà',
		);
}