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
			Route::get('/resume/{id_cv}', array('as'=>'jobseekers.view-resume', 'uses'=>'JobSeeker@viewResume'));
			Route::get('/my-resume', array('as'=>'jobseekers.my-resume', 'uses'=>'JobSeeker@myResume'));
			Route::post('/my-resume', array('as'=>'jobseekers.my-resume', 'uses'=>'JobSeeker@createResume'));
			Route::get('/my-resume-by-upload', array('as'=>'jobseekers.get-my-resume-by-upload', 'uses'=>'JobSeeker@myResumeByUpload'));
			Route::post('/my-resume-by-upload', array('as'=>'jobseekers.post-my-resume-by-upload', 'uses'=>'JobSeeker@createResumeByUpload'));
			Route::get('/edit-career-objectives', 'JobSeeker@returnLogin');
			Route::get('/edit-basic-info', array('as'=>'jobseekers.edit-basic-info', 'uses'=>'JobSeeker@editBasicHome') );
			Route::post('/edit-basic-info/{action}', array('as'=>'edit-basic-info', 'uses'=>'JobSeeker@editBasic'));
			Route::get('/edit-career-objectives/{id}', array('as'=>'jobseekers.edit-career-objectives', 'uses'=>'JobSeeker@editCareerObjectivesHome') );
			Route::post('/edit-career-objectives/{id}', array('as'=>'edit-career-objectives', 'uses'=>'JobSeeker@editCareerObjectives'));
			Route::get('/my-job/{job_id}', array('as'=>'jobseekers.save-job','uses'=>'JobSeeker@saveJob'));
			Route::get('/my-job', array('as'=>'jobseekers.my-job','uses'=>'JobSeeker@myJob'));
			Route::get('/saved-job', array('as'=>'jobseekers.saved-job','uses'=>'JobSeeker@savedJob'));
			Route::post('/saved-job', array('as'=>'jobseekers.post-del-my-job','uses'=>'JobSeeker@delMyJob'));
			Route::get('/applied-job', array('as'=>'jobseekers.applied-job','uses'=>'JobSeeker@appliedJob'));
			Route::get('/respond-from-employment', array('as'=>'jobseekers.respond-from-employment','uses'=>'JobSeeker@repondFromEmployment'));
			Route::get('/my-resume-by-upload/{action}/{id_cv}', array('as'=>'jobseekers.action-cv','uses'=>'JobSeeker@actionCV'));
			Route::post('/my-resume-by-upload/{id_cv}', array('as'=>'jobseekers.update-upload-cv','uses'=>'JobSeeker@updateUploadCV'));
			Route::get('/notification-jobs', array('as'=>'jobseekers.notification-jobs','uses'=>'JobSeeker@notificationJobs'));
			Route::post('/notification-jobs/', array('as'=>'jobseekers.post-notification-jobs','uses'=>'JobSeeker@creatNotificationJobs'));
			Route::controller('notification-jobs', 'JobSeeker', array(
				'postUpdate' => 'jobseekers.post-update-notification-jobs',
				'postDelete' => 'jobseekers.post-del-notification-jobs',
			));
			
		});
		Route::controller('/view/{slug}/{id}', 'JobController', array(
			'getIndex'	=>	'jobseekers.job',
		));
		Route::get('q', array('as'=>'jobseekers.search-job','uses'=>'JobController@searchJob'));
		Route::get('/applying-job/{job_id}', array('as'=>'jobseekers.applying-job','uses'=>'JobSeeker@applyingJob'));
		Route::post('/applying-job/{job_id}', array('as'=>'jobseekers.applying-job','uses'=>'JobSeeker@doApplyingJob'));
	});
});



 