<?php 

/**
* 
*/

class JobSeeker extends Controller
{
	public function __construct(){
		

	}
	public function home()
	{
		$categories_default = Category::where('parent_id', '!=', 0)
		->whereHas('mtcategory', function($q) {
			$q->whereHas('job', function ($q1) {
				$q1->where('is_display', 1)->where('hannop', '>=' , date('Y-m-d'));
			});
		})->with('mtcategory')->get();
		$categories_alpha = Category::where('parent_id', '!=', 0)->whereHas('mtcategory', function($q) {
			$q->whereHas('job', function ($q1) {
				$q1->where('is_display', 1)->where('hannop', '>=' , date('Y-m-d'));
			});
		})->orderBy('cat_name', 'ASC')->with('mtcategory')->get();	

		$categories_hot = Category::where('parent_id', '!=', 0)->with('mtcategory')->whereHas('mtcategory', function($q) {
			$q->whereHas('job', function ($q1) {
				$q1->where('is_display', 1)->where('hannop', '>=' , date('Y-m-d'));
			});
		})->with('mtcategory')->get()->sortBy(function($categories_hot) {
		    return $categories_hot->mtcategory->count();
		})->reverse();

		$emp_hot = NTD::with('job')->get()->sortBy(function($emp_hot) {
		    return $emp_hot->job->count();
		})->reverse()->take(18);

		$jobs = Job::with(array('ntd'=>function($q) {
			$q->with('company');
		}))
		->with(array('category'=>function($q) {
			$q->with('category');
		}))
		->with(array('province'=>function($q) {
			$q->with('province');
		}))->where('is_display', 1)->where('hannop', '>=', date('Y-m-d', time()))->take(45)->get();


		$news = TrainingPost::where('training_cat_id', 9)->with('trainingCat')->take(8)->get();
		$camnang_ntv = TrainingPost::where('training_cat_id', 10)->with('trainingCat')->take(4)->get();
		$camnang_ntd = TrainingPost::where('training_cat_id', 11)->with('trainingCat')->take(4)->get();
		return View::make('jobseekers.home', compact('jobs', 'categories_default', 'categories_alpha', 'categories_hot','emp_hot', 'news','camnang_ntv','camnang_ntd'));
	}

	public function editBasicHome(){
		$title = 'Chỉnh sửa thông tin tài khoản';
		return View::make('jobseekers.edit-basic-info')->with('user', $GLOBALS['user'])->with('title',$title);	
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
		       'phone_number' => 'required',
		       'date_of_birth' => 'required',
		       'cv_upload' => 'mimes:png,jpeg|max:2000',
		    );
		    $messages = array(
				'gender.required'	=>	'Vui lòng chọn giới tính của bạn',
				'first_name.required'	=>	'Vui lòng điền Họ của bạn',
				'last_name.required'	=>	'Vui lòng điền Tên của bạn',
				'tel.required'	=>	'Vui lòng điền số điện thoại của bạn',
				'date_of_birth.required'	=>	'Vui lòng chọn ngày sinh của bạn',
				'country_id.required'	=>	'Vui lòng chọn quốc tịch của bạn',
				'marital_status.required'	=>	'Vui lòng tình trạng hôn nhân của bạn',
				'max' => 'Hình ảnh không được vượt quá 2MB',
				'mimes' => 'Vui lòng tải file đúng định dạng'
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
				'max'	=>	'Mật khẩu tối đa .max ký tự',
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
		
		$user = NTVSentry::find($my_resume->ntv_id);
		//var_dump($my_resume->education); die();
		$camnang_ntv = TrainingPost::where('training_cat_id', 10)->where('training_cat_id', 9)->with('trainingCat')->take(6)->get();
		return View::make('jobseekers.resume')->with('user', $user)->with('id_cv', $id_cv)->with('my_resume', $my_resume)->with('camnang_ntv',$camnang_ntv);
	}

