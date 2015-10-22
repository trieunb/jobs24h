<?php 

Route::group(array('prefix'=>'admin'), function() {

	Route::group(array('before'=>'sentry.admin'), function() {
		Route::get('/', array('as'=>'admin.dashboard', 'uses'=>'AdminController@index'));
		Route::get('profile', array('as'=>'admin.profile', 'uses'=>'AdminController@profile'));
		Route::get('users/datatables', array('as'=>'users.datatables', 'uses'=>'UserController@datatables'));
		
		//quản lý thêm xóa sửa admin
		Route::group(array('before'=>'sentry.permissions.admin_full'), function() {
			Route::controller('order', 'OrdersController', array(
			'getPackageEmployer'=>'admin.order.packageemployer',
			'getPackage'	=>	'admin.order.package',
			'postSaveSearchService'=>'admin.order.saveSearchService',
			'getDeleteService' =>'admin.order.delete',
			'getUpdateService' =>'admin.order.update',
			'getDeleteServiceJob'=>'admin.order.delete_services',
		));
		Route::controller('option','OptionController',array(
		'getIndex'=>	'admin.option.index',
		'postAjax' =>	'admin.option.ajax',
		));
		 
		Route::controller('product', 'ProductServiceController', array(
			'getIndex'	=>	'admin.product.index',
			'getEdit'	=>	'admin.product.edit',
			 
		));
			Route::resource('users', 'UserController');
		});


		Route::get('jobseekers/datatables', array('as'=>'jobseekers.datatables', 'uses'=>'JobSeekerController@datatables'));
		// quản lý người tìm việc và hồ sơ
		Route::group(array('before'=>'sentry.permissions.ntv_full'), function() {
			Route::post('resumes/search', array('as'=>'resumes.search', 'uses'=>'ResumeController@search'));
		Route::get('resumes/uploadcv/{action}/{id}', ['as' => 'admin.resumes.uploadcv', 'uses' => 'ResumeController@actionUploadCV']);
		Route::post('resumes/uploadcv/edit/{id}', ['as' => 'admin.resumes.edit.uploadcv', 'uses' => 'ResumeController@uploadCV']);
		Route::get('resumes/datatables', array('as'=>'resumes.datatables', 'uses'=>'ResumeController@datatables'));
		Route::controller('resumes', 'ResumeController', array(
			'getIndex' 		=> 'admin.resumes.index',
			'getEdit' 		=> 'admin.resumes.edit1',
			'postEdit' 		=> 'admin.resumes.post-edit',
			'postActive' 		=> 'admin.resumes.post-active',
			'postDelete' 		=> 'admin.resumes.post-delete',
			'getNotActive' 		=> 'admin.resumes.not-active',
			'getNotActiveDatatables' => 'resumes.datatables.not-active',
			'getListCvByNtvDatatables'	=> 'resumes.datatables-list-cv-by-ntv',
			'getListCvByNtv'		=> 'admin.resumes.list-cv-by-ntv',
		));
		Route::controller('jobseekers', 'JobSeekerController', array(
			'getIndex' 		=> 'admin.jobseekers.index',
			'postDelete'		=> 'admin.jobseekers.delete',
			'getAnalytics'	=>	'admin.jobseekers.analytics',
			'getEdit'		=>	'admin.jobseekers.edit1',
			'postEdit'		=>	'admin.jobseekers.post-edit',
			'getNotLogin'	=> 'admin.jobseekers.not-login',
			'getDatatablesnotlogin' => 'jobseekers.not-login.datatables',
			'postDeleteNTVNotLogin' => 'admin.jobseekers.delete-ntv-not-login',
			'getListJobApplied'		=> 'admin.jobseekers.list-job-applied',
			'getListJobAppliedDatatables'		=> 'admin.jobseekers.list-job-applied-datatables',
		));

		});
	
		//quản lý nhà tuyển dụng và tin tuyển dụng
		Route::get('jobs/datatables', array('as'=>'jobs.datatables', 'uses'=>'AJobController@datatables'));
		Route::get('jobs/datatables_waiting', array('as'=>'admin.jobs.datatables_waiting', 'uses'=>'AJobController@datatables_waiting'));
		Route::get('jobs/datatables_waiting_vip', array('as'=>'admin.jobs.datatables_waiting_vip', 'uses'=>'AJobController@datatables_waiting_vip'));
		Route::get('jobs/datatables_cvapp', array('as'=>'admin.jobs.datatables_cvapp', 'uses'=>'AJobController@datatables_cvapp'));
		
		Route::group(array('before'=>'sentry.permissions.ntd_full'), function() {
			Route::get('employers/report', array('as'=>'admin.employers.report', 'uses'=>'EmployerController@report'));
			Route::get('employers/datatables', array('as'=>'employers.datatables', 'uses'=>'EmployerController@datatables'));
			Route::get('employers/datatablesvip', array('as'=>'employers.datatablesvip', 'uses'=>'EmployerController@datatables_vip'));
			Route::resource('employers', 'EmployerController');
			Route::controller('employers','EmployerController',array(
				'getEditEmployers' =>'admin.employers.edit1',
				
				));
		
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
			'getDelete'	=>		'admin.jobs.delete',
			'getJobApp'	=>'admin.jobs.cvapp',
			'getDeleteApp' =>'admin.jobs.deleteapp',
			'postSendMail' =>'admin.jobs.sendmail',
		));
	});

		
		
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
		
		Route::group(array('before'=>'sentry.permissions.news_full'), function() {
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
		});
		Route::group(array('before'=>'sentry.permissions.train_full'), function() {
			Route::controller('training','TrainController');
		Route::controller('thongke','ThongkeTrainingController');
		});

		Route::group(array('before'=>'sentry.permissions.culd_full'), function() {
			Route::controller('cungunglaodong','CungunglaodongController');
		});

		Route::get('hiring/datatables', array('as'=>'admin.hiring.datatables', 'uses'=>'HiringController@datatables'));
			Route::group(array('before'=>'sentry.permissions.hiring_full'), function() {
			Route::post('hiring/ajax', array('as'=>'admin.hiring.ajax', 'uses'=>'HiringController@ajax'));
			Route::match(['POST', 'GET'], 'hiring/upload', array('as'=>'admin.hiring.upload', 'uses'=>'HiringController@upload'));
			Route::resource('hiring', 'HiringController');
		});
		Route::get('logout', array('as'=>'admin.logout', 'uses'=>'AuthController@logout'));

		 
		


	});

	Route::group(array('before'=>'sentry.logged.admin'), function() {
		Route::get('login', 'AuthController@login');
		Route::post('login', 'AuthController@doLogin');
	});


});
