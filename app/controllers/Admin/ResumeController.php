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

		$resumes = Resume::select('ntv_cv.id', 'ntv_hosomacdinh', 'ntv_cv.created_at', 'ntv_cv.updated_at', 'ntv_hoten', 'ntv_email', 'provinces.tentinh', 'ntv_id')
		->leftJoin('ntv_info', 'ntv_info.id', '=', 'ntv_id')
		->leftJoin('ntv_work_locations', 'ntv_work_locations.ntvcv_id', '=', 'ntv_cv.id')
		->leftJoin('provinces', 'provinces.id', '=', 'ntv_work_locations.province_id')
		->with('location');
		return Datatables::of($resumes)
		->edit_column('ntv_hosomacdinh', '@if($ntv_hosomacdinh==1)
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
		$certificate = Config::get('custom_bangcap.bang_cap', 1);
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
		$bang_cap = Config::get('custom_bangcap.bang_cap');
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