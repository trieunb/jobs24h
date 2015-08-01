<?php 
Route::group(array('prefix'=>$locale), function() {
	Route::group(array('prefix'=>'san-pham-dich-vu', 'namespace'=>'Product'), function() {
		Route::controller('/', 'ProductController', array(
			'getIndex'		=>	'product.home',
			'getCustomHiring'		=>	'product.custom_hiring',
			'getDangTuyenDung'=>	'product.job_add',
			'getTimHoSo'	=>	'product.find_resume',
			'getTalentSolution'	=>	'product.talent',
			'getQuangBaThongTinTuyenDung'=>	'product.marketing',
			'getQuangCaoTuyenDung'=>	'product.advertising',
			'getDangHoSoTimHsQuocTe'=>	'product.submit_resume',
			'getTalentDriver'	=>	'product.talent_driver',
		));
	});
});