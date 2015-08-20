<?php 
Route::group(array('prefix'=>'admin'), function() {
	Route::group(array('before'=>'sentry.admin'), function() {
		Route::controller('province', 'ProvinceController', array(
			'getIndex'		=>	'admin.province.home',
			'getAdd'		=>	'admin.province.add.get',
			'postAdd'		=>	'admin.province.add.post',
			'getEdit'		=>	'admin.province.edit.get',
			'postEdit'		=>	'admin.province.edit.post',
			'postDelete'	=>	'admin.province.delete',
			'getResume'		=> 	'admin.province.resume.get',
			'getJob'		=> 	'admin.province.job.get'
		));
	});
});