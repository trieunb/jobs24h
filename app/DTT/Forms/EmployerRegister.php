<?php 

namespace App\DTT\Forms;
use Lang;
class EmployerRegister extends FormValidator {

	protected $rules = array(
		'email'					=>	'required|email|confirmed|unique:employers,email',
		'password'				=>	'required|min:4|max:12|confirmed',
		'company_name'			=>	'required',
		'soluoc'				=>	'max:10000'
		);
	protected $messages = array(
		'email.required'	=>	'Email không được để trống.',
		'email.email'		=>	'Email không đúng định dạng.',
		'email.confirmed'	=>	'Nhập lại email không đúng.',
		'email.unique'		=>	'Email đã tồn tại.',
		'password.required'	=>	'Mật khẩu không được để trống.',
		'password.min'		=>	'Mật khẩu phải từ 4 đến 12 kí tự.',
		'password.max'		=>	'Mật khẩu phải từ 4 đến 12 kí tự.',
		'password.confirmed'=>	'Nhập lại mật khẩu không đúng.',
		'soluoc.max'		=>	'Sơ lược công ty quá dài.',
		);

}