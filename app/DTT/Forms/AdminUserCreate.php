<?php 

namespace App\DTT\Forms;
class AdminUserCreate extends FormValidator {

	protected $rules = array(
		'username'	=>	'required|min:4|max:32|unique:admin_info,username',
		'email'	=>	'required|email|unique:admin_info,email',
		'password'	=>	'required|min:6'
		);
	protected $messages = array(
		'required'	=>	':attribute không được để trống.',
		'min'		=>	':attribute tối thiểu :min kí tự.',
		'max'		=>	'độ dài :attribute phải nhỏ hơn :max kí tự.',
		'email'		=>	'Email không đúng định dạng.',
		'unique'	=>	':attribute đã tồn tại.',
		);
}