	// Edit CV
	public function editCvHome($id_cv){
		$my_resume = Resume::where('id', $id_cv)->first();
		$camnang_ntv = TrainingPost::where('training_cat_id', 10)->where('training_cat_id', 9)->with('trainingCat')->take(6)->get();
		return View::make('jobseekers.edit-cv')->with('user', $GLOBALS['user'])->with('id_cv', $id_cv)->with('my_resume', $my_resume)->with('camnang_ntv',$camnang_ntv);
	}
	public function saveInfo($action = false, $id_cv){
		if($action == 'basic'){
			return $this->editBasicInfo();
		}if($action == 'career-goal'){
			return $this->editCareerGoal($id_cv);
		}if($action == 'work-exp'){
			return $this->editWorkExperience($id_cv);
		}if($action == 'education-history') {
			return $this->editEducationHistory($id_cv);
		}if($action == 'skills'){
			return $this->editSkills($id_cv);
		}if($action == 'general'){
			return $this->editGeneralInfo($id_cv);
		}if($action == 'del-exp'){
			return $this->delWorkExperience($id_cv);
		}if($action == 'del-edu'){
			return $this->delEducationHistory($id_cv);
		}if($action == 'del-dhnn'){
			return $this->delDinhHuongNN($id_cv);
		}
	}

