<?php 
Route::group(array('prefix'=>$locale), function() {
	Route::group(array('prefix'=>'jobseekers'), function() {
		// Widget VIệc làm phù hơp
		if($GLOBALS['user'] != null){
			$suggested_jobs = Subscribe::where('ntv_id', $GLOBALS['user']->id)->get();
			if(count($suggested_jobs) > 0){
				foreach ($suggested_jobs as $key => $value) {
					$keyword[] = $value->keyword;
					$categories[] = json_decode($value->categories);
					$provinces[] = json_decode($value->provinces);
				}
				$jobs = Job::where('is_display', 1)->where('hannop', '>=', date('Y-m-d', time()))->with('province')->with('category');

				if(count($keyword) > 0){
					foreach($keyword as $kw){
						$jobs->where('vitri', 'LIKE', "%".$kw."%");
					}	
				}
				if(count($provinces) > 0)
				{
					foreach($provinces as $province){
						$jobs->whereHas('province', function($query) use($province) {
							$query->whereIn('province_id', $province);
						});
					}
				}else {
						$jobs->with(array('province'	=>	function($query) {
							$query->with('province');
						}));
				}
				if(count($categories) > 0 )
				{
					foreach($categories as $cate){
						$jobs->whereHas('category', function($query) use($cate)  {
							$query->whereIn('cat_id', $cate);
						});
					}
				}else {
					$jobs->with(array('category'=>function($query) {
						$query->with('category');
					}));
				}
				$jobs_for_widget = $jobs->orderBy('updated_at', 'ASC')->take(3)->get();
				if(count($jobs_for_widget) == 0){
					$jobs_for_widget = Job::where('is_display', 1)->where('hannop', '>=', date('Y-m-d', time()))->orderBy('updated_at', 'ASC')->take(3)->get();	
				}
			}else{
				$jobs_for_widget = Job::where('is_display', 1)->where('hannop', '>=', date('Y-m-d', time()))->orderBy('updated_at', 'ASC')->take(3)->get();
			}
			
		}else{
			$jobs_for_widget = Job::where('is_display', 1)->where('hannop', '>=', date('Y-m-d', time()))->orderBy('updated_at', 'ASC')->take(3)->get();
		}


		// Widget Ngành nghề hấp dẫn
		$widget_categories_hot = Category::whereHas('mtcategory', function($q) {
			$q->whereHas('job', function ($q1) {
				$q1->where('is_display', 1)->where('hannop', '>=' , date('Y-m-d'));
			});
		})->where('parent_id', '!=', 0)->with('mtcategory')->get()->sortBy(function($widget_categories_hot) {
		    return $widget_categories_hot->mtcategory->count();
		})->reverse();


		// Widget tìm công việc theo cấp bậc
		$all_level = Level::all();


		// Widget Địa điểm hấp dẫn
		$widget_province_hot = Province::whereHas('mtprovince', function($q) {
			$q->whereHas('job', function ($q1) {
				$q1->where('is_display', 1)->where('hannop', '>=' , date('Y-m-d'));
			});
		})->with('mtprovince')->get()->sortBy(function($widget_province_hot) {
		    return $widget_province_hot->mtprovince->count();
		})->reverse();


		View::share('jobs_for_widget', $jobs_for_widget);
		View::share('widget_categories_hot', $widget_categories_hot);
		View::share('widget_province_hot', $widget_province_hot);
		View::share('all_level', $all_level);



		Route::get('/', array('as'=>'jobseekers.home', 'uses'=>'JobSeeker@home'));
		Route::get('/login', array('as'=>'jobseekers.login', 'uses'=>'JobSeekerAuth@login') );
		Route::post('/login', 'JobSeekerAuth@doLogin' );
		Route::get('/logout', array('as'=>'jobseekers.logout', 'uses'=>'JobSeekerAuth@logout') );
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
			Route::get('/edit-cv', array('as'=>'jobseekers.edit-cv', 'uses'=>'JobSeeker@myResume') );
			Route::post('/edit-cv/{action}/{id_cv}', array('as'=>'jobseekers.save-cv', 'uses'=>'JobSeeker@saveInfo'));
			Route::get('/edit-cv/{id_cv}', array('as'=>'jobseekers.edit-cv', 'uses'=>'JobSeeker@editCvHome'));
			Route::get('/my-resume', array('as'=>'jobseekers.my-resume', 'uses'=>'JobSeeker@myResume'));
			Route::post('/my-resume', array('as'=>'jobseekers.create-my-resume', 'uses'=>'JobSeeker@createResume'));
			Route::get('/my-resume-by-upload', array('as'=>'jobseekers.get-my-resume-by-upload', 'uses'=>'JobSeeker@myResumeByUpload'));
			Route::post('/my-resume-by-upload', array('as'=>'jobseekers.post-my-resume-by-upload', 'uses'=>'JobSeeker@createResumeByUpload'));
			Route::get('/edit-career-objectives', 'JobSeeker@returnLogin');
			Route::get('/edit-basic-info', array('as'=>'jobseekers.edit-basic-info', 'uses'=>'JobSeeker@editBasicHome') );
			Route::post('/edit-basic-info/{action}', array('as'=>'edit-basic-info', 'uses'=>'JobSeeker@editBasic'));
			Route::get('/edit-career-objectives/{id}', array('as'=>'jobseekers.edit-career-objectives', 'uses'=>'JobSeeker@editCareerObjectivesHome') );
			Route::post('/edit-career-objectives/{id}', array('as'=>'edit-career-objectives', 'uses'=>'JobSeeker@editCareerObjectives'));
			Route::get('/my-job/{job_id}', array('as'=>'jobseekers.save-job','uses'=>'JobSeeker@saveJob'));
			Route::get('/my-job', array('as'=>'jobseekers.my-job','uses'=>'JobSeeker@myJob'));
			Route::post('/my-job', array('as'=>'jobseekers.post-del-my-job','uses'=>'JobSeeker@delMyJob'));
			Route::post('/save-note', array('as'=>'jobseekers.save-note','uses'=>'JobSeeker@saveNote'));
			Route::get('/saved-job', array('as'=>'jobseekers.saved-job','uses'=>'JobSeeker@savedJob'));
			Route::get('/applied-job', array('as'=>'jobseekers.applied-job','uses'=>'JobSeeker@appliedJob'));
			Route::post('/applied-job', array('as'=>'jobseekers.del-applied-job','uses'=>'JobSeeker@delAppliedJob'));
			Route::get('/respond-from-employment', array('as'=>'jobseekers.respond-from-employment','uses'=>'JobSeeker@repondFromEmployment'));
			Route::post('/respond-from-employment', array('as'=>'jobseekers.del-respond-from-employment','uses'=>'JobSeeker@delRepondFromEmployment'));
			Route::get('/my-resume-by-upload/{action}/{id_cv}', array('as'=>'jobseekers.action-cv','uses'=>'JobSeeker@actionCV'));
			Route::post('/my-resume-by-upload/{id_cv}', array('as'=>'jobseekers.update-upload-cv','uses'=>'JobSeeker@updateUploadCV'));
			Route::get('/notification-jobs', array('as'=>'jobseekers.notification-jobs','uses'=>'JobSeeker@notificationJobs'));
			Route::post('/notification-jobs/', array('as'=>'jobseekers.post-notification-jobs','uses'=>'JobSeeker@creatNotificationJobs'));
			Route::get('/employer-view-resume', array('as'=>'jobseekers.employer-view-resume','uses'=>'JobSeeker@employerViewResume'));
			Route::get('/message', array('as'=>'jobseekers.messages','uses'=>'JobSeeker@messages'));
			Route::controller('notification-jobs', 'JobSeeker', array(
				'postUpdate' => 'jobseekers.post-update-notification-jobs',
				'postDelete' => 'jobseekers.post-del-notification-jobs',
			));
			
		});
		Route::get('/view/{slug}/{id}', array( 'as' =>	'jobseekers.job', 'uses' =>	'JobController@getIndex'));
		Route::post('/view/{slug}/{id}/{action}', array( 'as' =>'jobseekers.post-view-job', 'uses' =>'JobController@postIndex'));

		Route::get('/resume/{id_cv}', array('as'=>'jobseekers.view-resume', 'uses'=>'JobSeeker@viewResume'));
		Route::get('/category', array('as'=>'jobseekers.get-category', 'uses' =>'JobController@getCategory'));
		Route::get('q', array('as'=>'jobseekers.search-job','uses'=>'JobController@searchJob'));
		Route::get('/applying-job/{job_id}', array('as'=>'jobseekers.applying-job','uses'=>'JobSeeker@applyingJob'));
		Route::post('/applying-job/{job_id}', array('as'=>'jobseekers.applying-job','uses'=>'JobSeeker@doApplyingJob'));
		Route::get('/register-job-alert', array('as'=>'jobseekers.register-job-alert', 'uses'=>'JobSeeker@regiterJobAlert'));
		Route::get('/categories', array('as'=>'jobseekers.get-list-category', 'uses'=>'JobSeeker@getListCategory'));
		Route::get('/provinces', array('as'=>'jobseekers.get-list-province', 'uses'=>'JobSeeker@getListProvince'));

		Route::get('/news/{id}', array('as'=>'news.view', 'uses'=>'News@getIndex'));
	});
});



 