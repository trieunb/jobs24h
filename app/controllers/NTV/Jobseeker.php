<?php 

/**
* 
*/

class JobSeeker extends Controller
{
	
	public function home()
	{
		return View::make('jobseekers.home');
	}
	public function editBasicHome(){
		return View::make('jobseekers.edit-basic-info')->with('user', $GLOBALS['user']);	
	}
	public function editBasic($action)
	{
		$params = Input::all();
		// Find the user using the user id
		$user = $GLOBALS['user'];
		if($action == 'basic-info'){
			$rules = array(
		       'gender' => 'required',
		       'first_name' => 'required',
		       'last_name' => 'required',
		       'vocational' => 'required',
		       'date_of_birth' => 'required',
		       'country_id' => 'required',
		       'marital_status' => 'required',
		    );
		    $messages = array(
				'gender.required'	=>	'Vui lòng chọn giới tính của bạn',
				'first_name.required'	=>	'Vui lòng điền Họ của bạn',
				'last_name.required'	=>	'Vui lòng điền Tên của bạn',
				'vocational.required'	=>	'Vui lòng điền thông tin nghề nghiệp của bạn',
				'date_of_birth.required'	=>	'Vui lòng chọn ngày sinh của bạn',
				'country_id.required'	=>	'Vui lòng chọn quốc tịch của bạn',
				'marital_status.required'	=>	'Vui lòng tình trạng hôn nhân của bạn',
			);
			$validator = Validator::make($params, $rules, $messages);
			if($validator->fails()){			
		        return Redirect::back()->withErrors($validator);
			}else{
				try
				{
					if($params['cv_upload'] != null){
						File::delete(Config::get('app.upload_path') . 'jobseekers/avatar/'.$GLOBALS['user']->avatar.'');
						$extension = $params['cv_upload']->getClientOriginalExtension();
						$name = Str::random(11) . '.' . $extension;
						$params['cv_upload']->move(Config::get('app.upload_path') . 'jobseekers/avatar/', $name);
					}else{
						$name = $user->avatar;
					}
				    
					// Update the user details
					$user->gender = $params['gender'];
				    $user->first_name = $params['first_name'];
				    $user->last_name = $params['last_name'];
				    $user->nghenghiep = $params['vocational'];
				    $user->date_of_birth = date('Y-m-d',strtotime($params['date_of_birth']));
				    $user->country_id = $params['country_id'];
				    $user->marital_status = $params['marital_status'];
				    $user->hobbies = $params['hobbies'];
				    $user->avatar = $name;
				    
				    // Update the user
				    if ($user->save())
				    {
				        return Redirect::back()->with('success', 'Thay đổi thông tin cá nhân thành công!');
				    }
				    else
				    {
				       return Redirect::back()->withInput->withErrors('Hiện giờ bạn không thể chỉnh sửa mục này');
				    }
				}
				catch (Cartalyst\Sentry\Users\UserExistsException $e)
				{
				    return Redirect::back()->withInput->withErrors($e);
				}
			}
		}
		if($action == 'change-pass'){
			$rules = array(
		       	'old-password' => 'required',
		       	'password'=>'required|min:4|confirmed|max:20',
				'password_confirmation'=>'required|min:4|max:20'
		    );
		    $messages = array(
				'old-password.required'	=>	'Vui lòng nhập mật khẩu hiện tại của bạn',
				'password.required'	=>	'Vui lòng nhập mật khẩu mới',
				'password_confirmation.required'	=>	'Vui lòng nhập xác nhận mật khẩu mới',
				'confirmed'	=>	'Mật khẩu không khớp',
				'min'	=>	'Mật khẩu tối thiểu .min ký tự',
				'max'	=>	'Mật khẩu tối đa .min ký tự',
			);
			$validator = Validator::make($params, $rules, $messages);
			if($validator->fails()){			
		        return Redirect::back()->withErrors($validator);
			}else{
				try
				{
					if($user->checkPassword($params['old-password'])){
						$user->password = $params['password'];
						if ($user->save())
					    {
					        return Redirect::back()->with('success', 'Thay đổi mật khẩu mới thành công!');
					    }
					    else
					    {
					       return Redirect::back()->withInput->withErrors('Hiện giờ bạn không thể thực hiện.');
					    }
					}else{
						return Redirect::back()->withErrors('Mật khẩu hiện tại của bạn không đúng, xin vui lòng thử lại.');		
					}
				}
				catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
				{
				    return Redirect::back()->withErrors('Không thể thay đổi mật khẩu lúc này');
				}
			}
		}
	}
	

