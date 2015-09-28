<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		/*var_dump(AdminAuth::check_permissions("ntv_full")); check quyền hạn
		 die();*/
		$ntdLogin = NTD::whereRaw("DATE_FORMAT(last_login, '%Y-%m-%d') = '".date('Y-m-d')."'")->count();
		$totalNTD = NTD::count();
		$ntvLogin = NTV::whereRaw("DATE_FORMAT(last_login, '%Y-%m-%d') = '".date('Y-m-d')."'")->count();
		$totalNTV = NTV::count();
		$jobApproval = Job::where('status', 2)->count();
		$cvApproval = Resume::where('trangthai', 2)->count();
		$totalPost = TrainingPost::whereIn('id', array(10,11,12))->count();
		$totalTraining = Training::count();
		$totalDoc = TrainingDocument::count();

		return View::make('admin.dashboard', compact('ntdLogin', 'ntvLogin', 'jobApproval', 'cvApproval', 'totalNTD', 'totalNTV', 'totalPost', 'totalTraining', 'totalDoc'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		echo "edit";
		return "edit";
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		return "saved";
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		return "Delete";
	}


}
