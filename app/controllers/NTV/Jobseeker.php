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
		if(count($mt_lang) == 0) $mt_lang = null;
		if(count($my_resume) == 0) $my_resume = null;
		return View::make('jobseekers.edit-cv')->with('user', $GLOBALS['user'])->with('id_cv', $id_cv)->with('mt_lang',$mt_lang)->with('my_resume', $my_resume);
	}
	public function saveInfo($action = false, $id_cv){
		if($action == 'basic'){
			return $this->editBasicInfo();
		}elseif($action == 'career-goal'){
			return $this->editCareerGoal($id_cv);
		}
	}

	// Edit & save basic information
	public function editBasicInfo(){
		
		$params = Input::all();
		$respond['has'] = false;
		if(Request::ajax()){
			$validator = new App\DTT\Forms\FormValidatorResume;
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

		
		$params = Input::only('years-of-experience','highest-degree','foreign-languages', 'certificate','latest-company', 'level', 'latest-job', 'current-level', 'wish-position','wish-level', 'wish-place-work', 'category','salary','foreign-languages-1', 'level-languages-1', 'foreign-languages-2', 'level-languages-2','foreign-languages-3', 'level-languages-3');
		if($params['salary']== null) $params['salary'] = 0;
/*	
		$mt_lang = MTLanguage::where('rs_id','=',$id_cv)->count();
		if($mt_lang>0){
			$update_lang = MTLanguage::where('rs_id','=',$id_cv)->update(array(
				'lang_id'=>$params['foreign-languages-1'], 'level' => $params['level-languages-1'] 
			));
		}else{
			$lang = array(
			    new MTLanguage(array('rs_id' => $id_cv, 'lang_id' => $params['foreign-languages-1'], 'level' => $params['level-languages-1'])),
			    new MTLanguage(array('rs_id' => $id_cv, 'lang_id' => $params['foreign-languages-2'], 'level' => $params['level-languages-2'])),
			    new MTLanguage(array('rs_id' => $id_cv, 'lang_id' => $params['foreign-languages-3'], 'level' => $params['level-languages-3'])),
			);

			$create_lang = MTLanguage::where('rs_id', $id_cv);

			$create_lang->lang()->saveMany($lang);
		}

*/
		$validator = new App\DTT\Forms\FormValidatorGeneralInfo;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$rs = Resume::where('id',$id_cv)->where('ntv_id',$GLOBALS['user']->id)->update(array(
				'namkinhnghiem' 		=> ''.$params['years-of-experience'].'',
				'bangcapcaonhat' 		=> ''.$params['highest-degree'].'',
				'ctyganday' 			=> ''.$params['latest-company'].'',
				'cvganday'		 		=> ''.$params['latest-job'].'',
				'capbachientai'			=> ''.$params['current-level'].'',
				'vitrimongmuon' 		=> ''.$params['wish-position'].'',
				'capbacmongmuon' 		=> ''.$params['wish-level'].'',
				'noilamviecmongmuon' 	=> ''.$params['wish-place-work'].'',
				'mucluong' 				=> ''.$params['salary'].'',
			));
			if ($rs)
			{
			    return Redirect::back()->with('success', 'Lưu thành công!');
			}
			else
			{
				return Redirect::back()->withInput->withErrors('Hiện giờ bạn không thể chỉnh sửa mục này');
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
	public function workExperience($id_cv){
		$params = Input::all();
		if(Request::ajax()){
			$validator = new App\DTT\Forms\FormValidatorGeneralInfo;
			$respond['has'] = false;
			if($validator->fails())
			{
				$respond['message'] = $validator->getMessageBag->toJson();
				return Response::json($respond);
			} else {
				$sl = MTWorkExp::where('rs_id', $id_cv)->get();
				var_dump($sl); die();
				if($sl = 0){
					$works = array(
			    	new MTWorkExp(array(
			    		'rs_id' => $id_cv, 
			    		'position' => ''.$params['position'].'', 
			    		'company_name' => ''.$params['company_name'].'', 
			    		'from_date'=> ''.$params['from_date'].'',
			    		'to_date'=> ''.$params['to_date'].'',
			    		'job_detail'=> ''.$params['job_detail'].'',
			    		'field'=> ''.$params['field'].'', 
			    		'specialized'=> ''.$params['specialized'].'',
			    		'level'=> ''.$params['level'].'',
						'salary'=> ''.$params['salary'].'',))
					);
					$create = MTLanguage::where('rs_id', $id_cv);
					$create->lang()->saveMany($works);
				}
				
			}
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