	public function viewResume($id_cv){
		$my_resume = Resume::with(array('cvlanguage'=>function($q) {
			$q->with('lang')->with('lvlang');
		}))->with(array('location'=>function($p) {
			$p->with('province');
		}))->with(array('experience'=>function($e) {
			$e->with('fieldofwork')->with('chuyennganh')->with('capbac');
		}))->with(array('education'=>function($ed) {
			$ed->with('edu');
		}))->where('id', $id_cv)->first();
		//var_dump($my_resume->education); die();
		return View::make('jobseekers.resume')->with('user', $GLOBALS['user'])->with('id_cv', $id_cv)->with('my_resume', $my_resume);
	}

	// Edit CV
	public function editCvHome($id_cv){
		$my_resume = Resume::where('id', $id_cv)->first();
		return View::make('jobseekers.edit-cv')->with('user', $GLOBALS['user'])->with('id_cv', $id_cv)->with('my_resume', $my_resume);
	}
	public function saveInfo($action = false, $id_cv){
		if($action == 'basic'){
			return $this->editBasicInfo();
		}if($action == 'career-goal'){
			return $this->editCareerGoal($id_cv);
		}if($action == 'work-exp') {
			return $this->editWorkExperience($id_cv);
		}if($action == 'education-history') {
			return $this->editEducationHistory($id_cv);
		}if($action == 'skills') {
			return $this->editSkills($id_cv);
		}if($action == 'general'){
			return $this->editGeneralInfo($id_cv);
		}
	}

	// Edit & save basic information
	public function editBasicInfo(){
		
		$params = Input::all();
		$respond['has'] = false;
		if(Request::ajax()){
			$validator = new App\DTT\Forms\JobSeekersBasicInfo;
			if($validator->fails())
			{
				$respond['message'] = $validator->getMessageBag()->toJson();
				return Response::json($respond);
			} else {
				try
				{	
					Log::info($params); 
					if($params['date_of_birth']=='') $params['date_of_birth'] = null;
					$user = $GLOBALS['user'];
					$user->date_of_birth 	= date('Y-m-d',strtotime($params['date_of_birth']));
					$user->gender 			= $params['gender'];
					$user->marital_status 	= $params['marital_status'];
					$user->nationality_id 	= $params['nationality_id'];
					$user->address 			= $params['address'];
					$user->country_id 		= $params['country_id'];
					$user->province_id 		= $params['province_id'];
					$user->district_id 		= $params['district_id'];
					$user->phone_number 	= $params['phone_number'];
					$user->is_publish 		= $params['hide_info_with_ntd'];
					if ($user->save())
				    {
				    	$respond['has'] = true;
				        return Response::json($respond);
				    }
				    else
				    {
				       $respond['message']='Hiện tại bạn không thể chỉnh sửa mục này';
				    }
				}
				catch (Cartalyst\Sentry\Users\UserExistsException $e)
				{
				    $respond['message'] = "Không tìm thấy người dùng";
				}
			}
		} 
	}


