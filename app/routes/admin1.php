<?php 

Route::group(array('prefix'=>'admin'), function() {

	Route::group(array('before'=>'sentry.admin'), function() {
		Route::get('/', array('as'=>'admin.dashboard', 'uses'=>'AdminController@index'));
		Route::get('profile', array('as'=>'admin.profile', 'uses'=>'AdminController@profile'));
		Route::get('users/datatables', array('as'=>'users.datatables', 'uses'=>'UserController@datatables'));
		Route::resource('users', 'UserController');

		Route::get('jobseekers/datatables', array('as'=>'jobseekers.datatables', 'uses'=>'JobSeekerController@datatables'));

		Route::controller('jobseekers', 'JobSeekerController', array(
			'getIndex' 		=> 'admin.jobseekers.index',
			'postDelete'		=> 'admin.jobseekers.delete',
			'getAnalytics'	=>	'admin.jobseekers.analytics',
			'getEdit'		=>	'admin.jobseekers.edit1',
			'postEdit'		=>	'admin.jobseekers.post-edit',
			'getNotLogin'	=> 'admin.jobseekers.not-login',
			'getDatatablesnotlogin' => 'jobseekers.not-login.datatables',
			'postDeleteNTVNotLogin' => 'admin.jobseekers.delete-ntv-not-login',
		));


		
		Route::get('employers/report', array('as'=>'employers.report', 'uses'=>'EmployerController@report'));
		Route::get('employers/datatables', array('as'=>'employers.datatables', 'uses'=>'EmployerController@datatables'));
		Route::get('employers/datatablesvip', array('as'=>'employers.datatablesvip', 'uses'=>'EmployerController@datatables_vip'));
		Route::resource('employers', 'EmployerController');
		Route::controller('employers','EmployerController',array(
			'getEditEmployers' =>'admin.employers.edit1'
			
			));
		Route::get('jobs/datatables', array('as'=>'jobs.datatables', 'uses'=>'AJobController@datatables'));

		
		Route::resource('jobs', 'AJobController', [
		    'only' => ['index', 'create', 'store','edit', 'update', 'destroy']
		]);
		Route::controller('jobs', 'AJobController', array(
			'getReport'	=>	'admin.jobs.report',
			'getWaiting'	=>	'admin.jobs.waiting',
			'getEditWaiting'	=>	'admin.jobs.editwaiting',
			'getVipWaiting'	=>	'admin.jobs.vipwaiting',
			'getVipExp'		=>	'admin.jobs.vipexp',
			'postAjax'		=>	'admin.jobs.ajax',
			'getEdit1'		=> 'admin.jobs.edit1',
			'postEdit1'	=>		'admin.jobs.update1',	
		));


		Route::get('resumes/datatables', array('as'=>'resumes.datatables', 'uses'=>'ResumeController@datatables'));

		Route::controller('resumes', 'ResumeController', array(
			'getIndex' 		=> 'admin.resumes.index',
			'getEdit' 		=> 'admin.resumes.edit1',
			'postEdit' 		=> 'admin.resumes.post-edit',
			'postActive' 		=> 'admin.resumes.post-active',
			'postDelete' 		=> 'admin.resumes.post-delete',
			'getNotActive' 		=> 'admin.resumes.not-active',
			'getNotActiveDatatables' => 'resumes.datatables.not-active'
		));
		Route::post('resumes/search', array('as'=>'resumes.search', 'uses'=>'ResumeController@search'));
		Route::get('resumes/uploadcv/{action}/{id}', ['as' => 'admin.resumes.uploadcv', 'uses' => 'ResumeController@actionUploadCV']);
		Route::post('resumes/uploadcv/edit/{id}', ['as' => 'admin.resumes.edit.uploadcv', 'uses' => 'ResumeController@uploadCV']);
		/*Route::get('resumes/creates/{id}', array('as'=>'resumes.creates', 'uses'=>'ResumeController@creates'));
		Route::get('resumes/{id}/download', array('as'=>'resumes.download', 'uses'=>'ResumeController@download'));
		
		Route::post('resumes/search', array('as'=>'resumes.search', 'uses'=>'ResumeController@search'));
		Route::get('resumes/uploadcv/{action}/{id}', ['as' => 'admin.resumes.uploadcv', 'uses' => 'ResumeController@actionUploadCV']);
		Route::post('resumes/uploadcv/edit/{id}', ['as' => 'admin.resumes.edit.uploadcv', 'uses' => 'ResumeController@uploadCV']);
		
		Route::get('resumes/report', ['as'=>'admin.resumes.report', 'uses'=>'ResumeController@getReport']);
		Route::get('resumes/not-active', ['as'=>'admin.resumes.notactive', 'uses'=>'ResumeController@getNotActive']);
		Route::get('resumes/edit-active', ['as'=>'admin.resumes.editactive', 'uses'=>'ResumeController@getEditActive']);
		Route::resource('resumes', 'ResumeController', [
		    'only' => ['show', 'create', 'store', 'edit', 'update', 'destroy']
		]);
		*/
	

	

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
