<?php 
Route::group(array('prefix'=>$locale), function() {
	Route::group(array('prefix'=>'employers', 'namespace'=>'NTD'), function() {
		Route::get('/', array('as'=>'employers.launching', 'uses'=>'HomeController@launching'));
		Route::group(array('before'=>'ntd.auth'), function() {
			Route::get('/dashboard', array('as'=>'employers.home', 'uses'=>'HomeController@home'));
			Route::controller('account', 'AccountController', array(

			));
			Route::controller('jobs', 'JobController', array(
				'getIndex'		=>	'employers.jobs.index',
				'getAdd'		=>	'employers.jobs.add',
				'getActive'	=>	'employers.jobs.active',
				'getExpiring'	=>	'employers.jobs.expiring',
				'getInActive'	=>	'employers.jobs.inactive',
				'getIsApply'	=>	'employers.jobs.isapply',
				'getExpired'	=>	'employers.jobs.expired',
				'postAction'	=>	'employers.jobs.action',
				'getEdit'		=>	'employers.jobs.edit',
				'postEdit'		=>	'employers.jobs.update',
				'getDelete'		=>	'employers.jobs.delete',
				'getSearch'		=>	'employers.jobs.search',
			));
			Route::controller('candidates', 'CandidateController', array(
				'getIndex'		=>	'employers.candidates.index',
				'getJob'		=>	'employers.candidates.job',
				'getReport'		=>	'employers.candidates.report',
				'getAlert'		=>	'employers.candidates.alert',
				'getRespond'	=>	'employers.candidates.respond',
				'getTest'		=>	'employers.candidates.test',
			));
		});

		Route::group(array('before'=>'ntd.guest'), function() {
			Route::controller('/', 'AuthController', array(
				'getLogin'		=>	'employers.login',
				'getRegister'	=>	'employers.register'
			));
		});
	});
});

 