	// Edit & save genneral information
	public function editGeneralInfo($id_cv) {
		$params = Input::all();
		$respond['has'] = false;
		if(Request::ajax()){
		
			$validator = new App\DTT\Forms\JobseekersGeneralInfo;
			if($validator->fails())
			{
				$respond['message'] = $validator->getMessageBag()->toJson();
				return Response::json($respond);
			} else {
				if(!isset($params['foreign_languages_2'])){$params['foreign_languages_2']=null;}
				if(!isset($params['foreign_languages_3'])){$params['foreign_languages_3']=null;}
				if(!isset($params['level_languages_2'])){$params['level_languages_2']=null;}
				if(!isset($params['level_languages_3'])){$params['level_languages_3']=null;}
				// Languages
				$chk = CVLanguage::where('rs_id',$id_cv)->get();
				if(count($chk) == 0){
					$lt = CVLanguage::insert(array(
						array('rs_id' => $id_cv,'lang_id' => $params['foreign_languages_1'],'level' => $params['level_languages_1'],'count_lang' => 1),
						array('rs_id' => $id_cv,'lang_id' => $params['foreign_languages_2'],'level' => $params['level_languages_2'],'count_lang' => 2),
						array('rs_id' => $id_cv,'lang_id' => $params['foreign_languages_3'],'level' => $params['level_languages_3'],'count_lang' => 3),
					));
				}else{
					for ($i=1; $i <= count($chk) ; $i++) { 
						$lt = CVLanguage::where('rs_id',$id_cv)->where('count_lang', $i)->update(array(
							'lang_id' => $params['foreign_languages_'.$i.''],'level' => $params['level_languages_'.$i.'']
						));
					}
				}

				// Categories
				$chk_cat = CVCategory::where('rs_id',$id_cv)->get();
				if(count($params['info_category']) < 2){
					$params['info_category'][1] = 0;	
				}
				if(count($params['info_category']) < 3){
					$params['info_category'][2] = 0;
				}
				if(count($chk_cat) == 0){
					$ct = CVCategory::insert(array(
						array('rs_id' => $id_cv,'cat_id' => $params['info_category'][0], 'count_cate' => 1),
						array('rs_id' => $id_cv,'cat_id' => $params['info_category'][1], 'count_cate' => 2),
						array('rs_id' => $id_cv,'cat_id' => $params['info_category'][2], 'count_cate' => 3),
					));
				}else{
					for ($i=0; $i < count($chk_cat) ; $i++) { 
						$update_ct = CVCategory::where('rs_id',$id_cv)->where('count_cate', $i+1)->update(array(
							'cat_id' => $params['info_category'][$i]
						));
					}
				}


				// Work Locations
				$chk_wl = WorkLocation::where('rs_id',$id_cv)->get();
				if(count($params['info_wish_place_work']) < 2){
					$params['info_wish_place_work'][1] = 0;	
				}
				if(count($params['info_wish_place_work']) < 3){
					$params['info_wish_place_work'][2] = 0;
				}
				if(count($chk_wl) == 0){
					$wl = WorkLocation::insert(array(
						array('rs_id' => $id_cv,'province_id' => $params['info_wish_place_work'][0], 'count_work_location' => 1),
						array('rs_id' => $id_cv,'province_id' => $params['info_wish_place_work'][1], 'count_work_location' => 2),
						array('rs_id' => $id_cv,'province_id' => $params['info_wish_place_work'][2], 'count_work_location' => 3),
					));
				}else{
					for ($j=0; $j < count($chk_wl) ; $j++) { 
						$update_wl = WorkLocation::where('rs_id',$id_cv)->where('count_work_location', $j+1)->update(array(
							'province_id' => $params['info_wish_place_work'][$j]
						));
					}
				}
				Log::info($params['specific_salary']);
				if($params['specific_salary'] == '') $params['specific_salary'] = 0;
				$rs = Resume::where('id',$id_cv)->where('ntv_id',$GLOBALS['user']->id)->update(array(
					'namkinhnghiem' 		=> $params['info_years_of_exp'],
					'bangcapcaonhat' 		=> $params['info_highest_degree'],
					'capbachientai' 		=> $params['info_current_level'],
					'vitrimongmuon' 		=> ''.$params['info_wish_position'].'',
					'capbacmongmuon' 		=> $params['info_wish_level'],
					'mucluong' 				=> $params['specific_salary'],
					'ctyganday' 			=> ''.$params['info_latest_company'].'',
					'cvganday' 				=> ''.$params['info_latest_job'].''
				));
				if ($rs)
				{
				    $respond['has'] = true;
				    return Response::json($respond);
				}
				else
				{
				    $respond['message']='Hiện tại bạn không thể chỉnh sửa mục này';
				}
			}
		}
	}

	// Edit & save career goal
	public function editCareerGoal($id_cv){
		$params = Input::all();
		$respond['has'] = false;
		if(Request::ajax()){
			$rules = array(
		       'introduct_yourself' => 'required',
		    );
		    $messages = array(
				'required'	=>	'Thông tin này bắt buộc',
			);
			$validator = Validator::make($params, $rules, $messages);
			if($validator->fails()){			
	        	$messages = $validator->messages();
	        	$respond['message'] = $validator->getMessageBag()->toJson();
				return Response::json($respond);
			}else{
				$update = Resume::where('id',$id_cv)->where('ntv_id',$GLOBALS['user']->id)->update(array('dinhhuongnn'=>''.$params['introduct_yourself'].''));
				if($update){
					$respond['has'] = true;
					return Response::json($respond);
				}else
				{
					$respond['message']='Hiện tại bạn không thể chỉnh sửa mục này';
				}
			}
		}
	}

