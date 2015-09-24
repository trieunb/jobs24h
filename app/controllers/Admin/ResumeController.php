<?php

class ResumeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /resume
	 *
	 * @return Response
	 */

	public function getIndex(){
		$hoso = Resume::count();
		$hosochuakichhoat = Resume::where('trangthai', 2)->count();
		$resumes = Resume::all();
		return View::make('admin.resumes.index', compact('resumes', 'hoso', 'hosochuakichhoat'));
	}

	public function getNotActive(){
		$hoso = Resume::count();
		$hosochuakichhoat = Resume::where('trangthai', 2)->count();
		$resumes = Resume::all();
		return View::make('admin.resumes.not-active', compact('resumes', 'hoso', 'hosochuakichhoat'));
	}

	public function datatables(){
		$page=0;
		if (Request::ajax()) {
			$page=(Input::get('iDisplayStart'));
		}
		$resumes = Resume::select(
			'id as ckid',
			'id',
			'tieude_cv',
			DB::raw('(select first_name from jobseekers where resumes.ntv_id = jobseekers.id AND resumes.ntv_id != 0 ) as fn') ,
			DB::raw('(select last_name from jobseekers where resumes.ntv_id = jobseekers.id AND resumes.ntv_id != 0) as ln') ,
			'created_at',
			'ntv_id',
			'trangthai',
			'file_name',
			'second_file_name',
			'id as ids');
		return Datatables::of($resumes)
		->edit_column('ckid', '<th class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></th>')
		->edit_column('tieude_cv', '@if($tieude_cv != "")<a href="{{URL::route("admin.resumes.edit1", array($id) )}}" style="text-transform:capitalize" target="_blank">{{$tieude_cv}}</a>@else  @endif')		
		->edit_column('fn', '@if($fn != "")<a href="{{URL::route("admin.jobseekers.edit1", array('.$page.',$ntv_id))}}" target="_blank">{{$fn}} {{$ln}}</a>@else  @endif')		
		->remove_column('ln')	
		->edit_column('trangthai', '@if($trangthai == 2)<span class="label label-warning">Chưa duyệt</span>@elseif($trangthai == 1) <span class="label label-primary">Chưa hoàn thiện</span>@else <span class="label label-success">Đã duyệt</span>@endif')
		->edit_column('created_at', '{{date("d-m-Y", strtotime($created_at))}}')
		->edit_column('ids', '
			{{ Form::open(array("method"=>"POST", "route"=>array("admin.resumes.post-delete", $id) )) }}
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
			{{ Form::close() }}
			')	
		->make();

	}

	public function getNotActiveDatatables(){
		$page=0;
		if (Request::ajax()) {
			$page=(Input::get('iDisplayStart'));
		}
		$resumes = Resume::select(
			'id as ckid',
			'id',
			'tieude_cv',
			DB::raw('(select first_name from jobseekers where resumes.ntv_id = jobseekers.id AND resumes.ntv_id != 0 ) as fn') ,
			DB::raw('(select last_name from jobseekers where resumes.ntv_id = jobseekers.id AND resumes.ntv_id != 0) as ln') ,
			'created_at',
			'ntv_id',
			'id as ids')->where('trangthai', 2);
		return Datatables::of($resumes)
		->edit_column('ckid', '<th class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></th>')
		->edit_column('tieude_cv', '@if($tieude_cv != "")<a href="{{URL::route("admin.resumes.edit1", array($id) )}}" style="text-transform:capitalize" target="_blank">{{$tieude_cv}}</a>@else  @endif')		
		->edit_column('fn', '@if($fn != "")<a href="{{URL::route("admin.jobseekers.edit1", array('.$page.',$ntv_id))}}" target="_blank">{{$fn}} {{$ln}}</a>@else  @endif')		
		->remove_column('ln')	
		->edit_column('created_at', '{{date("d-m-Y", strtotime($created_at))}}')
		->edit_column('ids', '
			{{ Form::open(array("method"=>"POST", "route"=>array("admin.resumes.post-delete", $id), "style"=>"display:inline-block" )) }}
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
			{{ Form::close() }}
			{{ Form::open(array("method"=>"POST", "route"=>array("admin.resumes.post-active", $id), "style"=>"display:inline-block" )) }}
			<button class="btn btn-xs btn-success" type="submit" title="Kich Hoat"><i class="ace-icon fa fa-check-circle bigger-120"></i></button>
			{{ Form::close() }}
			')	
		->make();
	}

	public function postActive($id){
		try{
			$resume = Resume::find($id);
			$resume->trangthai = 1;
			$resume->save();
		} catch (Exception $e) {
			return Redirect::route('admin.resumes.not-active')->withErrors('Không tìm thấy hồ sơ');
		}
		
		return Redirect::route('admin.resumes.not-active')->with('success', 'Kích hoạt hồ sơ thành công');
	}

	/*public function index()
	{
		//
		$query = Input::all();
		if(isset($query['submit']))
		{
			$resumes = Resume::orderBy('id', 'desc')
			->whereHas('ntv', function($q) {
				if(Input::get('email') != NULL) $q->where('email', 'LIKE', "%".Input::get('email')."%");
				if(Input::get('full_name') != NULL) $q->where('first_name', "%".Input::get('full_name')."%");
				if(Input::get('phone_number') != NULL) $q->where('phone_number', "%".Input::get('phone_number')."%");
				if(is_numeric(Input::get('gender') ) )  $q->where('gender', Input::get('gender'));
				if(Input::get('date_of_birth') != NULL) $q->where('date_of_birth', Input::get('date_of_birth'));
				if(is_numeric(Input::get('marital_status') ) != NULL) $q->where('marital_status', Input::get('marital_status'));
			});
			if(is_numeric(Input::get('work_location') ) )
			{
				$resumes->whereHas('location', function($q) {
					$q->where('province_id', Input::get('work_location'));
				});
			}
			if(is_numeric(Input::get('category') ) )
			{
				$resumes->whereHas('cvcategory', function($q) {
					$q->where('cat_id', Input::get('category'));
				});
			}
			if(is_numeric(Input::get('language') ) )
			{
				$resumes->whereHas('cvlanguage', function($q) {
					$q->where('lang_id', Input::get('language'));
				});
			}
			
			$resumes->with('ntv')
			->with(array('location'	=>	function($query) {
				$query->with('province');
			}))
			->with(array('cvcategory'	=>	function($query) {
				$query->with('category');
			}));
			if( is_numeric(Input::get('salary')) )
			{
				if(Input::get('salary') == 0)
				{
					$resumes->where('mucluong', 0);
				} else {
					$resumes->where('mucluong', '>', 0);
				}
			}
			if( is_numeric(Input::get('status')) )
			{
				$resumes->where('is_default', Input::get('status') );
			}
			if (Input::get('namkinhnghiem') != NULL) 
			{
				$resumes->where('namkinhnghiem', Input::get('namkinhnghiem'));
			}
			if( is_numeric(Input::get('education')) )
			{
				$resumes->where('bangcapcaonhat', Input::get('education') );
			}
			if( is_numeric(Input::get('level')) )
			{
				$resumes->where('capbachientai', Input::get('level') );
			}
			$resumes = $resumes->paginate(10);
			foreach ($query as $key => $value) {
				$resumes->appends(array($key => $value));
			}
		} else {
			$resumes = Resume::orderBy('id', 'desc')
			->with('ntv')
			->with(array('location'	=>	function($query) {
				$query->with('province');
			}))
			->with(array('cvcategory'	=>	function($query) {
				$query->with('category');
			}))
			->paginate(10);
		}
		$hoso = Resume::count();
		$hosochuakichhoat = Resume::where('trangthai', 2)->count();
		return View::make('admin.resumes.index', compact('resumes', 'hoso', 'hosochuakichhoat'))->with('input', Input::all());
	}*/

	public function search()
	{
		$query = Input::get('query');
		if($query != '')
		{
			$result = NTV::where('email', 'LIKE', "%$query%")->limit(10)->lists('email');
			return Response::json($result);
		}
		
	}


	/**
	 * Show the form for creating a new resource.
	 * GET /resume/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('admin.resumes.create');
	}

	public function creates($userId = false)
	{
		//
		if( ! is_numeric($userId)) {
			return Redirect::route('admin.jobseekers.index')->withErrors('Bạn chưa chọn User cần thêm CV');
		}
		if( ! User::find($userId))
		{
			return Redirect::route('admin.jobseekers.index')->withErrors('User không tìm thấy.');	
		}
		Session::set('cv_userid', $userId);
		$certificate = Education::all();
		return View::make('admin.resumes.create', compact('userId'));
	}

	public function download($id)
	{
		return $id;
	}
	

	/**
	 * Store a newly created resource in storage.
	 * POST /resume
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$request = Request::all();
		$validator = new App\DTT\Forms\AdminCVCreate();
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			//return Redirect::back()->withInput();
			if (count($request['ntv_noilamviec']) < 1 || count($request['ntv_noilamviec']) > 3) {
				return Redirect::back()->withInput()->withErrors('Bạn phải chọn 1 đến 3 nơi làm việc');
			}
			if (count($request['ntv_nganhnghe']) < 1 || count($request['ntv_nganhnghe']) > 3) {
				return Redirect::back()->withInput()->withErrors('Bạn phải chọn 1 đến 3 nơi ngành nghề');
			}
			if(isset($request['is_mucluong'])) $request['mucluong'] = 0;
			if(isset($request['is_namkn'])) $request['namkinhnghiem'] = 0;
			
			//create a resume
			$rsData = $request;
			unset($rsData['email']);
			unset($rsData['_token']);
			unset($rsData['ntv_noilamviec']);
			unset($rsData['ntv_nganhnghe']);
			$rsData['ntv_id'] = NTV::where('email', '=', $request['email'])->first()->id;
			$resume = Resume::create($rsData);
			if($resume) {
				//create work places
				$wp = array();
				foreach ($request['ntv_noilamviec'] as $key => $value) {

					$wp[] = array(
						'rs_id'	=>	$resume->id,
						'mt_type'	=>	1, //1: resume, 2: jobs
						'province_id'	=>	$value
					);
				}
				
				$create = WorkLocation::insert($wp);

				$cat = array();
				foreach ($request['ntv_nganhnghe'] as $key => $value) {
					$cat[] = array(
						'rs_id'	=>	$resume->id,
						'mt_type'	=>	1, //1: resume, 2: jobs
						'cat_id'	=>	$value
					);
				}
				CVCategory::insert($cat);
				return Redirect::route('admin.resumes.index')->with('success', 'Tạo mới hồ sơ thành công !');
			} else {
				return Redirect::back()->withInput()->withErrors('Có lỗi khi tạo hồ sơ !');
			}
			
		}
	}

	/**
	 * Display the specified resource.
	 * GET /resume/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$resume = Resume::find($id);
		$bang_cap = Education::all();
		if( ! $resume) return Redirect::route('admin.jobseekers.index')->withErrors('Không tìm thấy CV cần in !');
		return View::make('admin.resumes.print', compact('resume', 'bang_cap'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /resume/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		//
		$resume = Resume::find($id);
		if( ! $resume)
		{
			return Redirect::route('admin.resumes.index')->withErrors('Không tìm thấy hồ sơ !');
		}else{
			if($resume->file_name == ''){
				return View::make('admin.resumes.edit', compact('resume'));
			}else{
				return View::make('admin.resumes.edit-upload-cv', compact('resume'));
			}
		}
		
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /resume/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit($id)
	{	
		$params = Input::all();
		//var_dump($params['trangthai']); die();
		$resume = Resume::with('location')->find($id);
		if( ! $resume)
		{
			return Redirect::route('admin.resumes.index')->withErrors('CV không tìm thấy !');
		}else{
			//validate
			$validator = new App\DTT\Forms\AdminCVCreate;
			if($validator->fails())
			{
				return Redirect::back()->withInput()->withErrors($validator);
			} else {
				// THONG TIN CHUNG
				if(!isset($params['foreign_languages_2'])){$params['foreign_languages_2']=null;}
				if(!isset($params['foreign_languages_3'])){$params['foreign_languages_3']=null;}
				if(!isset($params['level_languages_2'])){$params['level_languages_2']=null;}
				if(!isset($params['level_languages_3'])){$params['level_languages_3']=null;}
				// Languages
				$chk = CVLanguage::where('rs_id',$id)->get();
				if(count($chk) == 0){
					$lt = CVLanguage::insert(array(
						array('rs_id' => $id,'lang_id' => $params['foreign_languages_1'],'level' => $params['level_languages_1'],'count_lang' => 1),
						array('rs_id' => $id,'lang_id' => $params['foreign_languages_2'],'level' => $params['level_languages_2'],'count_lang' => 2),
						array('rs_id' => $id,'lang_id' => $params['foreign_languages_3'],'level' => $params['level_languages_3'],'count_lang' => 3),
					));
				}else{
					for ($i=1; $i <= count($chk) ; $i++) { 
						$lt = CVLanguage::where('rs_id',$id)->where('count_lang', $i)->update(array(
							'lang_id' => $params['foreign_languages_'.$i.''],'level' => $params['level_languages_'.$i.'']
						));
					}
				}

				// Categories
				$chk_cat = CVCategory::where('rs_id',$id)->get();
				if(count($params['info_category']) < 2){
					$params['info_category'][1] = 0;	
				}
				if(count($params['info_category']) < 3){
					$params['info_category'][2] = 0;
				}
				if(count($chk_cat) == 0){
					$ct = CVCategory::insert(array(
						array('rs_id' => $id,'cat_id' => $params['info_category'][0], 'count_cate' => 1),
						array('rs_id' => $id,'cat_id' => $params['info_category'][1], 'count_cate' => 2),
						array('rs_id' => $id,'cat_id' => $params['info_category'][2], 'count_cate' => 3),
					));
				}else{
					for ($i=0; $i < count($chk_cat) ; $i++) { 
						$update_ct = CVCategory::where('rs_id',$id)->where('count_cate', $i+1)->update(array(
							'cat_id' => $params['info_category'][$i]
						));
					}
				}


				// Work Locations
				$chk_wl = WorkLocation::where('rs_id',$id)->get();
				if(count($params['info_wish_place_work']) < 2){
					$params['info_wish_place_work'][1] = 0;	
				}
				if(count($params['info_wish_place_work']) < 3){
					$params['info_wish_place_work'][2] = 0;
				}
				if(count($chk_wl) == 0){
					$wl = WorkLocation::insert(array(
						array('rs_id' => $id,'province_id' => $params['info_wish_place_work'][0], 'count_work_location' => 1),
						array('rs_id' => $id,'province_id' => $params['info_wish_place_work'][1], 'count_work_location' => 2),
						array('rs_id' => $id,'province_id' => $params['info_wish_place_work'][2], 'count_work_location' => 3),
					));
				}else{
					for ($j=0; $j < count($chk_wl) ; $j++) { 
						$update_wl = WorkLocation::where('rs_id',$id)->where('count_work_location', $j+1)->update(array(
							'province_id' => $params['info_wish_place_work'][$j]
						));
					}
				}
				
				$params['specific_salary'] = 800000;
				//else{$params['specific_salary'] = str_replace(',', '', $params['specific_salary']);}
				
				if(!isset($params['is_publish'])) $params['is_publish'] = 0;
				else{$params['is_publish'] = 1;}
				if($params['is_publish'] == 1){
					$un_set_publish = Resume::where('ntv_id',$GLOBALS['user']->id)->update(array('is_public'=>0));
				}


				if(!isset($params['is_visible'])) $params['is_visible'] = 0;
				else{$params['is_visible'] = 1;}
				if($params['is_visible'] == 1){
					$un_set_visible = Resume::where('ntv_id',$GLOBALS['user']->id)->update(array('is_visible'=>0));
				}

				// KINH NGHIEM LAM VIEC
				if(isset($params['id_exp'])){
					$update = Experience::where('id', $params['id_exp'])->update(array(
						'position' => ''.$params['position'].'', 
			    		'company_name' => ''.$params['company_name'].'', 
			    		'from_date'=> ''.$params['from_date'].'',
			    		'to_date'=> ''.$params['to_date'].'',
			    		'job_detail'=> ''.$params['job_detail'].'',
					));
				
				}else{
					$create = Experience::create(array(
			    		'rs_id' => $id, 
			    		'position' => ''.$params['position'].'', 
			    		'company_name' => ''.$params['company_name'].'', 
			    		'from_date'=> ''.$params['from_date'].'',
			    		'to_date'=> ''.$params['to_date'].'',
			    		'job_detail'=> ''.$params['job_detail'].'',
					));
				
				}

				// HOC VAN BANG CAP
				if(isset($params['id_edu'])){
					$update_mte = MTEducation::where('id', $params['id_edu'])->update(array(
			    		'school' => ''.$params['school'].'', 
			    		'level'=> $params['level'],
			    		'study_from'=> ''.$params['study_from'].'',
			    		'study_to'=> ''.$params['study_to'].'',
			    		'achievement'=> ''.$params['achievement'].'', 
			    		'specialized'=> ''.$params['specialized'].'',
			    		'average_grade_id'=> $params['average_grade_id'],
					));
					
					
				}else{
					$create_mte = MTEducation::create(array(
			    		'rs_id' => $id, 
			    		'school' => ''.$params['school'].'', 
			    		'level'=> $params['level'],
			    		'study_from'=> ''.$params['study_from'].'',
			    		'study_to'=> ''.$params['study_to'].'',
			    		'achievement'=> ''.$params['achievement'].'', 
			    		'specialized'=> ''.$params['specialized'].'',
			    		'average_grade_id'=> $params['average_grade_id'],
					));
					
				}

				// KY NANG
				$arr = array();
				$new_arr= array();
				foreach($params['skills'] as $key => $value)
				{
					if($value != ''){
						foreach ($params['level_skills'] as $k => $val) {
							if($k == $key){
								$arr[] = array($value,$val);
							}
						}
					}
				}
				$rs = Resume::where('id',$id)->where('ntv_id',$GLOBALS['user']->id)->update(array(
					'namkinhnghiem' 		=> $params['info_years_of_exp'],
					'tieude_cv' 			=> $params['tieude'],
					'bangcapcaonhat' 		=> $params['info_highest_degree'],
					'capbachientai' 		=> $params['info_current_level'],
					'capbacmongmuon' 		=> $params['info_wish_level'],
					'mucluong' 				=> $params['specific_salary'],
					'ctyganday' 			=> ''.$params['info_latest_company'].'',
					'cvganday' 				=> ''.$params['info_latest_job'].'',
					'is_public'				=> $params['is_publish'],
					'is_visible'			=> $params['is_visible'],
					'dinhhuongnn'			=>''.$params['introduct_yourself'].'',
					'kynang'				=>''.json_encode($arr).'',
					'trangthai'				=> ''.$params['trangthai'].''

				));
				if($rs){
					return Redirect::back()->with('success', 'Cập nhật Hồ Sơ thành công');
				}else{
					return Redirect::back()->withInput()->withErrors('Cập nhật Hồ Sơ không thành công');
				}
			}
		}
	}

	
	/**
	 * Remove the specified resource from storage.
	 * DELETE /resume/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($id)
	{
		//
		try {
			$resume = Resume::findOrFail($id);
			$resume->delete();
		} catch (Exception $e) {
			return Redirect::route('admin.resumes.index')->withErrors('Không tìm thấy CV');
		}
		
		return Redirect::route('admin.resumes.index')->with('success', 'Xóa CV thành công');
	}

	public function getReport()
	{
		return View::make('admin.comming');
	}

	public function getEditActive()
	{
		return View::make('admin.comming');
	}

	public function actionUploadCV($action, $id){
		if($action == 'edit'){
			return $this->uploadCV($id);
		}
		if($action == 'delete' || $action == 'delete_second_cv'){
			return $this->delUploadCV($action, $id);
		}
		if($action == 'download' || $action == 'download_second'){
			return $this->downloadCV($action, $id);
		}
	}


	public function uploadCV($id){
		$params= Input::all();

		if(!isset($params['specific_salary'])) $params['specific_salary'] = 0;
		else{$params['specific_salary'] = str_replace(',', '', $params['specific_salary']);}
		if(!isset($params['info_years_of_exp'])) $params['info_years_of_exp'] = 0;

		$rules = array(
			'tieude' 				=> 'required',
			'info_highest_degree' 	=> 'required',
			'info_wish_level' 		=> 'required',
			'specific_salary' 		=> 'numeric',
			'info_years_of_exp'		=> 'numeric',
			"info_wish_place_work"	=>	"required",
			"info_category" 		=>	"required",
		    'cv_update' 			=> 'mimes:doc,docx,pdf|max:2000',
		    'cv_second'				=> 'mimes:doc,docx,pdf|max:2000',
		);	
		$messages = array(
			'required'	=>	'Vui lòng nhập thông tin',
			'mimes' 	=>  'Vui lòng tải file đúng định dạng',
			'max'		=>  'File vượt quá dung lượng cho phép',
			'numeric'	=> 	'Vui lòng nhập số',
			'email'		=>	'Vui lòng nhập Email đúng định dạng',
		);
		$validator = Validator::make($params, $rules, $messages);
		if($validator->fails()){			
		      	return Redirect::back()->withInput()->withErrors($validator);
		}else{				
				$cv = Resume::find($id);
				if($params['cv_update'] != null){
					$extension = $params['cv_update']->getClientOriginalExtension();
					$name = Str::random(11) . '.' . $extension;
					$params['cv_update']->move(Config::get('app.upload_path') . 'jobseekers/cv/', $name);
					File::delete(Config::get('app.upload_path') . 'jobseekers/cv/'.$cv->file_name.'');
				}else{
					$name = $cv->file_name;
				}

				if($params['cv_second'] != null){
					$extension = $params['cv_second']->getClientOriginalExtension();
					$cv_second = Str::random(11) . '.' . $extension;
					$params['cv_second']->move(Config::get('app.upload_path') . 'jobseekers/cv/', $name);
					File::delete(Config::get('app.upload_path') . 'jobseekers/cv/'.$cv->file_name.'');
				}else{
					$cv_second = '';
				}

				// Categories
				$chk_cat = CVCategory::where('rs_id',$id)->get();
				if(count($params['info_category']) < 2){
					$params['info_category'][1] = 0;	
				}
				if(count($params['info_category']) < 3){
					$params['info_category'][2] = 0;
				}
				if(count($chk_cat) == 0){
					$ct = CVCategory::insert(array(
						array('rs_id' => $id,'cat_id' => $params['info_category'][0], 'count_cate' => 1),
						array('rs_id' => $id,'cat_id' => $params['info_category'][1], 'count_cate' => 2),
						array('rs_id' => $id,'cat_id' => $params['info_category'][2], 'count_cate' => 3),
					));
				}else{
					for ($i=0; $i < count($chk_cat) ; $i++) { 
						$update_ct = CVCategory::where('rs_id',$id)->where('count_cate', $i+1)->update(array(
							'cat_id' => $params['info_category'][$i]
						));
					}
				}



				// Work Locations
				$chk_wl = WorkLocation::where('rs_id',$id)->get();
				if(count($params['info_wish_place_work']) < 2){
					$params['info_wish_place_work'][1] = 0;	
				}
				if(count($params['info_wish_place_work']) < 3){
					$params['info_wish_place_work'][2] = 0;
				}
				if(count($chk_wl) == 0){
					$wl = WorkLocation::insert(array(
						array('rs_id' => $id,'province_id' => $params['info_wish_place_work'][0], 'count_work_location' => 1),
						array('rs_id' => $id,'province_id' => $params['info_wish_place_work'][1], 'count_work_location' => 2),
						array('rs_id' => $id,'province_id' => $params['info_wish_place_work'][2], 'count_work_location' => 3),
					));
				}else{
					for ($j=0; $j < count($chk_wl) ; $j++) { 
						$update_wl = WorkLocation::where('rs_id',$id)->where('count_work_location', $j+1)->update(array(
							'province_id' => $params['info_wish_place_work'][$j]
						));
					}
				}
		
				if(!isset($params['is_publish'])) $params['is_publish'] = 0;
				else{$params['is_publish'] = 1;}
				if($params['is_publish'] == 1){
					$un_set_publish = Resume::where('ntv_id',$GLOBALS['user']->id)->update(array('is_public'=>0));
				}


				if(!isset($params['is_visible'])) $params['is_visible'] = 0;
				else{$params['is_visible'] = 1;}
				if($params['is_visible'] == 1){
					$un_set_visible = Resume::where('ntv_id',$GLOBALS['user']->id)->update(array('is_visible'=>0));
				}

				$rs = Resume::where('id',$id)->update(array(
					'tieude_cv' 			=> $params['tieude'],
					'bangcapcaonhat' 		=> $params['info_highest_degree'],
					'capbachientai' 		=> $params['info_current_level'],
					'capbacmongmuon' 		=> $params['info_wish_level'],
					'mucluong' 				=> $params['specific_salary'],
					'namkinhnghiem'			=> $params['info_years_of_exp'],
					'file_name' 			=> $name,
					'second_file_name'		=> $cv_second,
					'is_public'				=> $params['is_publish'],
					'is_visible'			=> $params['is_visible'],
					'trangthai'				=> ''.$params['trangthai'].''
				));
				if($rs){
					return Redirect::back()->with('success', 'Cập nhật Hồ Sơ thành công');
				}else{
					return Redirect::back()->withInput()->withErrors('Cập nhật Hồ sơ không thành công');
				}
		}
	}


	public function downloadCV($action,$id){
		$cv = Resume::find($id);
		if($action == 'download'){
			$file_name = $cv->file_name;
		}else{
			$file_name = $cv->second_file_name;
		}
		$file= Config::get('app.upload_path') . 'jobseekers/cv/'.$file_name.'';
		$name = explode('.', $file_name);
		if($cv->tieude_cv == ''){
			$name = $GLOBALS['user']->first_name.$GLOBALS['user']->last_name.'_'.date('m-d-Y',strtotime($cv->updated_at)).'.'.$name[1];
		}else{$name = $cv->tieude_cv.'.'.$name[1];}
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

	public function delUploadCV($action, $id){
		if(Request::ajax()){
			
			$del = Resume::find($id);
			if($action == 'delete'){
			    File::delete(Config::get('app.upload_path') . 'jobseekers/cv/'.$del->file_name.'');
				$del->delete();
			}else{
				File::delete(Config::get('app.upload_path') . 'jobseekers/cv/'.$del->second_file_name.'');
				$del->second_file_name = '';
				$del->save();
			}
		}
	}

	public function getListCvByNtv($id){
		return View::make('admin.resumes.list-cv-by-ntv', compact('id'));
	}

	public function getListCvByNtvDatatables($id){
		$page=0;
		if (Request::ajax()) {
			$page=(Input::get('iDisplayStart'));
		}
		$resumes = Resume::select(
			'id as ckid',
			'id',
			'tieude_cv',
			DB::raw('(select first_name from jobseekers where resumes.ntv_id = jobseekers.id AND resumes.ntv_id != 0 ) as fn') ,
			DB::raw('(select last_name from jobseekers where resumes.ntv_id = jobseekers.id AND resumes.ntv_id != 0) as ln') ,
			'created_at',
			'ntv_id',
			'trangthai',
			'file_name',
			'second_file_name',
			'id as ids')->where('ntv_id', $id);
		return Datatables::of($resumes)
		->edit_column('ckid', '<th class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></th>')
		->edit_column('tieude_cv', '@if($tieude_cv != "")<a href="{{URL::route("admin.resumes.edit1", array($id) )}}" style="text-transform:capitalize" target="_blank">{{$tieude_cv}}</a>@else  @endif')		
		->edit_column('fn', '@if($fn != "")<a href="{{URL::route("admin.jobseekers.edit1", array('.$page.',$ntv_id))}}" target="_blank">{{$fn}} {{$ln}}</a>@else  @endif')		
		->remove_column('ln')	
		->edit_column('trangthai', '@if($trangthai == 2)<span class="label label-warning">Chưa duyệt</span>@elseif($trangthai == 1) <span class="label label-primary">Chưa hoàn thiện</span>@else <span class="label label-success">Đã duyệt</span>@endif')
		->edit_column('created_at', '{{date("d-m-Y", strtotime($created_at))}}')
		->edit_column('ids', '
			{{ Form::open(array("method"=>"POST", "route"=>array("admin.resumes.post-delete", $id) )) }}
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
			{{ Form::close() }}
			')	
		->make();		
	}

}