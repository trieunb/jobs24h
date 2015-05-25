<?php 

namespace App\DTT\Forms;
class JobseekerResetPass extends FormValidator {
	protected $rules = array(
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