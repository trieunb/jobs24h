<?php 
Route::group(array('prefix'=>'admin'), function() {
	Route::group(array('before'=>'sentry.admin'), function() {
		Route::controller('category', 'CategoryController', array(
			'getIndex'		=>	'admin.category.home',
			'getAdd'		=>	'admin.category.add.get',
			'postAdd'		=>	'admin.category.add.post',
			'getEdit'		=>	'admin.category.edit.get',
			'postEdit'		=>	'admin.category.edit.post',
			'postDelete'	=>	'admin.category.delete',
			'getResume'		=> 	'admin.category.resume.get',
			'getJob'		=> 	'admin.category.job.get'
		));
	});
});