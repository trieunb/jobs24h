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
		$users = User::select('id', 'username', 'first_name', 'email', 'ngaysinh', 'diachi', 'id as ids');
		$stt = 1;
		return Datatables::of($users)
		->edit_column('ids', '
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.users.destroy", $id) )) }}
			<a class="btn btn-sm btn-info" href="{{URL::route("admin.users.edit", array($id) )}}" title="Edit"><i class="glyphicon glyphicon-edit"></i></a> 
			<button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you want delete ?\');" type="submit" title="Delete"><i class="glyphicon glyphicon-remove"></i></button>
			{{ Form::close() }}
			')
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
		$user = Sentry::findUserById($id);
		$user->delete();
		return Redirect::route('admin.users.index')->with('success', 'Xóa người dùng thành công !');
	}

}