<?php 
Route::group(array('prefix'=>$locale), function() {
	Route::group(array('prefix'=>'cam-nang-viec-lam', 'namespace'=>'Camnang'), function() {
		Route::controller('/', 'HomeController', array(
			'getIndex'		=>	'hiring.home',
			'getXemBaiViet'	=>	'hiring.detail',
			'getDanhMuc'	=>	'hiring.category',
		));
	});
});