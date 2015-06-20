<?php 

namespace App\DTT\Forms;
use Lang;
class EmployerAddLetter extends FormValidator {

	protected $rules = array(
		'subject'	=>	'required|min:5|max:255',
		'content'	=>	'required|max:1000',		
		
		);
	protected $messages = array(
		'subject.required'	=>	'Tiêu đề thư không được bỏ trống.',
		'subject.min'	=>	'Tiêu đề thư phải từ 5 đến 255 ký tự.',
		'subject.max'	=>	'Tiêu đề thư phải từ 5 đến 255 ký tự.',
		'content.required'	=>	'Nội dung thư không được bỏ trống.',
		'content.max'	=>	'Nội dung thư tối đa là 1000 ký tự.',
		);
	
}