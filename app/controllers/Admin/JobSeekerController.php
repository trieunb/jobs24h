<?php

class JobSeekerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /jobseeker
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//
		
		$jobseekers = Sentry::findAllUsers();
		$ntvLogin = NTV::whereRaw("DATE_FORMAT(last_login, '%Y-%m-%d') = '".date('Y-m-d')."'")->count();
		$ntvCreate = NTV::whereRaw("DATE_FORMAT(created_at, '%Y-%m-%d') = '".date('Y-m-d')."'")->count();
		$ntvUnactive = NTV::where('activated', 0)->count();
		$totalNTV = NTV::count();
		$ntvNologin = Application::where('ntv_id', 0)->where('status', 1)->count();
		/*$jobseekers = NTV::select('id as ckid', 'id', 'first_name','last_name', 'email','phone_number', 'created_at', 'count(resume_count) as resume', 'activated', 'id as ids')->with('resumeCount')->take(1)->get()->toArray();
		var_dump($jobseekers); die();*/
		//$jobseekers = NTV::whereHas('resume', function ($q1) {
		//		$q1;
		//	})->with('resume')->take(1)->get()->toArray();
		//var_dump($jobseekers); die();
		return View::make('admin.jobseekers.index', compact('jobseekers','ntvLogin', 'totalNTV', 'ntvCreate', 'ntvUnactive', 'ntvNologin'));
	}

	public function getNotLogin(){
		$jobseekers = Application::where('ntv_id', 0)->get();		
		return View::make('admin.jobseekers.jobseekers-not-login', compact('jobseekers'));
	}

	public function getDatatablesnotlogin(){
		$page=0;
		if (Request::ajax()) {
			$page=(Input::get('iDisplayStart'));
		}
		$application = Application::select(
			'id as ckid',
			'id',
			'first_name',
			'last_name',
			'email',
			'contact_phone',
			'job_id',
			'cv_id',
			DB::raw('(select vitri from jobs where application.job_id = jobs.id) as job'),
			DB::raw('(select slug from jobs where application.job_id = jobs.id) as slug'),
			DB::raw('(select file_name from resumes where application.cv_id = resumes.id AND resumes.file_name != "") as file_upload'),
			'id as member',
			'id as ids')->where('ntv_id', 0);
		return Datatables::of($application)
		->edit_column('ckid', '<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
')
		->edit_column('first_name', '{{ $first_name }} {{ $last_name }}')
		->remove_column('last_name')
   		->edit_column('member', '<span class="label label-success">Khách</span>')
		->edit_column('ids', '
			{{ Form::open(array("method"=>"POST", "route"=>array("admin.jobseekers.delete-ntv-not-login", $id) )) }}
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
			{{ Form::close() }}
			')
		->edit_column('job', '<a href="{{URL::route("jobseekers.job", array($slug, $job_id))}}" target="_blank">{{$job}}</a>')
		->edit_column('file_upload', '<a href="{{URL::route("admin.resumes.edit1", array($cv_id))}}">{{$file_upload}}</a>')
		->remove_column('slug')
		->remove_column('job_id')
		->remove_column('cv_id')
		->make();

	}



	/**
	 * Show the form for creating a new resource.
	 * GET /jobseeker/create
	 *
	 * @return Response
	 */
	public function datatables()
	{
		$page=0;
		if (Request::ajax()) {
			$page=(Input::get('iDisplayStart'));
		}
		$jobseekers = NTV::select(
			'id as ckid',
			'id',
			'first_name',
			'last_name',
			'email',
			'phone_number',
			'created_at',
			DB::raw('(select count(*) from resumes where jobseekers.id = resumes.ntv_id) as count_resume') ,
			DB::raw('(select count(*) from application where jobseekers.id = application.ntv_id) as count_application'),
			DB::raw('(select count(*) from resumes where jobseekers.id = resumes.ntv_id AND resumes.file_name != "") as count_file_upload'),
			'id as member',
			'activated',
			'id as ids');
		return Datatables::of($jobseekers)
		->edit_column('ckid', '<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
')
		->edit_column('first_name', '<a href="{{URL::route("admin.jobseekers.edit1", array('.$page.',$id) )}}" title="Edit" style="text-transform:capitalize;">{{ $first_name }} {{ $last_name }}</a> ')
		->remove_column('last_name')
		->edit_column('email', '<a href="{{URL::route("admin.jobseekers.edit1", array('.$page.',$id) )}}" title="Edit">{{$email}}</a>')
		->edit_column('created_at', '{{date("d-m-Y", strtotime($created_at))}}')
   		->edit_column('activated', '@if($activated==true)<span class="label label-success">Kích hoạt</span>@else <span class="label label-info">Không kích hoạt</span>@endif')
   		->edit_column('member', '@if($member != 0)<span class="label label-success">Thành viên</span>@else <span class="label label-success">Khách</span>@endif')
		->edit_column('ids', '
			{{ Form::open(array("method"=>"POST", "route"=>array("admin.jobseekers.delete", $id) )) }}
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
			{{ Form::close() }}
			')
		->edit_column('count_resume', '<a href="{{URL::route("admin.resumes.list-cv-by-ntv", array($id))}}">{{$count_resume}}</a>')
		->edit_column('count_application', '<a href="{{URL::route("admin.jobseekers.list-job-applied", array($id))}}">{{$count_application}}</a>')
		->edit_column('count_file_upload', '<a href="{{URL::route("admin.resumes.list-cv-by-ntv", array($id))}}">{{$count_file_upload}}</a>')
		->make();

	}
	public function create()
	{
		//
		$provinces = Province::lists('province_name', 'id');
		return View::make('admin.jobseekers.create')->with('provinces', $provinces);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /jobseeker
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$inputs = Input::all();
		$validator = new App\DTT\Forms\AdminNTVCreate;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			unset($inputs['_token']);
			$inputs['country_id'] = 1;
			$user = Sentry::createUser($inputs);
			if($user) return Redirect::route('admin.jobseekers.index')->with('success', 'Thêm Người tìm việc thành công !');
			return Redirect::back()->withInput()->withError('error', 'Lỗi khi thêm mới người dùng');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /jobseeker/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /jobseeker/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($page,$id)
	{
		//
		try {
			$provinces = Province::lists('province_name', 'id');
			$countries = Country::lists('country_name', 'id');
			$js = Sentry::findUserById($id);

			$cvlist = Resume::where('ntv_id', '=', $js->id)->get();
			return View::make('admin.jobseekers.edit', compact('cvlist', 'page'))->with('provinces', $provinces)->with('countries', $countries)->with('js', $js);
		} catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
			return Response::make('User was not found !', 404);
		}
		
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /jobseeker/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit($id)
	{
		//
		$inputs = Input::all();
		$rules = array(
			'email'				=>	'required|email|unique:jobseekers,email,'.$id,
			'first_name'				=>	'required',
			'last_name'				=>	'required',
			'password'				=>	'min:3',
			'date_of_birth'			=>	'date_format:Y-m-d',
			'gender'			=>	'in:1,2,3',
			'marital_status'	=>	'in:1,2',
			'activated'				=>	'in:0,1',
		);
		 $messages = array(
			'email.required'	=>	'Email không được để trống.',
			'password.required'	=>	'Mật khẩu không được để trống.',
			'first_name.required'	=>	'Họ không được để trống.',
			'last_name.required'	=>	'Tên không được để trống.',
			'email'		=>	'Email không đúng định dạng.',
			'unique'	=>	':attribute đã tồn tại, vui lòng chọn tên khác',
			'username.min'		=>	'Username tối thiểu là :min kí tự.',
			'first_name.min'		=>	'Họ tối thiểu là :min kí tự.',
			'last_name.min'		=>	'Tên tối thiểu là :min kí tự.',
			'password.min'		=>	'Mật khẩu tối thiểu là :min kí tự.',
			'date_format'=> 'Ngày sinh không đúng định dạng'
		);
		$validator = Validator::make($inputs, $rules, $messages);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			unset($inputs['_method']);
			unset($inputs['_token']);
			if($inputs['password'] == '') unset($inputs['password']);
			$user = Sentry::findUserById($id);
			
			if($user)
			{
				foreach ($inputs as $key => $value) {
					$user->$key = $value;
				}
				$user->save();
				return Redirect::back()->with('success', 'Lưu thông tin thành công !');
			} else {
				return Response::make('User was not found !', 404);
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /jobseeker/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($id)
	{
		//
		$user = NTV::find($id);
		$user->delete();
		return Redirect::back()->with('success', 'Xóa thành công !');
	}

	public function postDeleteNTVNotLogin($id){
		$user = Application::find($id);
		$cv = Resume::where('id', $user->cv_id);
		$cv->delete();
		$user->delete();
		return Redirect::back()->with('success', 'Xóa thành công !');
	}

	public function getAnalytics(){
		$ntvLogin = NTV::whereRaw("DATE_FORMAT(last_login, '%Y-%m-%d') = '".date('Y-m-d')."'")->count();
		$ntvCreate = NTV::whereRaw("DATE_FORMAT(created_at, '%Y-%m-%d') = '".date('Y-m-d')."'")->count();
		$ntvUnactive = NTV::where('activated', 0)->count();
		$totalNTV = NTV::count();
		$ntvNologin = Application::where('ntv_id', 0)->where('status', 1)->count();
		return View::make('admin.jobseekers.analytics', compact('ntvLogin', 'totalNTV', 'ntvCreate', 'ntvUnactive', 'ntvNologin'));
	}

	public function getListJobApplied($id){
		return View::make('admin.jobseekers.list-job-applied', compact('id'));
	}

	public function getListJobAppliedDatatables($ntv_id){
		$jobs_id = Application::where('ntv_id', $ntv_id)->lists('job_id');
		$i=1;
		$page=0;
		if (Request::ajax()) {
			$page=(Input::get('iDisplayStart'));
		}
		//$sSearch=$this->vn_str_filter($sSearch);
		$ntds = Input::get('id');
		$user=AdminAuth::getUser()->username;
		/*$jobs = Job::select('id as ckid', 'id', 'vitri', 'ntd_id', 'matin', 'is_display', 'hannop', 'status', 'luotxem', 'id as ids', 'slug')->with('ntd')->addSelect;*/
		$jobs = Job::join('companies','jobs.ntd_id','=','companies.ntd_id')->select(
			'jobs.id as ckid',
		 	'jobs.id as id',
		 	'jobs.vitri as vitri',
		 	'companies.company_name as company_name',
		 	'jobs.ntd_id as ntd_id',
		 	'jobs.hannop as hannop',
		 	DB::raw('(select count(*) from order_post_rec where jobs.id = order_post_rec.job_id) as matin'),
		 	'jobs.is_display as is_display',
		 	'jobs.status as status',
		 	'jobs.luotxem as luotxem',
		 	 DB::raw('(select count(*) from application where jobs.id = application.job_id) as appcount'),
		 	'jobs.id as ids',
		 	'jobs.id as cskh',
		 	'jobs.slug as slug'
		 	)->with('ntd')->with('application')->whereIn('jobs.id', $jobs_id); 		
		//
		if($ntds) $jobs->where('jobs.ntd_id', $ntds);
		 
		return Datatables::of($jobs)	
		->edit_column('ckid','{{$ckid}}')
		->remove_column('id')
		->edit_column('vitri','<a id="edit" class="" href="{{URL::route("admin.jobs.edit1", array('.$page.',$id) )}}" title="Edit">{{$vitri}}</a> ')
		//->edit_column('vitri', '{{ HTML::link(URL::route("jobseekers.job", [$slug, $id]), $vitri, ["target"=>"_blank","title"=>"Xem tin tuyển dụng này trên trang chủ"]) }}')
		->edit_column('company_name','<a id="edit" class="" href="{{URL::route("admin.employers.edit1", array('.$page.',$id) )}}" title="Chỉnh sửa nhà tuyển dụng">{{$company_name}}</a>')
		->edit_column('ntd_id', '{{date("d-m-y",strtotime($ntd["updated_at"]))}}') // cập nhật
		->edit_column('hannop','@if((strtotime(date("d-m-Y",strtotime($hannop)))-strtotime(date("d-m-Y")))/(60*60*24) < 0)
				<span style="color:red">Hết hạn nộp</span>
			@else 
				{{date("d-m-y",strtotime($hannop))}}
			@endif')
		->edit_column('matin','
			 @if($matin==0) <a href="{{URL::route(\'admin.order.package\')}}/{{$id}}" target="_blank" title="Click vào để xem chi tiết dịch vụ của tin này">Bình thường</a>
			 @else <a href="{{URL::route(\'admin.order.package\')}}/{{$id}}" target="_blank" title="Click vào để xem chi tiết dịch vụ của tin này">VIP</a> 
			 @endif')
		->edit_column('cskh',''.$user.'')
		->edit_column('is_display', '@if($is_display==1)<span class="label label-success">Đăng ngay</span>@else <span class="label label-info">Chờ đăng</span>@endif')
		->edit_column('status', '@if($status==1)<span class="label label-success">Đã duyệt</span>@else <span class="label label-warning">Chưa duyệt</span>@endif')
		->edit_column('luotxem','{{$luotxem}}')
		->edit_column('appcount','<a target="_blank" href="{{URL::to(\'/admin/jobs/job-app\')}}?id={{$id}}">{{$appcount}}</a>')
		->edit_column('ids','
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.jobs.destroy", $id) )) }}
			<a class="btn btn-xs btn-success" title="Xem tin tuyển dụng này trên trang chủ" target="_blank" class"btn btn-xs btn-success" href="{{URL::route("jobseekers.job", [$slug, $id])}}"><i class="ace-icon fa fa-eye-slash bigger-100"></i></a>
			
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
			{{ Form::close() }}
			')
		->remove_column('slug')
		->make();
	}

}