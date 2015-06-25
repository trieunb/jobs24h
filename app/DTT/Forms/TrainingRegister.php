<?php 

namespace App\DTT\Forms;
use Lang;
class TrainingRegister extends FormValidator {

	protected $rules = array(
		'name'	=>	'required|min:4',
		'worked' => 'required|min:10',
		'phone' =>'required|numeric|min:10',
		'captcha'	=>	'required|captcha',			
		);
	protected $messages = array(
		'name.required'	=>	'Bạn phải nhập họ và tên.',
		'worked.required'	=>	'Nhập nơi học tập và làm việc',
		'phone.numeric'	=>	'Phải nhập đúng số điện thoại.',
		'phone.required'	=>	'Phải nhập đúng số điện thoại.',
		'phone.min'	=>	'Phải nhập đúng số điện thoại.',
		'captcha.required'	=>	'Bạn phải nhập mã bảo vệ.',
		'captcha.captcha'	=>	'Mã bảo vệ không chính xác.',
		);

}