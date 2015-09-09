<?php 

Route::group(array('prefix'=>'admin'), function() {

	Route::group(array('before'=>'sentry.admin'), function() {
		Route::get('/', array('as'=>'admin.dashboard', 'uses'=>'AdminController@index'));
		Route::get('profile', array('as'=>'admin.profile', 'uses'=>'AdminController@profile'));
		Route::get('users/datatables', array('as'=>'users.datatables', 'uses'=>'UserController@datatables'));
		Route::resource('users', 'UserController');

		Route::get('jobseekers/datatables', array('as'=>'jobseekers.datatables', 'uses'=>'JobSeekerController@datatables'));
		Route::resource('jobseekers', 'JobSeekerController');
		
		Route::get('employers/report', array('as'=>'employers.report', 'uses'=>'EmployerController@report'));
		Route::get('employers/datatables', array('as'=>'employers.datatables', 'uses'=>'EmployerController@datatables'));
		Route::resource('employers', 'EmployerController');

		Route::get('jobs/datatables', array('as'=>'jobs.datatables', 'uses'=>'AJobController@datatables'));

		
		Route::resource('jobs', 'AJobController', [
		    'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
		]);
		Route::controller('jobs', 'AJobController', array(
			'getReport'	=>	'admin.jobs.report',
			'getWaiting'	=>	'admin.jobs.waiting',
			'getEditWaiting'	=>	'admin.jobs.editwaiting',
			'getVipWaiting'	=>	'admin.jobs.vipwaiting',
			'getVipExp'		=>	'admin.jobs.vipexp',
			'postAjax'		=>	'admin.jobs.ajax',
		));

		Route::get('resumes/creates/{id}', array('as'=>'resumes.creates', 'uses'=>'ResumeController@creates'));
		Route::get('resumes/{id}/download', array('as'=>'resumes.download', 'uses'=>'ResumeController@download'));
		Route::get('resumes/datatables', array('as'=>'resumes.datatables', 'uses'=>'ResumeController@datatables'));
		Route::post('resumes/search', array('as'=>'resumes.search', 'uses'=>'ResumeController@search'));
		
		
		Route::get('resumes/report', ['as'=>'admin.resumes.report', 'uses'=>'ResumeController@getReport']);
		Route::get('resumes/not-active', ['as'=>'admin.resumes.notactive', 'uses'=>'ResumeController@getNotActive']);
		Route::get('resumes/edit-active', ['as'=>'admin.resumes.editactive', 'uses'=>'ResumeController@getEditActive']);
		Route::resource('resumes', 'ResumeController', [
		    'only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']
		]);
		

		// ROUTE TIN TỨC
		Route::controller('news', 'NewsController', array(
			'getIndex' 	=> 	'news.index',
			'getAdd'	=>	'news.add',
			'postAdd'	=>	'news.post-add',
			'getEdit'	=>	'news.edit',
			'postEdit'	=>	'news.post-edit',
			'getDelete'	=>	'news.delete',
			'postDelete'	=>	'news.post-delete',
		));


		Route::controller('training','TrainController');
		Route::controller('thongke','ThongkeTrainingController');
		Route::controller('cungunglaodong','CungunglaodongController');

		Route::get('hiring/datatables', array('as'=>'admin.hiring.datatables', 'uses'=>'HiringController@datatables'));
		Route::post('hiring/ajax', array('as'=>'admin.hiring.ajax', 'uses'=>'HiringController@ajax'));
		Route::match(['POST', 'GET'], 'hiring/upload', array('as'=>'admin.hiring.upload', 'uses'=>'HiringController@upload'));
		Route::resource('hiring', 'HiringController');
		
		Route::get('logout', array('as'=>'admin.logout', 'uses'=>'AuthController@logout'));

		 
		Route::controller('order', 'OrdersController', array(
			'getIndex'	=>	'admin.order.index',
			'postSaveSearchService'=>'admin.order.saveSearchService',
			'getDeleteService' =>'admin.order.delete',
			'getUpdateService' =>'admin.order.update',
		));

		Route::controller('product', 'ProductServiceController', array(
			'getIndex'	=>	'admin.product.index',
			'getEdit'	=>	'admin.product.edit',
			 
		));


	});

	Route::group(array('before'=>'sentry.logged.admin'), function() {
		Route::get('login', 'AuthController@login');
		Route::post('login', 'AuthController@doLogin');
	});


});
