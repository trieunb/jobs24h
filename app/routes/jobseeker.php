<?php 
Route::group(array('prefix'=>$locale), function() {
//	Route::group(array('prefix'=>'/'), function() {
		// Widget VIệc làm phù hơp
		if($GLOBALS['user'] != null){
			$suggested_jobs = Subscribe::where('ntv_id', $GLOBALS['user']->id)->get();
			if(count($suggested_jobs) > 0){
				foreach ($suggested_jobs as $key => $value) {
					$keyword[] = $value->keyword;
					$categories[] = json_decode($value->categories);
					$provinces[] = json_decode($value->provinces);
				}
				$jobs = Job::where('is_display', 1)->where('hannop', '>=', date('Y-m-d', time()))->where('status',1)->with('province')->with('category');

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
					$jobs_for_widget = Job::where('is_display', 1)->where('hannop', '>=', date('Y-m-d', time()))->where('status',1)->orderBy('updated_at', 'ASC')->take(10)->get();	
				}
			}else{
				$jobs_for_widget = Job::where('is_display', 1)->where('hannop', '>=', date('Y-m-d', time()))->where('status',1)->orderBy('updated_at', 'ASC')->take(10)->get();
			}
			
		}else{
			$jobs_for_widget = Job::where('is_display', 1)->where('hannop', '>=', date('Y-m-d', time()))->where('status',1)->orderBy('updated_at', 'ASC')->take(10)->get();
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
		Route::get('/dang-nhap', array('as'=>'jobseekers.login', 'uses'=>'JobSeekerAuth@login') );
		Route::post('/dang-nhap', 'JobSeekerAuth@doLogin' );
		Route::post('/login-ajax', 'JobSeekerAuth@loginAjax' );
		Route::get('/dang-xuat', array('as'=>'jobseekers.logout', 'uses'=>'JobSeekerAuth@logout') );
		Route::get('/dang-ky', array('as'=>'jobseekers.register', 'uses'=>'JobSeekerAuth@register') );
		Route::post('/dang-ky', 'JobSeekerAuth@doRegister' );
		 
		
		Route::get('/kich-hoat-tai-khoan',array('as'=>'account-active', function() {
			return View::make('jobseekers.account-active');
		}));
		Route::get('/quen-mat-khau',array('as'=>'forgot-password', function() {
			return View::make('jobseekers.forgot-password');
		}));
		Route::get('/kich-hoat-tai-khoan/{email}/{code}',array('as'=>'jobseekers.account-active', 'uses'=>'JobSeekerAuth@checkActive'));
		Route::post('/quen-mat-khau','JobSeekerAuth@doResetPass');
		Route::get('/quen-mat-khau/khoi-phuc-mat-khau/{email}/{code}',array('as'=>'jobseekers.reset-password', 'uses'=>'JobSeekerAuth@ChangePass'));
		Route::post('/quen-mat-khau/khoi-phuc-mat-khau/{email}/{code}',array('as'=>'jobseekers.reset-password', 'uses'=>'JobSeekerAuth@doChangePass'));
		Route::group(array('before'=>'sentry.ntv'), function() {
			Route::get('/chinh-sua-ho-so', array('as'=>'jobseekers.edit-cv', 'uses'=>'JobSeeker@myResume') );
			Route::post('/chinh-sua-ho-so/{action}/{id_cv}', array('as'=>'jobseekers.save-cv', 'uses'=>'JobSeeker@saveInfo'));
			Route::get('/chinh-sua-ho-so/{id_cv}', array('as'=>'jobseekers.edit-cv', 'uses'=>'JobSeeker@editCvHome'));
			Route::get('/ho-so-cua-toi', array('as'=>'jobseekers.my-resume', 'uses'=>'JobSeeker@myResume'));
			Route::post('/ho-so-cua-toi', array('as'=>'jobseekers.create-my-resume', 'uses'=>'JobSeeker@createResume'));
			Route::get('/ho-so-tai-len', array('as'=>'jobseekers.get-my-resume-by-upload', 'uses'=>'JobSeeker@myResumeByUpload'));
			Route::post('/ho-so-tai-len', array('as'=>'jobseekers.post-my-resume-by-upload', 'uses'=>'JobSeeker@createResumeByUpload'));
			Route::get('/muc-tieu-nghe-nghiep', 'JobSeeker@returnLogin');
			Route::get('/thong-tin-co-ban', array('as'=>'jobseekers.edit-basic-info', 'uses'=>'JobSeeker@editBasicHome') );
			Route::post('/thong-tin-co-ban/{action}', array('as'=>'edit-basic-info', 'uses'=>'JobSeeker@editBasic'));
			Route::get('/muc-tieu-nghe-nghiep/{id}', array('as'=>'jobseekers.edit-career-objectives', 'uses'=>'JobSeeker@editCareerObjectivesHome') );
			Route::post('/muc-tieu-nghe-nghiep/{id}', array('as'=>'edit-career-objectives', 'uses'=>'JobSeeker@editCareerObjectives'));
			Route::get('/viec-lam-cua-toi/{job_id}', array('as'=>'jobseekers.save-job','uses'=>'JobSeeker@saveJob'));
			Route::get('/viec-lam-cua-toi', array('as'=>'jobseekers.my-job','uses'=>'JobSeeker@myJob'));
			Route::post('/viec-lam-cua-toi', array('as'=>'jobseekers.post-del-my-job','uses'=>'JobSeeker@delMyJob'));
			Route::post('/save-note', array('as'=>'jobseekers.save-note','uses'=>'JobSeeker@saveNote'));
			Route::get('/viec-lam-da-luu', array('as'=>'jobseekers.saved-job','uses'=>'JobSeeker@savedJob'));
			Route::get('/viec-lam-da-nop', array('as'=>'jobseekers.applied-job','uses'=>'JobSeeker@appliedJob'));
			Route::post('/viec-lam-da-nop', array('as'=>'jobseekers.del-applied-job','uses'=>'JobSeeker@delAppliedJob'));
			Route::get('/phan-hoi-tu-nha-tuyen-dung', array('as'=>'jobseekers.respond-from-employment','uses'=>'JobSeeker@repondFromEmployment'));
			Route::post('/phan-hoi-tu-nha-tuyen-dung', array('as'=>'jobseekers.del-respond-from-employment','uses'=>'JobSeeker@delRepondFromEmployment'));
			Route::get('/ho-so-tai-len-cua-toi/{action}/{id_cv}', array('as'=>'jobseekers.action-cv','uses'=>'JobSeeker@actionCV'));
			Route::get('/ho-so-tai-len-cua-toi/{id_cv}', array('as'=>'jobseekers.get-update-upload-cv','uses'=>'JobSeeker@indexUpdateUploadCV'));
			Route::post('/ho-so-tai-len-cua-toi/{id_cv}', array('as'=>'jobseekers.post-update-upload-cv','uses'=>'JobSeeker@updateUploadCV'));
			Route::get('/thong-bao-viec-lam', array('as'=>'jobseekers.notification-jobs','uses'=>'JobSeeker@notificationJobs'));
			Route::get('/nha-tuyen-dung-xem-ho-so', array('as'=>'jobseekers.employer-view-resume','uses'=>'JobSeeker@employerViewResume'));
			Route::get('/tin-nhan', array('as'=>'jobseekers.messages','uses'=>'JobSeeker@messages'));
			Route::controller('notification-jobs', 'JobSeeker', array(
				'postUpdate' => 'jobseekers.post-update-notification-jobs',
				'postDelete' => 'jobseekers.post-del-notification-jobs',
			));
		});
		Route::get('/viec-lam/{slug}/{id}', array( 'as' =>	'jobseekers.job', 'uses' =>	'JobController@getIndex'));
		Route::post('/viec-lam/{slug}/{id}/{action}', array( 'as' =>'jobseekers.post-view-job', 'uses' =>'JobController@postIndex'));

		Route::get('/ho-so/{id_cv}', array('as'=>'jobseekers.view-resume', 'uses'=>'JobSeeker@viewResume'));
		Route::get('/nganh-nghe', array('as'=>'jobseekers.get-category', 'uses' =>'JobController@getCategory'));
		Route::get('q', array('as'=>'jobseekers.search-job','uses'=>'JobController@searchJob'));
		Route::get('/ung-tuyen/{action}/{job_id}', array('as'=>'jobseekers.applying-job','uses'=>'JobSeeker@applyingJob'));
		Route::post('/ung-tuyen/{action}/{job_id}', array('as'=>'jobseekers.applying-job','uses'=>'JobSeeker@doApplyingJob'));
		Route::get('/dang-ky-thong-bao-viec-lam', array('as'=>'jobseekers.register-job-alert', 'uses'=>'JobSeeker@regiterJobAlert'));
		Route::get('/danh-sach-nganh-nghe', array('as'=>'jobseekers.get-list-category', 'uses'=>'JobSeeker@getListCategory'));
		Route::get('/danh-sach-dia-diem', array('as'=>'jobseekers.get-list-province', 'uses'=>'JobSeeker@getListProvince'));
		Route::post('/thong-bao-viec-lam/', array('as'=>'jobseekers.post-notification-jobs','uses'=>'JobSeeker@creatNotificationJobs'));

		Route::get('/tin-tuc/{id}', array('as'=>'news.view', 'uses'=>'News@getIndex'));
		Route::get('/cong-ty/{id}', array('as'=>'company.view', 'uses'=>'JobSeeker@getInfoCompany'));
		//Sign in FB
		Route::get('/auth/facebook', array('as' => 'auth_fb','uses' => 'JobSeekerAuth@loginWithFacebook'));
		Route::get('/auth/google', array('as' => 'auth_google','uses' => 'JobSeekerAuth@loginWithGoogle'));
		Route::get('/auth/linkedin', array('as' => 'auth_in','uses' => 'JobSeekerAuth@loginWithLinkedin'));
		Route::get('/auth/yahoo', array('as' => 'auth_yahoo','uses' => 'JobSeekerAuth@loginWithYahoo'));
	//});
});



 