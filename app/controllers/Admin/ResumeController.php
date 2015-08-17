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
		$query = Input::all();
		if(isset($query['submit']))
		{
			$resumes = Resume::orderBy('id', 'desc')
			->whereHas('ntv', function($q) {
				if(Input::get('email') != NULL) $q->where('email', 'LIKE', "%".Input::get('email')."%");
				if(Input::get('full_name') != NULL) $q->where('first_name', "%".Input::get('full_name')."%");
				if(Input::get('phone_number') != NULL) $q->where('phone_number', "%".Input::get('phone_number')."%");
				if(is_numeric(Input::get('gender') ) )  $q->where('gender', Input::get('gender'));
				if(Input::get('date_of_birth') != NULL) $q->where('date_of_birth', Input::get('date_of_birth'));
				if(is_numeric(Input::get('marital_status') ) != NULL) $q->where('marital_status', Input::get('marital_status'));
			});
			if(is_numeric(Input::get('work_location') ) )
			{
				$resumes->whereHas('location', function($q) {
					$q->where('province_id', Input::get('work_location'));
				});
			}
			if(is_numeric(Input::get('category') ) )
			{
				$resumes->whereHas('cvcategory', function($q) {
					$q->where('cat_id', Input::get('category'));
				});
			}
			if(is_numeric(Input::get('language') ) )
			{
				$resumes->whereHas('cvlanguage', function($q) {
					$q->where('lang_id', Input::get('language'));
				});
			}
			
			$resumes->with('ntv')
			->with(array('location'	=>	function($query) {
				$query->with('province');
			}))
			->with(array('cvcategory'	=>	function($query) {
				$query->with('category');
			}));
			if( is_numeric(Input::get('salary')) )
			{
				if(Input::get('salary') == 0)
				{
					$resumes->where('mucluong', 0);
				} else {
					$resumes->where('mucluong', '>', 0);
				}
			}
			if( is_numeric(Input::get('status')) )
			{
				$resumes->where('is_default', Input::get('status') );
			}
			if (Input::get('namkinhnghiem') != NULL) 
			{
				$resumes->where('namkinhnghiem', Input::get('namkinhnghiem'));
			}
			if( is_numeric(Input::get('education')) )
			{
				$resumes->where('bangcapcaonhat', Input::get('education') );
			}
			if( is_numeric(Input::get('level')) )
			{
				$resumes->where('capbachientai', Input::get('level') );
			}
			$resumes = $resumes->paginate(10);
			foreach ($query as $key => $value) {
				$resumes->appends(array($key => $value));
			}
		} else {
			$resumes = Resume::orderBy('id', 'desc')
			->with('ntv')
			->with(array('location'	=>	function($query) {
				$query->with('province');
			}))
			->with(array('cvcategory'	=>	function($query) {
				$query->with('category');
			}))
			->paginate(10);
		}
		
		return View::make('admin.resumes.index', compact('resumes'))->with('input', Input::all());
	}

	public function search()
	{
		$query = Input::get('query');
		if($query != '')
		{
			$result = NTV::where('email', 'LIKE', "%$query%")->limit(10)->lists('email');
			return Response::json($result);
		}
		
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
		$request = Request::all();
		$validator = new App\DTT\Forms\AdminCVCreate();
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			//return Redirect::back()->withInput();
			if (count($request['ntv_noilamviec']) < 1 || count($request['ntv_noilamviec']) > 3) {
				return Redirect::back()->withInput()->withErrors('Bạn phải chọn 1 đến 3 nơi làm việc');
			}
			if (count($request['ntv_nganhnghe']) < 1 || count($request['ntv_nganhnghe']) > 3) {
				return Redirect::back()->withInput()->withErrors('Bạn phải chọn 1 đến 3 nơi ngành nghề');
			}
			if(isset($request['is_mucluong'])) $request['mucluong'] = 0;
			if(isset($request['is_namkn'])) $request['namkinhnghiem'] = 0;
			
			//create a resume
			$rsData = $request;
			unset($rsData['email']);
			unset($rsData['_token']);
			unset($rsData['ntv_noilamviec']);
			unset($rsData['ntv_nganhnghe']);
			$rsData['ntv_id'] = NTV::where('email', '=', $request['email'])->first()->id;
			$resume = Resume::create($rsData);
			if($resume) {
				//create work places
				$wp = array();
				foreach ($request['ntv_noilamviec'] as $key => $value) {

					$wp[] = array(
						'rs_id'	=>	$resume->id,
						'mt_type'	=>	1, //1: resume, 2: jobs
						'province_id'	=>	$value
					);
				}
				
				$create = WorkLocation::insert($wp);

				$cat = array();
				foreach ($request['ntv_nganhnghe'] as $key => $value) {
					$cat[] = array(
						'rs_id'	=>	$resume->id,
						'mt_type'	=>	1, //1: resume, 2: jobs
						'cat_id'	=>	$value
					);
				}
				CVCategory::insert($cat);
				return Redirect::route('admin.resumes.index')->with('success', 'Tạo mới hồ sơ thành công !');
			} else {
				return Redirect::back()->withInput()->withErrors('Có lỗi khi tạo hồ sơ !');
			}
			
		}
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
		$resume = Resume::find($id);
		if( ! $resume)
		{
			return Redirect::route('admin.resumes.index')->withErrors('CV không tìm thấy !');
		}
		return View::make('admin.resumes.edit', compact('resume'));
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
		$resume = Resume::with('location')->find($id);
		if( ! $resume)
		{
			return Redirect::route('admin.resumes.index')->withErrors('CV không tìm thấy !');
		}
		//validate
		$validator = new App\DTT\Forms\AdminCVCreate;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$request = Input::all();
			$ntv = NTV::where('email', Input::get('email'))->first();
			if(!$ntv)
			{
				return Redirect::back()->withInput()->withErrors('Email không tìm thấy !');
			}
			$resume->ntv_id = $ntv->id;
			if(isset($request['is_mucluong'])) {$request['mucluong'] = 0;unset($request['is_mucluong']);}
			if(isset($request['is_namkn'])) {$request['namkinhnghiem'] = 0;unset($request['is_namkn']);}
			if(empty($request['trangthai'])) $request['trangthai'] = 0;
			if(empty($request['is_default'])) $request['is_default'] = 0;
			if(empty($request['is_visible'])) $request['is_visible'] = 0;
			if(empty($request['is_public'])) $request['is_public'] = 0;
			unset($request['email']);
			unset($request['_token']);
			unset($request['_method']);
			//update location
			if(Input::get('ntv_noilamviec') != $resume->location->lists('province_id'))
			{
				$resume->updateLocation($resume->id, Input::get('ntv_noilamviec'));
			}
			if(Input::get('ntv_nganhnghe') != $resume->cvcategory->lists('cat_id'))
			{
				$resume->updateCategory($resume->id, Input::get('ntv_nganhnghe'));
			}
			unset($request['ntv_noilamviec']);
			unset($request['ntv_nganhnghe']);
			foreach ($request as $key => $value) {
				$resume->$key = $value;
			}
			if($resume->save())
			{
				return Redirect::route('admin.resumes.index')->with('success', 'Lưu thông tin thành công !');
			} else {
				return Redirect::back()->withInput()->withErrors('Có lỗi khi lưu dữ liệu !');
			}
		}

		
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

	public function getReport()
	{
		return View::make('admin.comming');
	}
	public function getNotActive()
	{
		return View::make('admin.comming');
	}
	public function getEditActive()
	{
		return View::make('admin.comming');
	}

}