	// Edit & save work experience
	public function editWorkExperience($id_cv){
		$params = Input::all();
		$respond['has'] = false;
		if(Request::ajax()){
			$validator = new App\DTT\Forms\JobSeekersWorkExp;
			if($validator->fails())
			{
				$respond['message'] = $validator->getMessageBag()->toJson();
				return Response::json($respond);
			} else {
				$sl = Experience::where('rs_id', $id_cv)->get();
				if(count($sl) == 0){
					$create = Experience::insert(array(
			    		'rs_id' => $id_cv, 
			    		'position' => ''.$params['position'].'', 
			    		'company_name' => ''.$params['company_name'].'', 
			    		'from_date'=> ''.$params['from_date'].'',
			    		'to_date'=> ''.$params['to_date'].'',
			    		'job_detail'=> ''.$params['job_detail'].'',
			    		'field'=> ''.$params['field'].'', 
			    		'specialized'=> ''.$params['specialized'].'',
			    		'level'=> ''.$params['level'].'',
						'salary'=> ''.$params['salary'].'',
					));
					if($create){
						$respond['has'] = true;
						return Response::json($respond);	
					}else{
						$respond['message']='Hiện tại bạn không thể chỉnh sửa mục này';
					}
				}else{
					$update = Experience::where('rs_id', $id_cv)->update(array(
						'position' => ''.$params['position'].'', 
			    		'company_name' => ''.$params['company_name'].'', 
			    		'from_date'=> ''.$params['from_date'].'',
			    		'to_date'=> ''.$params['to_date'].'',
			    		'job_detail'=> ''.$params['job_detail'].'',
			    		'field'=> ''.$params['field'].'', 
			    		'specialized'=> ''.$params['specialized'].'',
			    		'level'=> ''.$params['level'].'',
						'salary'=> ''.$params['salary'].'',
					));
					if($update){
						$respond['has'] = true;
						return Response::json($respond);
					}else{
						$respond['message']='Hiện tại bạn không thể chỉnh sửa mục này';
					}
				}
			}
		}
	}

	// Edit & save education history
	public function editEducationHistory($id_cv){
		$params = Input::all();
		$respond['has'] = false;
		if(Request::ajax()){

			$validator = new App\DTT\Forms\JobSeekersEducation;
			if($validator->fails())
			{
				$respond['message'] = $validator->getMessageBag()->toJson();
				return Response::json($respond);
			} else {
				$mte = MTEducation::where('rs_id', $id_cv)->get();
				if(count($mte) == 0){
					$create_mte = MTEducation::insert(array(
			    		'rs_id' => $id_cv, 
			    		'school' => ''.$params['school'].'', 
			    		'field_of_study' => $params['field_of_study'], 
			    		'level'=> $params['level'],
			    		'study_from'=> ''.$params['study_from'].'',
			    		'study_to'=> ''.$params['study_to'].'',
			    		'achievement'=> ''.$params['achievement'].'', 
			    		'specialized'=> ''.$params['specialized'].'',
			    		'average_grade_id'=> $params['average_grade_id'],
					));
					if($create_mte){
						$respond['has'] = true;
						return Response::json($respond);	
					}else{
						$respond['message']='Hiện tại bạn không thể chỉnh sửa mục này';
					}
				}else{
					$update_mte = MTEducation::where('rs_id', $id_cv)->update(array(
			    		'school' => ''.$params['school'].'', 
			    		'field_of_study' => $params['field_of_study'], 
			    		'level'=> $params['level'],
			    		'study_from'=> ''.$params['study_from'].'',
			    		'study_to'=> ''.$params['study_to'].'',
			    		'achievement'=> ''.$params['achievement'].'', 
			    		'specialized'=> ''.$params['specialized'].'',
			    		'average_grade_id'=> $params['average_grade_id'],
					));
					if($update_mte){
						$respond['has'] = true;
						return Response::json($respond);
					}else{
						$respond['message']='Hiện tại bạn không thể chỉnh sửa mục này';
					}
				}
			}
		}
	}

	//edit & save Skills
	public function editSkills($id_cv){
		$params = Input::all();
		if(Request::ajax()){
			$arr = array();
			$new_arr= array();
			foreach($params['skills'] as $value)
			{
				if(count($value) == 2){
					if($value[0] != '' && $value[1] != ''){
						$arr[] = $value;
					}
				}  
			}
			$up_skills = Resume::where('id',$id_cv)->where('ntv_id', $GLOBALS['user']->id)->update(array('kynang'=>''.json_encode($arr).''));
		}
	}


