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
		if(count($mt_lang) == 0) $mt_lang = null;
		return View::make('jobseekers.edit-cv')->with('user', $GLOBALS['user'])->with('id_cv', $id_cv)->with('mt_lang',$mt_lang);
	}
	public function editBasicInfo(){
		$params = Input::all();
		if(Request::ajax()){
			Log::info($params);
		$validator = new App\DTT\Forms\FormValidatorResume;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
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
			        return Redirect::back();
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
	}
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