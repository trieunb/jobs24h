<?php 
Route::group(array('prefix'=>$locale), function() {
	Route::group(array('prefix'=>'jobseekers'), function() {
		Route::get('/', array('as'=>'jobseekers.home', 'uses'=>'JobSeeker@home'));
		Route::get('/login', array('as'=>'jobseekers.login', 'uses'=>'JobSeekerAuth@login') );
		Route::post('/login', 'JobSeekerAuth@doLogin' );
		Route::get('/register', array('as'=>'jobseekers.register', 'uses'=>'JobSeekerAuth@register') );
		Route::post('/register', 'JobSeekerAuth@doRegister' );
		Route::get('/account-active',array('as'=>'account-active', function() {
			return View::make('jobseekers.account-active');
		}));
		Route::get('/forgot-password',array('as'=>'forgot-password', function() {
			return View::make('jobseekers.forgot-password');
		}));
		Route::get('/account-active/{email}/{code}',array('as'=>'jobseekers.account-active', 'uses'=>'JobSeekerAuth@checkActive'));
		Route::post('/forgot-password','JobSeekerAuth@doResetPass');
		Route::get('/forgot-password/reset-password/{email}/{code}',array('as'=>'jobseekers.reset-password', 'uses'=>'JobSeekerAuth@ChangePass'));
		Route::post('/forgot-password/reset-password/{email}/{code}',array('as'=>'jobseekers.reset-password', 'uses'=>'JobSeekerAuth@doChangePass'));
		Route::group(array('before'=>'sentry.ntv'), function() {
			Route::get('/edit-cv', array('as'=>'jobseekers.edit-cv', 'uses'=>'JobSeeker@editCvHome') );
			Route::post('/edit-cv/{action}/{id_cv}', array('as'=>'jobseekers.save-cv', 'uses'=>'JobSeeker@saveInfo'));
			Route::get('/edit-cv/{id_cv}', array('as'=>'jobseekers.edit-cv', 'uses'=>'JobSeeker@editCvHome'));
			Route::get('/my-resume', array('as'=>'jobseekers.my-resume', 'uses'=>'JobSeeker@myResume'));
			Route::post('/my-resume', array('as'=>'jobseekers.my-resume', 'uses'=>'JobSeeker@createResume'));
			Route::get('/edit-career-objectives', 'JobSeeker@returnLogin');
			Route::get('/edit-basic-info', array('as'=>'jobseekers.edit-basic-info', 'uses'=>'JobSeeker@editBasicHome') );
			Route::post('/edit-basic-info', array('as'=>'edit-basic-info', 'uses'=>'JobSeeker@editBasic'));
			Route::get('/edit-career-objectives/{id}', array('as'=>'jobseekers.edit-career-objectives', 'uses'=>'JobSeeker@editCareerObjectivesHome') );
			Route::post('/edit-career-objectives/{id}', array('as'=>'edit-career-objectives', 'uses'=>'JobSeeker@editCareerObjectives'));
		});
		Route::controller('/view/{slug}/{id}', 'JobController', array(
			'getIndex'	=>	'jobseekers.job',
		));
	});
});



 