	// Hồ Sơ của tôi
	public function myResume(){
		$data = Input::all();
		if(Request::ajax())
	    {	
	    	if(isset($data['is_publish'])){
		    	$un_set_publish = Resume::where('ntv_id',$GLOBALS['user']->id)->update(array('is_public'=>0));
		    	if($un_set_publish){
		    		$set_publish = Resume::find($data['is_publish']);
					$set_publish->is_public = 1;
					$set_publish->save();
		    	}
	    	}elseif(isset($data['is_delete'])){
	    		$del = Resume::find($data['is_delete']);
				$del->delete();
				$education = MTEducation::where('rs_id',$data['is_delete'])->delete();
				$exp = Experience::where('rs_id',$data['is_delete'])->delete();
				$locations = WorkLocation::where('rs_id',$data['is_delete'])->delete();
				$lang = CVLanguage::where('rs_id',$data['is_delete'])->delete();
				$cate = CVCategory::where('rs_id',$data['is_delete'])->delete();
	    	}

	    }

		$my_resume = Resume::where('ntv_id', $GLOBALS['user']->id)->get();
		return View::make('jobseekers.my-resume')->with('my_resume', $my_resume)->with('user',$GLOBALS['user']);
	}
	public function createResume(){
		$rs = Resume::create(array('ntv_id'=>$GLOBALS['user']->id ));
		$id_cv = $rs->id;
		$education = MTEducation::create(array('rs_id' => $id_cv,));
		$work_exp = Experience::create(array('rs_id'=>$id_cv));
		$lang = CVLanguage::insert(array(
			array('rs_id' => $id_cv,'count_lang' => 1),
			array('rs_id' => $id_cv,'count_lang' => 2),
			array('rs_id' => $id_cv,'count_lang' => 3),
		));
		if($rs)
		{
			return Redirect::route('jobseekers.edit-cv', array($id_cv));
		}
	}
	public function myJob(){
		$my_job_list = MyJob::where('ntv_id',$GLOBALS['user']->id)->paginate(10);
		return View::make('jobseekers.my-job',compact('my_job_list'));
	}
	public function saveJob($job_id){
		$check = Job::find($job_id);
		if($check != null){
			$date = date('Y-m-d', time());
			$my_job = MyJob::firstOrCreate(array('ntv_id' => $GLOBALS['user']->id, 'job_id' => $job_id));
			$my_job->save_date = $date;
			$my_job->save();
			$my_job_list = MyJob::where('ntv_id',$GLOBALS['user']->id)->paginate(10);	
			return View::make('jobseekers.my-job',compact('my_job_list'));
		}else{
			return View::make('jobseekers.home');
		}	
	}
	public function savedJob(){
		$my_job_list = MyJob::where('ntv_id',$GLOBALS['user']->id)->paginate(10);
		return View::make('jobseekers.saved-job',compact('my_job_list'));	
	}

	public function appliedJob(){
		$my_job_list = MyJob::where('ntv_id',$GLOBALS['user']->id)->paginate(10);
		return View::make('jobseekers.applied-job',compact('my_job_list'));	
	}

	public function repondFromEmployment(){
		$my_job_list = MyJob::where('ntv_id',$GLOBALS['user']->id)->paginate(10);
		return View::make('jobseekers.respond-from-employment',compact('my_job_list'));
	}

