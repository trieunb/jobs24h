<?php
use App\DTT\Forms\AdminNTDCreate;
class AJobController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /employer
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$ntd_id = Input::get('id');
		return View::make('admin.jobs.index', compact('id'));
	}
	public function datatables()
	{
		$ntds = Input::get('id');
		$jobs = Job::select('id as ckid', 'id', 'ntd_id', 'matin', 'vitri', 'is_display', 'hannop', 'status', 'luotxem', 'id as ids', 'slug')->with('ntd');
		if($ntds) $jobs->where('ntd_id', $ntds);
		return Datatables::of($jobs)
		->edit_column('ckid', '<th class="center">
						<label class="pos-rel">
							<input type="checkbox" class="ace" />
							<span class="lbl"></span>
						</label>
					</th>
')
		->edit_column('is_display', '@if($is_display==1)<span class="label label-success">Đang hiển thị</span>@else <span class="label label-info">Đang ẩn</span>@endif')
		->edit_column('status', '@if($status==1)<span class="label label-primary">Đã duyệt</span>@else <span class="label label-warning">Chưa duyệt</span>@endif')
		->edit_column('ntd_id', '{{ HTML::link(URL::route("admin.employers.edit", $ntd_id), $ntd["email"]) }}')
		->edit_column('vitri', '{{ HTML::link(URL::route("jobseekers.job", [$slug, $id]), $vitri, ["target"=>"_blank"]) }}')
		->edit_column('ids', '
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.jobs.destroy", $id) )) }}
			<a class="btn btn-xs btn-info" href="{{URL::route("admin.jobs.edit", array($id) )}}" title="Edit"><i class="ace-icon fa fa-pencil bigger-120"></i></a> 
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
			{{ Form::close() }}
			')
		->make();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /employer/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('admin.jobs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /employer
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$validator = new App\DTT\Forms\EmployerAddJob;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$data = Input::all();
			unset($data['_token']);
			unset($data['thuongluong']);
			$ntd_nganhnghe = $data['ntd_nganhnghe']; unset($data['ntd_nganhnghe']);
			$ntd_diadiem = $data['ntd_diadiem']; unset($data['ntd_diadiem']);
			$data['ntd_id'] = NTD::orderBy('id', 'asc')->first()->id;
			//$data['is_display'] = (Input::get('status')==2)?1:0;
			$data['slug'] = Str::slug(Input::get('vitri'));
			$data['keyword_tags'] = json_encode($data['keyword_tags']);
			$matin = Job::orderBy('matin', 'desc')->first();
			if($matin) $matin = $matin->matin;
			else $matin = 100000;
			$data['matin'] = $matin + 1;
			$data['is_display'] = 1;
			
			$hinhanh = array();

			$job = new Job;
			foreach ($data as $key => $value) {
				$job->$key = $value;
			}
			try {
				$job->save();
				$location = array();
				foreach ($ntd_diadiem as $k=>$val) {
					$location[$k] = new WorkLocation;
					$location[$k]->job_id = $job->id;
					$location[$k]->mt_type = 2;
					$location[$k]->province_id = $val;
				}
				$save1 = $job->province()->saveMany($location);

				$category = array();
				foreach ($ntd_nganhnghe as $k=>$val) {
					$category[$k] = new CVCategory;
					$category[$k]->job_id = $job->id;
					$category[$k]->mt_type = 2;
					$category[$k]->cat_id = $val;
				}
				$save2 = $job->category()->saveMany($category);
				if($save1 && $save2)
				{
					return Redirect::route('admin.jobs.index')->with('success', 'Đăng tin thành công !');
				} else {
					return Redirect::back()->withInput()->withErrors('Lỗi');
				}
			} catch (Exception $e) {
				return Redirect::back()->withInput()->withErrors('Lỗi khi add !');
			}

		}
	}

	/**
	 * Display the specified resource.
	 * GET /employer/{id}
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
	 * GET /employer/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$job = Job::find($id);
		if(!$job) return Response::make('Không tìm thấy tin đăng');
		return View::make('admin.jobs.edit', compact('job'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /employer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();
		$validator = new App\DTT\Forms\EmployerAddJob;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$data = Input::all();
			unset($data['_token']);
			unset($data['_method']);
			unset($data['thuongluong']);
			$ntd_nganhnghe = $data['ntd_nganhnghe']; unset($data['ntd_nganhnghe']);
			$ntd_diadiem = $data['ntd_diadiem']; unset($data['ntd_diadiem']);
			$data['keyword_tags'] = json_encode($data['keyword_tags']);
			
			unset($data['show_auto_reply']);
			unset($data['letter_auto']);
			//dd($data);
			$job = Job::where('id', $id)->first();
			if( ! $job) return Redirect::route('admin.jobs.index')->withErrors('Không tìm thấy công việc.');
			foreach ($data as $key => $value) {
				$job->$key = $value;
			}
			try {
				
				$job->updateLocation($job->id, $ntd_diadiem);
				$job->updateCategory($job->id, $ntd_nganhnghe);
				$job->save();

				return Redirect::route('admin.jobs.index')->with('success', 'Đã lưu các thay đổi !');
				
			} catch (Exception $e) {
				return Redirect::back()->withInput()->withErrors('Lỗi khi save !');
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /employer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$job = Job::where('id', $id)->delete();
		return Redirect::back()->withSuccess('Xóa tin đăng thành công');
	}
	public function getReport()
	{
		$totalJobs = Job::count();
		$totalWaiting = Job::where('status', 2)->where('vip_from', '0000-00-00')->count();
		$totalVipWaiting = Job::where('status', 2)->where('vip_from', '<>', 0)->count();
		$totalVipExpring = Job::whereRaw('vip_to >= CURDATE() - INTERVAL 7 DAY AND vip_to >= CURDATE()')->where('vip_from', '<>', '0000-00-00')->count();
		$totalVipExp = Job::whereRaw('vip_to <= CURDATE()')->where('vip_to', '<>', '0000-00-00')->count();
		return View::make('admin.jobs.report', compact('totalJobs', 'totalWaiting', 'totalVipWaiting', 'totalVipExpring', 'totalVipExp'));
	}
	public function getWaiting()
	{
		$jobs = Job::where('status', 2)->with(array('ntd' => function($q){$q->with('company');} ))->where('vip_from', '0000-00-00')->paginate(10);
		return View::make('admin.jobs.waiting', compact('jobs'));
	}
	public function postWaiting()
	{
		if(Input::get('action') == 'accept')
		{
			if(count(Input::get('jobids')))
			{
				$check = Job::whereIn('id', Input::get('jobids'))->update(['status'=> 1]);
			}
		} else {
			if(count(Input::get('jobids')))
			{
				$check = Job::whereIn('id', Input::get('jobids'))->update(['status'=> 3]);
			}
		}
		return Redirect::back()->withSuccess('Thay đổi thành công');
	}
	public function getEditWaiting()
	{

	}
	public function getVipWaiting()
	{
		$jobs = Job::where('status', 2)->where('vip_from', '<>', 0)->with(array('ntd' => function($q){$q->with('company');} ))->paginate(10);
		return View::make('admin.jobs.vipwaiting', compact('jobs'));
	}
	public function getVipExp()
	{
		$jobs = Job::where('vip_from', '<>', 0)->with(array('ntd' => function($q){$q->with('company');} ))->whereRaw('vip_to >= CURDATE() - INTERVAL 7 DAY AND vip_to >= CURDATE()')->paginate(10);
		return View::make('admin.jobs.vipexp', compact('jobs'));
	}
	public function postAjax()
	{
		extract($_REQUEST);
		if($action == 'accept_job')
		{
			$job = Job::where('id', $jobid)->update(['status'=>$status]);
			return json_encode(['has'=>true]);
		}
	}

}