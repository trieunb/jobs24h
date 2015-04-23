<?php 

namespace App\DTT\Forms;
use Lang;
class AdminUserSave extends FormValidator {

	protected $rules = array(
		'username'	=>	'required',
		'email'	=>	'required'
		);
	protected $messages = array(
		'required'	=>	':attribute không được để trống.'
		);
}