	public function delDinhHuongNN($id_cv){
		if(Request::ajax()){
			$cv = Resume::find($id_cv);
			$cv->dinhhuongnn = '';
			$cv->save();
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
					//Log::info($params); 
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
				
				if($params['specific_salary'] == '') $params['specific_salary'] = 0;
				else{$params['specific_salary'] = str_replace(',', '', $params['specific_salary']);}
				$rs = Resume::where('id',$id_cv)->where('ntv_id',$GLOBALS['user']->id)->update(array(
					'namkinhnghiem' 		=> $params['info_years_of_exp'],
					'tieude_cv' 			=> $params['tieude'],
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
			$params['salary'] = str_replace(',', '', $params['salary']);
			$validator = new App\DTT\Forms\JobSeekersWorkExp;
			if($validator->fails())
			{
				$respond['message'] = $validator->getMessageBag()->toJson();
				return Response::json($respond);
			} else {
				if(isset($params['id_exp'])){
					$update = Experience::where('id', $params['id_exp'])->update(array(
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
				}else{
					$create = Experience::create(array(
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
				}
			}
		}
	}
	public function delWorkExperience($id_cv){
		$params = Input::all();
		if (Request::ajax()) {
			$exp = Experience::find($params['id_exp']);
			$exp->delete();
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
				if(isset($params['id_edu'])){
					$update_mte = MTEducation::where('id', $params['id_edu'])->update(array(
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
					
				}else{
					$create_mte = MTEducation::create(array(
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
				}
			}
		}
	}

	public function delEducationHistory($id_cv){
		$params = Input::all();
		if (Request::ajax()) {
			$edu = MTEducation::find($params['id_edu']);
			$edu->delete();
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
	    		File::delete(Config::get('app.upload_path') . 'jobseekers/cv/'.$del->file_name.'');
				$del->delete();
				$education = MTEducation::where('rs_id',$data['is_delete'])->delete();
				$exp = Experience::where('rs_id',$data['is_delete'])->delete();
				$locations = WorkLocation::where('rs_id',$data['is_delete'])->delete();
				$lang = CVLanguage::where('rs_id',$data['is_delete'])->delete();
				$cate = CVCategory::where('rs_id',$data['is_delete'])->delete();
	    	}elseif(isset($data['danghoso'])){
	    		$hoso = Resume::find($data['danghoso']);
	    		$hoso->trangthai = 2;
	    		$hoso->save();
	    	}

	    }

		$my_resume = Resume::where('ntv_id', $GLOBALS['user']->id)->get();
		return View::make('jobseekers.my-resume')->with('my_resume', $my_resume)->with('user',$GLOBALS['user']);
	}
	public function createResume(){
		$chk = Resume::where('ntv_id', $GLOBALS['user']->id)->count();
		if($chk < 4){
			$rs = Resume::create(array('ntv_id'=>$GLOBALS['user']->id ));
			$id_cv = $rs->id;
			$education = MTEducation::create(array('rs_id' => $id_cv));
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
		}else{
			return Redirect::back()->withErrors('Bạn đã tạo nhiều hơn 4 Hồ Sơ.');
		}
	}
	public function saveNote(){
		$params = Input::all();
		if(Request::ajax()){
			$save = MyJob::find($params['id']);
			$save->note = ''.$params['note'].'';
			$save->save();
		}
	}

	public function myJob(){

		/*
		$suggested_jobs = Subscribe::where('ntv_id', $GLOBALS['user']->id)->get();
		if(count($suggested_jobs)){
			foreach ($suggested_jobs as $key => $value) {
				$keyword[] = $value->keyword;
				$categories[] = json_decode($value->categories);
				$provinces[] = json_decode($value->provinces);
			}
			$jobs = Job::where('is_display', 1)->where('hannop', '>=', date('Y-m-d', time()))->with('province')->with('category');
				if(count($keyword)){
				foreach($keyword as $kw){
					$jobs->where('vitri', 'LIKE', "%".$kw."%");
				}	
			}
			if(count($provinces))
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
			if(count($categories) )
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
			$my_job_list = $jobs->orderBy('updated_at', 'ASC')->get();
			if(count($my_job_list) == 0){
				$my_job_list = Job::where('is_display', 1)->where('hannop', '>=', date('Y-m-d', time()))->orderBy('updated_at', 'ASC')->paginate(10);	
			}
		}else{
			$my_job_list = Job::where('is_display', 1)->where('hannop', '>=', date('Y-m-d', time()))->orderBy('updated_at', 'ASC')->paginate(10);
		}

		return View::make('jobseekers.my-job',compact('my_job_list'));
		*/
		$applied_job = Application::where('ntv_id',$GLOBALS['user']->id)->get();
		$my_job_list = MyJob::where('ntv_id',$GLOBALS['user']->id)->paginate(10);
		return View::make('jobseekers.my-job',compact('my_job_list', 'applied_job'));
	}
	public function saveJob($job_id){
		$applied_job = Application::where('ntv_id',$GLOBALS['user']->id)->get();
		$check = Job::find($job_id);
		if($check != null){
			$date = date('Y-m-d', time());
			$my_job = MyJob::firstOrCreate(array('ntv_id' => $GLOBALS['user']->id, 'job_id' => $job_id));
			$my_job->save_date = $date;
			$my_job->save();
			$my_job_list = MyJob::where('ntv_id',$GLOBALS['user']->id)->paginate(10);	
			return View::make('jobseekers.my-job',compact('my_job_list','applied_job'));
		}else{
			return View::make('jobseekers.home');
		}	
	}
	public function savedJob(){
		$applied_job = Application::where('ntv_id',$GLOBALS['user']->id)->get();
		if(count($applied_job)){
			foreach ($applied_job as $key => $value) {
				$applied_id = array($value->job_id);
			}
			$my_job_list = MyJob::whereNotIn('job_id', $applied_id)->where('ntv_id',$GLOBALS['user']->id)->paginate(10);
		}else{
			$my_job_list = MyJob::where('ntv_id',$GLOBALS['user']->id)->paginate(10);
		}
		
		return View::make('jobseekers.saved-job',compact('my_job_list','applied_job'));	
	}

	public function delMyJob(){
		$params = Input::all();
		if(isset($params['check'])){
			
			$job = MyJob::whereIn('id', $params['check'])->where('ntv_id',$GLOBALS['user']->id)->get();
				foreach ($job as $key => $value) {
					$job_id = $value->job_id;	
					$app = Application::where('job_id', $job_id)->where('ntv_id',$GLOBALS['user']->id)->get();
					if(count($app)){
						foreach ($app as $val) {
							$applied_id = array($val->job_id);
						}
						$job = MyJob::whereNotIn('job_id', $applied_id)->where('ntv_id',$GLOBALS['user']->id)->delete();
					}else{
						$job = MyJob::where('ntv_id',$GLOBALS['user']->id)->delete();
					}
				}
			$applied_job = Application::where('ntv_id',$GLOBALS['user']->id)->get();
			$my_job_list = MyJob::Where('ntv_id',$GLOBALS['user']->id)->paginate(10);
			if($job){
				return View::make('jobseekers.saved-job',compact('my_job_list','applied_job'));	
			}else{
				return View::make('jobseekers.saved-job',compact('my_job_list','applied_job'));	
			}
		}
		else{
			return View::make('jobseekers.saved-job',compact('my_job_list','applied_job'));	
		}
	}
	public function delAppliedJob(){
		$params = Input::all();
		if(isset($params['check'])){
			$job = Application::whereIn('job_id', $params['check'])->where('ntv_id',$GLOBALS['user']->id)->delete();
			if($job){
				return Redirect::back();
			}
		}
		else{
			return Redirect::back();
		}	
	}

	public function appliedJob(){
		$my_job_list = Application::where('ntv_id',$GLOBALS['user']->id)->get();
		if(count($my_job_list) > 0 ){
			foreach ($my_job_list as $key => $value) {
				$arr = array($value->job_id);
			}
			$my_job_list = MyJob::where('ntv_id',$GLOBALS['user']->id)->whereIn('job_id', $arr)->paginate(10);
		}else{
			$my_job_list = null;
		}

		return View::make('jobseekers.applied-job',compact('my_job_list'));	
	}

	public function repondFromEmployment(){
		$reponds = VResponse::where('ntv_id',$GLOBALS['user']->id)->where('user_submit','!=', $GLOBALS['user']->id)->paginate(10);
		return View::make('jobseekers.respond-from-employment',compact('reponds'));
	}

	public function delRepondFromEmployment(){
		$params = Input::all();
		if(isset($params['check'])){
			$reponds = VResponse::whereIn('id', $params['check'])->delete();
			if($reponds){
				return Redirect::back();
			}
		}
		else{
			return Redirect::back();
		}	
	}


	public function applyingJob($action, $job_id){
		$job = Job::find($job_id);
		if($job != null){
			if ($action == 'login') {
				$resumes = Resume::where('ntv_id', $GLOBALS['user']->id)->where('is_visible',1)->where('is_public',1)->get();

				return View::make('jobseekers.applying-job')->with('user', $GLOBALS['user'])->with('job', $job)->with('resumes',$resumes);	
			}else{
				return View::make('jobseekers.applying-job-not-login')->with('job', $job);
			}
		}else{
			return View::make('jobseekers.home');
		}
	}
	public function doApplyingJob($action, $job_id){
		$params = Input::all();
			$is_file = false;
			if(isset($params['is_file'])){
				$is_file =  true;
			}
			$prefix_title = '';
			if(isset($params['prefix_title'])){
				$prefix_title = $params['prefix_title'];
			}
			if($params['login'] == 1){
				
				if($is_file) {
					$rules = array(
			       		'headline' => 'required',
			       		'cv_upload' => 'mimes:png,jpeg,doc,docx,xsl,xslx,pdf|max:2000|required',
			    	);
				}else {
					$rules = array(
						'cv_id' => 'required',
			       		'headline' => 'required',
			    	);
				}
			}else{
				$rules = array(
			       		'headline' => 'required',
			       		'first_name' => 'required',
			       		'last_name' => 'required',
			       		'email' => 'required',
			       		'contact_phone' => 'required',
			       		'cover_letter' => 'required',
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
					$cv = '';
					if(isset($params['cv_id'])){
						$cv = $params['cv_id'];
					}else{
						if($params['cv_upload'] != null){
							$extension = $params['cv_upload']->getClientOriginalExtension();
							$name = Str::random(11) . '.' . $extension;
							$params['cv_upload']->move(Config::get('app.upload_path') . 'jobseekers/cv/', $name);
							$create = Resume::create(array('file_name' => $name, 'ntv_id' => $GLOBALS['user']));
							if($create){
								$cv = $create->id;
							}
						}
					}
					if($GLOBALS['user'] != null){
						$ntv_id = $GLOBALS['user']->id;
					}else{
						$ntv_id = 0;
					}
					if($cv != null){
						$apply = Application::create(array(
							'job_id' 		=> $job_id,
							'ntv_id' 		=> $ntv_id,
							'cv_id'  		=> $cv,
							'prefix_title' 	=> ''.$params['prefix_title'].'',
							'first_name' 	=> ''.$params['first_name'].'',
							'last_name' 	=> ''.$params['last_name'].'',
							'headline' 		=> ''.$params['headline'].'',
							'email' 		=> ''.$params['email'].'',
							'contact_phone' => ''.$params['contact_phone'].'',
							'address' 		=> ''.$params['address'].'',
							'province_id' 	=> $params['province_id'],
							'apply_date'	=> date('Y-m-d', time()),
						));
						if($apply){
							return Redirect::back()->with('success','Bạn đã nộp đơn thành công. Chúc bạn may mắn');
						}else{
							return Redirect::back()->withInput()->with('loi','Hiện tại bạn không thể nộp đơn cho công việc này');
						}
					}else{
						return Redirect::back()->withInput()->with('loi','Vui lòng Chọn CV');
					}
				}else{
					return Redirect::back()->withInput()->with('loi','Bạn đã nộp đơn cho công việc này.');
				}
			}
	}

	// My Resume by upload file
	public function myResumeByUpload(){
		$my_resume = Resume::where('ntv_id', $GLOBALS['user']->id)->where('file_name','!=','')->first();
		return View::make('jobseekers.my-resume-by-upload')->with('my_resume', $my_resume)->with('user',$GLOBALS['user']);
	}
	public function actionCV($action = false, $id_cv){
		if($action == 'download'){
			return $this->downloadCV($id_cv);
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
		$params= Input::all();
		$rules = array(
		  	'cv_upload' => 'mimes:png,jpeg,doc,docx,xsl,xslx,pdf|max:2000',
		);	
		$messages = array(
			'required'	=>	'Thông này tin bắt buộc',
			'mimes' 	=>  'Vui lòng tải file đúng định dạng',
			'max'		=>  'File vượt quá dung lượng cho phép'
		);
		$validator = Validator::make($params, $rules, $messages);
		if($validator->fails()){			
	       	return Redirect::back()->withInput()->withErrors($validator);
		}else{
			if($params['cv_update'] != null){
				
				$extension = $params['cv_update']->getClientOriginalExtension();
				$name = Str::random(11) . '.' . $extension;
				$params['cv_update']->move(Config::get('app.upload_path') . 'jobseekers/cv/', $name);
				$cv = Resume::find($id_cv);
				File::delete(Config::get('app.upload_path') . 'jobseekers/cv/'.$cv->file_name.'');
				$cv->file_name = $name;
				if($cv->save()){
					return Redirect::back()->with('success','Cập nhật hồ sơ mới thành công');	
				}else{
					return Redirect::back()->withErrors('Hiện tại bạn không thể cập nhật, vui lòng thử lại sau');
				}
			}
		}
	}
	public function deleteUploadCV($id_cv){
		if(Request::ajax()){
		    $del = Resume::find($id_cv);
		    File::delete(Config::get('app.upload_path') . 'jobseekers/cv/'.$del->file_name.'');
			$del->delete();
		}
	}
	public function createResumeByUpload(){
		$params= Input::all();
		$rules = array(
		    'cv_upload' => 'mimes:png,jpeg,doc,docx,xsl,xslx,pdf|max:2000',
		);	
		$messages = array(
			'required'	=>	'Thông này tin bắt buộc',
			'mimes' 	=>  'Vui lòng tải file đúng định dạng',
			'max'		=>  'File vượt quá dung lượng cho phép'
		);
		$validator = Validator::make($params, $rules, $messages);
		if($validator->fails()){			
	       	return Redirect::back()->withInput()->withErrors($validator);
		}else{
			if($params['cv_upload'] != null){
				$extension = $params['cv_upload']->getClientOriginalExtension();
				$name = Str::random(11) . '.' . $extension;
				$params['cv_upload']->move(Config::get('app.upload_path') . 'jobseekers/cv/', $name);
				$create = Resume::create(array('file_name' => $name, 'ntv_id' => $GLOBALS['user']->id));
				if($create){
					return Redirect::back()->with('success','Tải hồ sơ thành công');
				}
				else{
					return Redirect::back()->withErrors('Tải hồ sơ không thành công');
				}
			}
			
		}
	}


	// Thông báo việc làm
	public function notificationJobs(){
		$user = $GLOBALS['user'];
		$modal = 'hide';
		$jobs_alert = Subscribe::where('ntv_id', $GLOBALS['user']->id)->get();

		if(Input::get('jobid') != null){
			$job = Job::find(Input::get('jobid'));
			$modal = 'show';
		}else{
			$job = null;
		}
		return View::make('jobseekers.notification-jobs', compact('modal', 'job', 'user','jobs_alert'));
	}
	public function creatNotificationJobs(){
		$params = Input::all();
		$respond['has'] = false;
		if(Request::ajax()){
			$rules = array(
		       'salary' 	=> 'numeric ',
		       'categories' => 'required',
		       'province' 	=> 'required',
		       'level'		=> 'required',
		       'email'  	=> 'required|email'
		    );
			$messages = array(
				'categories.required'	=>	'Vui lòng chọn ngành nghề',
				'level.required'	=>	'Vui lòng chọn cấp bậc mong muốn',
				'province.required'	=>	'Vui lòng chọn địa điểm',
				'email.required'	=>	'Vui lòng nhập email của bạn',
				'email' 	=>  'Email không đúng định dạng',
			);
			$validator = Validator::make($params, $rules, $messages);
			if($validator->fails()){			
		       	$respond['message'] = $validator->getMessageBag()->toJson();
				return Response::json($respond);
			}else{
				if($GLOBALS['user'] != null){
					$jobs_alert = Subscribe::where('ntv_id', $GLOBALS['user']->id)->count();
					if($jobs_alert < 5){
							if($params['categories'] != ''){
								$cat = json_encode($params['categories']);
							}else{$cat = null;}
							if($params['province'] != ''){
								$province = json_encode($params['province']);
							}else{$province = null;}
							$create = Subscribe::create(array(
								'ntv_id' 	=> $GLOBALS['user']->id,
								'keyword' 	=> ''.$params['keyword'].'',
								'times' 	=> $params['time'],
								'categories'=> ''.$cat.'',
								'provinces' => ''.$province.'',
								'level'		=> ''.$params['level'].'',
								'salary'	=> $params['salary'],
								'email'		=> ''.$params['email'].'',
							));
							if($create){
								$respond['has'] = true;
								$respond['message'] = 'Tạo thông báo việc làm thành công.';
								return Response::json($respond);
							}
					}else{
						$respond['message'] = json_encode(array('error'=>'Bạn đã tạo tối đa 5 thông báo việc làm.'));
						return Response::json($respond);
					}
				}else{
					if($params['categories'] != ''){
						$cat = json_encode($params['categories']);
					}else{$cat = null;}
					if($params['province'] != ''){
							$province = json_encode($params['province']);
					}else{$province = null;}
						$create = Subscribe::create(array(
							'keyword' 	=> ''.$params['keyword'].'',
							'times' 	=> $params['time'],
							'categories'=> ''.$cat.'',
							'provinces' => ''.$province.'',
							'level'		=> ''.$params['level'].'',
							'salary'	=> $params['salary'],
							'email'		=> ''.$params['email'].'',
						));
					if($create){
						$respond['has'] = true;
						$respond['message'] = 'Tạo thông báo việc làm thành công.';
						return Response::json($respond);
					}				
				}
			}
		}
	}

	public function postUpdate(){
		$params = Input::all();
		$respond['has'] = false;
		if(Request::ajax()){
			$rules = array(
		       'salary' 	=> 'numeric ',
		       'categories' => 'required',
		       'province' 	=> 'required',
		       'level'		=> 'required',
		    );
			$messages = array(
				'categories.required'	=>	'Vui lòng chọn ngành nghề',
				'level.required'	=>	'Vui lòng chọn cấp bậc mong muốn',
				'province.required'	=>	'Vui lòng chọn địa điểm',
			);
			$validator = Validator::make($params, $rules, $messages);
			if($validator->fails()){			
		       	$respond['message'] = $validator->getMessageBag()->toJson();
				return Response::json($respond);
			}else{
				$jobs_alert = Subscribe::where('ntv_id', $GLOBALS['user']->id)->where('id', $params['id']);
				$update = $jobs_alert->update(array(
						'ntv_id' 	=> $GLOBALS['user']->id,
						'keyword' 	=> ''.$params['keyword'].'',
						'times' 	=> $params['time'],
						'categories'=> ''.json_encode($params['categories']).'',
						'provinces' => ''.json_encode($params['province']).'',
						'level'		=> ''.$params['level'].'',
						'salary'	=> $params['salary'],
					));
					if($update){
						$respond['has'] = true;
						$respond['message'] = 'Tạo thành công';
						return Response::json($respond);
					}
			}
		}
	}
	
	public function postDelete(){
		$params = Input::all();
		if(Request::ajax()){
		    $del = Subscribe::find($params['id']);
			$del->delete();
		}		
	}


	// Nhà tuyển dụng xem hồ sơ
	public function employerViewResume(){
		$view_resume = ViewResume::where('ntv_id', $GLOBALS['user']->id)->get();
		return View::make('jobseekers.employer-view-resume', compact('view_resume')); 
	}

	// Thư mời pv & tin nhắn từ nhà tuyển dụng 
	public function messages(){
		return View::make('jobseekers.messages'); 
	}

	// Nhận việc làm mới
	public function regiterJobAlert(){
		return View::make('jobseekers.register-job-alert')->with('user', $GLOBALS['user']); 
	}
	
	// Lấy danh sách ngành nghề
	public function getListCategory(){
		$list_parent = Category::with('mtcategory')->whereHas('mtcategory', function($q) {
			$q->whereHas('job', function ($q1) {
				$q1->where('is_display', 1)->where('hannop', '>=' , date('Y-m-d'));
			});
		})->where('parent_id', 0)->orderBy('parent_id', 'ASC')->get();
		if(count($list_parent)){
			foreach ($list_parent as $key => $value) {
				$cate = Category::where('parent_id', $value->id)->get();
				$list_category[$value->cat_name] = $cate;
			}
		}else{
			$list_category = null;
		}
		return View::make('jobseekers.list-category', compact('list_category'));
	}

	// Lấy danh sách địa điểm
	public function getListProvince(){
		return View::make('jobseekers.list-province');
	}


}
