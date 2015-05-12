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

		$resumes = Resume::orderBy('id', 'desc');
		
		return $resumes;
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