<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.users.index');
	}

	public function datatables()
	{
		$users = AdminUser::select('id as ckid', 'id', 'username', 'email', 'created_at', 'id as ids','permissions as per');
		$stt = 1;
		return Datatables::of($users)
		->edit_column('username','<a title="Bấm vào đây để chỉnh sửa" href="{{URL::route("admin.users.edit", array($id) )}}">{{$username}}</a>')
		->edit_column('ckid', '<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
')

		->edit_column('ids', '
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.users.destroy", $id) )) }}
			<a class="btn btn-xs btn-info" href="{{URL::route("admin.users.edit", array($id) )}}" title="Edit"><i class="glyphicon glyphicon-edit"></i></a> 
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Bạn có muốn xóa user này ?\');" type="submit" title="Delete"><i class="glyphicon glyphicon-remove"></i></button>
			{{ Form::close() }}
			')
		->edit_column('per','@foreach(json_decode($per) as $key=>$val)
									@if($val=="admin_full") 
										<p style="font-size: 11px; margin: 0px;">- Quản lý admin</p>
									@elseif($val=="ntv_full")
										<p style="font-size: 11px; margin: 0px;">- Quản lý người tìm việc</p>
									@elseif($val=="ntd_full")
										<p style="font-size: 11px; margin: 0px;">- Quản lý nhà tuyển dụng</p>
									@elseif($val=="train_full")
										<p style="font-size: 11px; margin: 0px;">- Quản lý mục đào tạo</p>
									@elseif($val=="culd_full")
										<p style="font-size: 11px; margin: 0px;">- Quản lý mục cung ứng lao động</p>
									@elseif($val=="news_full")
										<p style="font-size: 11px; margin: 0px;">- Quản lý mục tin tức</p>
									@elseif($val=="hiring_full")
										<p style="font-size: 11px; margin: 0px;">- Quản lý Cẩm nang việc làm</p>
									@endif

							@endforeach')
		->make();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$total_ntv_not_share=NTV::whereAdminInfoId(0)->count();	
		$total_ntd_not_share=NTD::whereAdminInfoId(0)->count();
		return View::make('admin.users.create',	compact('total_ntd_not_share','total_ntv_not_share'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	 	
 		 
		$params = Input::only('username', 'email', 'password','permission');
		$validator = new App\DTT\Forms\AdminUserCreate;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {


			//var_dump(isset($params['permission']));
			$params['permission'] = isset($params['permission'])?$params['permission']:array();
			 
			$params['permissions'] = json_encode($params['permission']);
			 
			unset($params['permission']);
			$params['password'] = DTT\Sentry\Hashing\Sha256Hasher::hash($params['password']);
			$user = AdminUser::create($params);
			if($user)
			{
				if (Input::get('num_ntd')) {
					 $insert_num_ntd=NTD::whereAdminInfoId(0)->take(Input::get('num_ntd'))->update(array('admin_info_id' => $user->id));
				}
				return Redirect::route('admin.users.index')->with('success', 'Tạo mới quản trị thành công.');
			} else {
				return Redirect::back()->withInput()->withErrors('Có lỗi khi thêm mới quản trị viên.');
			}
		}
	}

	/**
	 * Display the specified resource.
	 * GET /user/{id}
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
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	    $user = AdminAuth::findUserById($id);
	    if($user === false) {
	    	return Response::make('User was not found !', 404);
	    } else {
	    	$total_ntv_not_share=NTV::whereAdminInfoId(0)->count();	
			$total_ntd_not_share=NTD::whereAdminInfoId(0)->count();
			$total_ntv_share=NTV::whereAdminInfoId($id)->count();
			$total_ntd_share=NTD::whereAdminInfoId($id)->count();
	    	return View::make('admin.users.edit', compact('user','total_ntv_not_share','total_ntd_not_share','total_ntd_share','total_ntv_share'));
	    }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		/*var_dump(Input::get('num_ntd'));
		die();*/
		$req = Input::only('username', 'email', 'password', 'permission');
		$json = json_encode($req['permission']);
		 
		$user = AdminAuth::findUserById($id);

		if( ! $user)
		{
			return Redirect::back()->withErrors('User không tìm thấy !');
		}
		$validator = new App\DTT\Forms\AdminUserSave;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$check = AdminUser::where('username', '=', $req['username'])->where('id', '<>', $id)->first();
			if(count($check) != 0)
			{
				return Redirect::back()->withInput()->withErrors('Username đã tồn tại');
			}
			$user->username = $req['username'];
			$user->email = $req['email'];
			$user->permissions = $json;
			if($req['password'] != NULL) $user->password = DTT\Sentry\Hashing\Sha256Hasher::hash($req['password']);
			if($user->save())
			{

				if (Input::get('num_ntd')) {
					 $insert_num_ntd=NTD::whereAdminInfoId(0)->take(Input::get('num_ntd'))->update(array('admin_info_id' => $id));
				}
				if (Input::get('num_ntv')) {
					 $insert_num_ntd=NTV::whereAdminInfoId(0)->take(Input::get('num_ntv'))->update(array('admin_info_id' => $id));
				}
				return Redirect::route('admin.users.index')->with('success', 'Lưu thông tin thành công !');
			}
			return Redirect::back()->withInput()->withErrors('Lỗi khi cập nhật');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$user = AdminAuth::findUserById($id);
		$insert_num_ntd=NTD::whereAdminInfoId($id)->update(array('admin_info_id' => 0));
		$insert_num_ntv=NTV::whereAdminInfoId($id)->update(array('admin_info_id' => 0));
		$user->delete();
		return Redirect::route('admin.users.index')->with('success', 'Xóa người dùng thành công !');
	}

}