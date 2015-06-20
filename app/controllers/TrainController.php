<?php

class TrainController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /training
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$data=Training::join('training_people as tp','tp.id','=','training.teacher_id')->select(array('training.*','tp.name as name_teacher'))->get();

		 return View::make('admin.training.index')->with('data',$data);
	}

	public function getEditCouser($id) // chỉnh sửa các khóa học
	{
		//return $id;
		$data=Training::where('training.id','=',$id)->join('training_people as tp','tp.id','=','training.teacher_id')->select(array('training.*','tp.name as name_teacher','tp.id as teacher_id'))->get();
		$teacher=TrainingPeople::where('training_roll_id','=',1)->lists('name','id');



		return View::make('admin.training.editcouser')->with(array('data'=>$data,'teacher'=>$teacher));
	}


	public function postEditCouser($id)
	{
		var_dump(Input::get());
	}
	/**
	 * Show the form for creating a new resource.
	 * GET /training/create
	 *
	 * @return Response
	 */
	public function create()
	{
		 
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /training
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /training/{id}
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
	 * GET /training/{id}/edit
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
	 * PUT /training/{id}
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
	 * DELETE /training/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}