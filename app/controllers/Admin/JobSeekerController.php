<?php

class JobSeekerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /jobseeker
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		
		$jobseekers = Sentry::findAllUsers();
		return View::make('admin.jobseekers.index', compact('jobseekers'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /jobseeker/create
	 *
	 * @return Response
	 */
	public function datatables()
	{
		$jobseekers = NTV::select('id', 'username', 'ntv_email', 'ntv_hoten', 'created_at', 'activated', 'id as ids');
		return Datatables::of($jobseekers)
		->edit_column('activated', '@if($activated==true)<span class="label label-success">Kích hoạt</span>@else <span class="label label-info">Không kích hoạt</span>@endif')
		->edit_column('ids', '
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.jobseekers.destroy", $id) )) }}
			<a class="btn btn-sm btn-info" href="{{URL::route("admin.jobseekers.edit", array($id) )}}" title="Edit"><i class="glyphicon glyphicon-edit"></i></a> 
			<button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="glyphicon glyphicon-remove"></i></button>
			{{ Form::close() }}
			')
		->make();
	}
	public function create()
	{
		//
		$provinces = Province::lists('tentinh', 'id');
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
			$inputs['ntv_quocgia'] = 1;
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
	public function edit($id)
	{
		//
		try {
			$provinces = Province::lists('tentinh', 'id');
			$js = Sentry::findUserById($id);
			return View::make('admin.jobseekers.edit')->with('provinces', $provinces)->with('js', $js);
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
	public function update($id)
	{
		//
		$inputs = Input::all();
		$rules = array(
			'username'				=>	'required|min:4|max:32|unique:ntv_info,username,'.$id,
			'ntv_email'				=>	'required|email|unique:ntv_info,ntv_email,'.$id,
			'ntv_hoten'				=>	'required|min:3',
			'password'				=>	'min:3',
			'ntv_ngaysinh'			=>	'date_format:Y-m-d',
			'ntv_gioitinh'			=>	'in:1,2,3',
			'ntv_tinhtranghonnhan'	=>	'in:1,2',
			'activated'				=>	'in:0,1',
		);
		 $messages = array(
			'username.required'	=>	'Username không được để trống.',
			'ntv_email.required'	=>	'Email không được để trống.',
			'password.required'	=>	'Mật khẩu không được để trống.',
			'ntv_hoten.required'	=>	'Họ tên không được để trống.',
			'email'		=>	'Email không đúng định dạng.',
			'unique'	=>	':attribute đã tồn tại, vui lòng chọn tên khác',
			'username.min'		=>	'Username tối thiểu là :min kí tự.',
			'ntv_hoten.min'		=>	'Họ tên tối thiểu là :min kí tự.',
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
			$user = NTV::find($id);
			
			if($user)
			{
				foreach ($inputs as $key => $value) {
					$user->$key = $value;
				}
				$user->save();
				return Redirect::route('admin.jobseekers.index')->with('success', 'Lưu thông tin thành công !');
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
	public function destroy($id)
	{
		//
		$user = NTV::find($id);
		$user->delete();
		return Redirect::back()->with('success', 'Xóa thành công !');
	}

}