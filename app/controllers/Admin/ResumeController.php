<?php

class ResumeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /resume
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		
		return View::make('admin.resumes.index');
	}

	public function datatables()
	{

		$resumes = Resume::select('resumes.id', 'is_default', 'resumes.created_at', 'resumes.updated_at', 'full_name', 'email', 'provinces.province_name', 'ntv_id')
		->leftJoin('jobseekers', 'jobseekers.id', '=', 'ntv_id')
		->leftJoin('mt_work_locations', 'mt_work_locations.rs_id', '=', 'resumes.id')
		->leftJoin('provinces', 'provinces.id', '=', 'mt_work_locations.province_id')
		->with('location');
		return Datatables::of($resumes)
		->edit_column('is_default', '@if($is_default==1)
			<span class="label label-success">HS Chính</span>
			@else 
			<span class="label label-info">HS Phụ</span>
			@endif')
		->remove_column('ntv', 'ntv_id', 'location')
		->add_column('action', '
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.resumes.destroy", $id) )) }}
			<a class="btn btn-sm btn-info" href="{{URL::route("admin.resumes.edit", array($id) )}}" title="Edit"><i class="glyphicon glyphicon-edit"></i></a> 
			<button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="glyphicon glyphicon-remove"></i></button>
			{{ Form::close() }}
			')
		->make();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /resume/create
	 *
	 * @return Response
	 */
	public function create($userId = false)
	{
		//
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
	public function edit($id)
	{
		//

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /resume/{id}
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
	 * DELETE /resume/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
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

}