<?php 

namespace App\DTT\Forms;
use Lang;
class EmployerUpdateCompany extends FormValidator {

	protected $rules = array(
		'company_name'	=>	'required',
		'filelogo'		=>	'mimes:jpeg,bmp,png|max:100',
		'image1'		=>	'mimes:jpeg,bmp,png|max:1000',
		'image2'		=>	'mimes:jpeg,bmp,png|max:1000',
		'image3'		=>	'mimes:jpeg,bmp,png|max:1000',
		'image4'		=>	'mimes:jpeg,bmp,png|max:1000',
		'image5'		=>	'mimes:jpeg,bmp,png|max:1000',
		);
	protected $messages = array(
		'company_name.required'	=>	'Tên công ty không được để trống.',
		'filelogo.mimes'			=>	'Logo không đúng định dạng',
		'image1.mimes'			=>	'Hình ảnh 1 không đúng định dạng',
		'image2.mimes'			=>	'Hình ảnh 2 không đúng định dạng',
		'image3.mimes'			=>	'Hình ảnh 3 không đúng định dạng',
		'image4.mimes'			=>	'Hình ảnh 4 không đúng định dạng',
		'image5.mimes'			=>	'Hình ảnh 5 không đúng định dạng',
		'filelogo.max'			=>	'Dung lượng logo quá lớn',
		'image1.max'			=>	'Hình ảnh 1 dung lượng quá lớn',
		'image2.max'			=>	'Hình ảnh 2 dung lượng quá lớn',
		'image3.max'			=>	'Hình ảnh 3 dung lượng quá lớn',
		'image4.max'			=>	'Hình ảnh 4 dung lượng quá lớn',
		'image5.max'			=>	'Hình ảnh 5 dung lượng quá lớn',
		);

}