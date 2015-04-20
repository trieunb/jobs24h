<?php 

namespace App\DTT\Forms;

class UserLoginForm extends FormValidator {

	protected $rules = array(
		'username'	=>	'required',
		'password'	=>	'required|min:6'
		);
}