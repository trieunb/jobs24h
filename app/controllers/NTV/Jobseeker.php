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
		$js = Sentry::getUser();
		$dob = date("d", strtotime($js->date_of_birth));
		$mob = date("m", strtotime($js->date_of_birth));
		$yob = date("y", strtotime($js->date_of_birth));
		return View::make('jobseekers.edit-basic-info')->with('js', $js)->with('dob', $dob)->with('mob', $mob)->with('yob', $yob);	
	}
	public function editBasic()
	{
		$params = Input::only('first_name','last_name','vocational', 'yob','mob','dob', 'marital_status', 'hobbies', 'country_id', 'gender');
		try
		{
		    // Find the user using the user id
		    $user = $GLOBALS['user'];
			// Update the user details
		    $user->first_name = $params['first_name'];
		    $user->last_name = $params['last_name'];
		    $user->vocational = $params['vocational'];
		    $user->date_of_birth = $params['yob']."-".$params['mob']."-".$params['dob'];
		    $user->marital_status = $params['marital_status'];
		    $user->hobbies = $params['hobbies'];
		    $user->country_id = $params['country_id'];
		    $user->gender = $params['gender'];
			    // Update the user
		    if ($user->save())
		    {
		        return Redirect::back()->with('success', 'Lưu thành công!');
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
	// Mục tiêu nghề nghiệp
	public function editCareerObjectivesHome($id){
		return View::make('jobseekers.edit-career-objectives');
	}	




	// Edit CV
	public function editCvHome($id_cv){
		$mt_lang = MTLanguage::where('rs_id', $id_cv)->get();
		$my_resume = Resume::where('id', $id_cv)->first();
		$mt_work_exp = MTWorkExp::where('rs_id', $id_cv)->get();
		if(count($mt_lang) == 0) $mt_lang = null;
		if(count($my_resume) == 0) $my_resume = null;
		if(count($mt_work_exp) == 0) $mt_work_exp = null;
		return View::make('jobseekers.edit-cv')->with('user', $GLOBALS['user'])->with('id_cv', $id_cv)->with('mt_lang',$mt_lang)->with('my_resume', $my_resume)->with('mt_work_exp',$mt_work_exp);
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
					if($params['date_of_birth']=='') $params['date_of_birth'] = null;
					$user = $GLOBALS['user'];
					$user->date_of_birth 	= $params['date_of_birth'];
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
				// Languages
				$chk = MTLanguage::where('rs_id',$id_cv)->get();
				if(count($chk) == 0){
					$lt = MTLanguage::insert(array(
						array('rs_id' => $id_cv,'lang_id' => $params['foreign_languages_1'],'level' => $params['level_languages_1'],'count_lang' => 1),
						array('rs_id' => $id_cv,'lang_id' => $params['foreign_languages_2'],'level' => $params['level_languages_2'],'count_lang' => 2),
						array('rs_id' => $id_cv,'lang_id' => $params['foreign_languages_3'],'level' => $params['level_languages_3'],'count_lang' => 3),
					));
				}else{
					for ($i=1; $i <= count($chk) ; $i++) { 
						$lt = MTLanguage::where('rs_id',$id_cv)->where('count_lang', $i)->update(array(
							'lang_id' => $params['foreign_languages_'.$i.''],'level' => $params['level_languages_'.$i.'']
						));
					}
				}

				// Categories
				$chk_cat = MTCategory::where('rs_id',$id_cv)->get();
				if(count($params['info_category']) < 2){
					$params['info_category'][1] = 0;	
				}
				if(count($params['info_category']) < 3){
					$params['info_category'][2] = 0;
				}
				if(count($chk_cat) == 0){
					$ct = MTCategory::insert(array(
						array('rs_id' => $id_cv,'cat_id' => $params['info_category'][0], 'count_cate' => 1),
						array('rs_id' => $id_cv,'cat_id' => $params['info_category'][1], 'count_cate' => 2),
						array('rs_id' => $id_cv,'cat_id' => $params['info_category'][2], 'count_cate' => 3),
					));
				}else{
					for ($i=0; $i < count($chk_cat) ; $i++) { 
						$update_ct = MTCategory::where('rs_id',$id_cv)->where('count_cate', $i+1)->update(array(
							'cat_id' => $params['info_category'][$i]
						));
					}
				}


				// Work Locations
				$chk_wl = MTWorkLocation::where('rs_id',$id_cv)->get();
				if(count($params['info_wish_place_work']) < 2){
					$params['info_wish_place_work'][1] = 0;	
				}
				if(count($params['info_wish_place_work']) < 3){
					$params['info_wish_place_work'][2] = 0;
				}
				if(count($chk_wl) == 0){
					$wl = MTWorkLocation::insert(array(
						array('rs_id' => $id_cv,'province_id' => $params['info_wish_place_work'][0], 'count_work_location' => 1),
						array('rs_id' => $id_cv,'province_id' => $params['info_wish_place_work'][1], 'count_work_location' => 2),
						array('rs_id' => $id_cv,'province_id' => $params['info_wish_place_work'][2], 'count_work_location' => 3),
					));
				}else{
					for ($j=0; $j < count($chk_wl) ; $j++) { 
						$update_wl = MTWorkLocation::where('rs_id',$id_cv)->where('count_work_location', $j+1)->update(array(
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
		if(Request::ajax()){
			$rules = array(
		       'introduct_yourself' => 'required',
		    );
		    $messages = array(
				'required'	=>	'Thông tin này bắt buộc',
			);
			$validator = Validator::make($params, $rules, $messages);
			$respond['has'] = false;
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
				$sl = MTWorkExp::where('rs_id', $id_cv)->get();
				if(count($sl) == 0){
					$create = MTWorkExp::insert(array(
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
					$update = MTWorkExp::where('rs_id', $id_cv)->update(array(
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
			Log::info($params);
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
	    	}

	    }

		$my_resume = Resume::where('ntv_id', $GLOBALS['user']->id)->get();
		return View::make('jobseekers.my-resume')->with('my_resume', $my_resume)->with('user',$GLOBALS['user']);
	}
	public function createResume(){
		$rs = Resume::create(array('ntv_id'=>$GLOBALS['user']->id ));
		$id_cv = $rs->id;
		if($rs)
		{
			return Redirect::route('jobseekers.edit-cv', array($id_cv));
		}
	}
}