	public function applyingJob($job_id){
		$job = Job::find($job_id);
		if($job != null){
			if ($GLOBALS['user'] != null) {
				$resumes = Resume::where('ntv_id', $GLOBALS['user']->id)->where('is_visible',1)->where('is_public',1)->lists('tieude_cv', 'id');
				return View::make('jobseekers.applying-job')->with('user', $GLOBALS['user'])->with('job', $job)->with('resumes',$resumes);	
			}else{
				return View::make('jobseekers.applying-job-not-login')->with('job', $job);
			}
		}else{
			return View::make('jobseekers.home');
		}
	}
	public function doApplyingJob($job_id){
		$params = Input::all();
			$cv = 0;
			if(isset($params['cv_id'])){
				$cv = $params['cv_id'];
			}
			$is_file = false;
			if(isset($params['is_file'])){
				$is_file =  true;
			}
			$prefix_title = '';
			if(isset($params['prefix_title'])){
				$prefix_title = $params['prefix_title'];
			}
			if ($is_file) {
				$rules = array(
		       		'headline' => 'required',
		       		//'file_name' => 'mimes:jpeg,png,gif,bmp|max:2000|required',
		    	);
			}else {
				$rules = array(
					'cv_id' => 'required',
		       		'headline' => 'required',
		    	);
			}
		    $messages = array(
				'required'	=>	'Thông này tin bắt buộc',
				'mimes' 	=>  'Vui lòng tải file đúng định dạng',
				'max'		=>  'File vượt quá dung lượng cho phép'
			);

			$validator = Validator::make($params, $rules, $messages);
			if($validator->fails()){			
	        	return Redirect::back()->withInput()->withErrors($validator);
			}else{
				if($GLOBALS['user']  != null){
					$check = Application::where('job_id', $job_id)->where('ntv_id', $GLOBALS['user']->id)->count();
				}else {$check = 0;}
				if($check == 0){
					$extension = $params['cv_upload']->getClientOriginalExtension();
					$name = Str::random(11) . '.' . $extension;
					$params['cv_upload']->move(Config::get('app.upload_path') . 'companies/images/', $name);
					$apply = Application::insert(array(
						'job_id' 		=> $job_id,
						'ntv_id' 		=> $GLOBALS['user']->id,
						'cv_id'  		=> $cv,
						'prefix_title' 	=> ''.$params['prefix_title'].'',
						'first_name' 	=> ''.$params['first_name'].'',
						'last_name' 	=> ''.$params['last_name'].'',
						'headline' 		=> ''.$params['headline'].'',
						'email' 		=> ''.$params['email'].'',
						'contact_phone' => ''.$params['contact_phone'].'',
						'address' 		=> ''.$params['address'].'',
						'province_id' 	=> $params['province_id'],
						'file_name'		=> ''.$name.'',
						'apply_date'	=> date('d-m-Y', time())
					));
					if($apply){
						return Redirect::back()->with('success','Bạn đã nộp đơn thành công. Chúc bạn may mắn');
					}else{
						return Redirect::back()->with('loi','Hiện tại bạn không thể nộp đơn cho công việc này');
					}
				}else{
					return Redirect::back()->with('loi','Bạn đã nộp đơn cho công việc này.');
				}
			}
	}

	// My Resume by upload file
	public function myResumeByUpload(){
		$my_resume = Resume::where('ntv_id', $GLOBALS['user']->id)->where('file_name','!=','')->first();
		return View::make('jobseekers.my-resume-by-upload')->with('my_resume', $my_resume)->with('user',$GLOBALS['user']);
	}
	public function uploadCV($action = false, $id_cv){
		if($action == 'download'){
			return $this->downloadCV($id_cv);
		}
		if($action == 'update'){
			return $this->updateUploadCV($id_cv);
		}
		if($action == 'delete'){
			return $this->deleteUploadCV($id_cv);
		}
	}
	public function downloadCV($id_cv){
		$cv = Resume::find($id_cv);
		$file= Config::get('app.upload_path') . 'jobseekers/cv/'.$cv->file_name.'';
		$name = explode('.', $cv->file_name);
		$name = $GLOBALS['user']->first_name.$GLOBALS['user']->last_name.'_'.date('m-d-Y',strtotime($cv->updated_at)).'.'.$name[1];
		$headers = array(
           'Content-Type: image/png',
           'Content-Type: image/jpeg',
           'Content-Type: image/gif',
           'Content-Type: application/vnd.ms-excel',
           'Content-Type: application/msword',
           'Content-Type: application/pdf',
           'Content-Type: application/x-rar-compressed',
           'Content-Type: application/zip',
           'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
           'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        );
	    return Response::download($file, $name, $headers);
	}
	public function updateUploadCV($id_cv){
		$params = Input::all();
		if(Request::ajax()){
			Log::info($params);
			$extension = $params['cv_upload']->getClientOriginalExtension();
			$name = Str::random(11) . '.' . $extension;
			$params['cv_upload']->move(Config::get('app.upload_path') . 'jobseekers/cv/', $name);
			
			$cv = Resume::find($id_cv);
			$cv->file_name = $name;
			if($cv->save()){
				return Redirect::back()->with('success','Tải hồ sơ mới thành công');	
			}else{
				return Redirect::back()->withErrors('Lỗi');
			}
		}
	}
	public function deleteUploadCV($id_cv){
		if(Request::ajax()){
		    $del = Resume::find($id_cv);
			$del->delete();
			$education = MTEducation::where('rs_id',$id_cv)->delete();
			$exp = Experience::where('rs_id',$id_cv)->delete();
			$locations = WorkLocation::where('rs_id',$id_cv)->delete();
			$lang = CVLanguage::where('rs_id',$id_cv)->delete();
			$cate = CVCategory::where('rs_id',$id_cv)->delete();
		}
	}
}