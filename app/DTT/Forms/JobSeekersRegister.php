<?php 

namespace App\DTT\Forms;
class JobSeekersRegister extends FormValidator {
	protected $rules = array(
		"first_name"=>"required",
		"last_name"=>"required",
		"email"=>"required|email|unique:jobseekers,email",
		"password"=>"required|min:3|confirmed",
		"password_confirmation"=>"required|min:3"
		);
	protected $messages = array(
		'required'	=>	'(*) Thông tin bắt buộc.',
		'min'		=>	':attribute tối thiểu :min kí tự.',
		'email'		=>	'Email không đúng định dạng.',
		'unique'	=>	':attribute đã tồn tại.',
		'confirmed' => 	'Mật khẩu không khớp nhau'
		);
}