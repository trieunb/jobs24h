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
		$jobseekers = NTV::select('id as ckid', 'id', 'email', 'first_name', 'last_name', 'created_at', 'activated', 'id as ids');
		return Datatables::of($jobseekers)
		->edit_column('ckid', '<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
')
		->edit_column('first_name', '{{ $first_name }} {{ $last_name }} ')
		->remove_column('last_name')
		->edit_column('activated', '@if($activated==true)<span class="label label-success">Kích hoạt</span>@else <span class="label label-info">Không kích hoạt</span>@endif')
		->edit_column('ids', '
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.jobseekers.destroy", $id) )) }}
			<a class="btn btn-xs btn-info" href="{{URL::route("admin.jobseekers.edit", array($id) )}}" title="Edit"><i class="ace-icon fa fa-pencil bigger-120"></i></a> 
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
			{{ Form::close() }}
			')
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
	public function edit($id)
	{
		//
		try {
			$provinces = Province::lists('province_name', 'id');
			$js = Sentry::findUserById($id);
			$cvlist = Resume::where('ntv_id', '=', $js->id)->get();
			return View::make('admin.jobseekers.edit', compact('cvlist'))->with('provinces', $provinces)->with('js', $js);
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
			'email'				=>	'required|email|unique:jobseekers,email,'.$id,
			'first_name'				=>	'required|min:3',
			'last_name'				=>	'required|min:3',
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