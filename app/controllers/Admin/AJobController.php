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
		$job_total=Job::count();
		$job_not_active=Job::where('status','<>',1)->count(); // tin chưa duyệt
		$job_active=Job::whereStatus(1)->count();
		return View::make('admin.jobs.index', compact('job_total','job_not_active','job_active','id'));
	}
	public function datatables()
	{
		$i=1;
		$page=0;
		if (Request::ajax()) {
			$page=(Input::get('iDisplayStart'));
		}
		//$sSearch=$this->vn_str_filter($sSearch);
		$ntds = Input::get('id');
		$user=AdminAuth::getUser()->username;
		/*$jobs = Job::select('id as ckid', 'id', 'vitri', 'ntd_id', 'matin', 'is_display', 'hannop', 'status', 'luotxem', 'id as ids', 'slug')->with('ntd')->addSelect;*/
		$jobs = Job::join('companies','jobs.ntd_id','=','companies.ntd_id')->select(
			'jobs.id as ckid',
		 	'jobs.id as id',
		 	'jobs.vitri as vitri',
		 	'companies.company_name as company_name',
		 	'jobs.ntd_id as ntd_id',
		 	'jobs.hannop as hannop',
		 	DB::raw('(select count(*) from order_post_rec where jobs.id = order_post_rec.job_id) as matin'),
		 	'jobs.is_display as is_display',
		 	'jobs.status as status',
		 	'jobs.luotxem as luotxem',
		 	 DB::raw('(select count(*) from application where jobs.id = application.job_id) as appcount'),
		 	'jobs.id as ids',
		 	'jobs.id as cskh',
		 	'jobs.slug as slug'
		 	)->with('ntd')->with('application'); 		
		//
		if($ntds) $jobs->where('jobs.ntd_id', $ntds);
		 
		return Datatables::of($jobs)	
		->edit_column('ckid','{{$ckid}}')
		->remove_column('id')
		->edit_column('vitri','<a id="edit" class="" href="{{URL::route("admin.jobs.edit1", array('.$page.',$id) )}}" title="Edit">{{$vitri}}</a> ')
		//->edit_column('vitri', '{{ HTML::link(URL::route("jobseekers.job", [$slug, $id]), $vitri, ["target"=>"_blank","title"=>"Xem tin tuyển dụng này trên trang chủ"]) }}')
		->edit_column('company_name','<a id="edit" class="" href="{{URL::route("admin.employers.edit1", array('.$page.',$id) )}}" title="Chỉnh sửa nhà tuyển dụng">{{$company_name}}</a>')
		->edit_column('ntd_id', '{{date("d-m-y",strtotime($ntd["updated_at"]))}}') // cập nhật
		->edit_column('hannop','@if((strtotime(date("d-m-Y",strtotime($hannop)))-strtotime(date("d-m-Y")))/(60*60*24) < 0)
				<span style="color:red">Hết hạn nộp</span>
			@else 
				{{date("d-m-y",strtotime($hannop))}}
			@endif')
		->edit_column('matin','
			 @if($matin==0) <a href="{{URL::route(\'admin.order.package\')}}/{{$id}}" target="_blank" title="Click vào để xem chi tiết dịch vụ của tin này">Bình thường</a>
			 @else <a href="{{URL::route(\'admin.order.package\')}}/{{$id}}" target="_blank" title="Click vào để xem chi tiết dịch vụ của tin này">VIP</a> 
			 @endif')
		->edit_column('cskh',''.$user.'')
		->edit_column('is_display', '@if($is_display==1)<span class="label label-success">Đăng ngay</span>@else <span class="label label-info">Chờ đăng</span>@endif')
		->edit_column('status', '@if($status==1)<span class="label label-primary">Đã duyệt</span>@else <span class="label label-warning">Chưa duyệt</span>@endif')
		->edit_column('luotxem','{{$luotxem}}')
		->edit_column('appcount','<a target="_blank" href="{{URL::to(\'/admin/jobs/job-app\')}}?id={{$id}}">{{$appcount}}</a>')
		->edit_column('ids','
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.jobs.destroy", $id) )) }}
			<a class="btn btn-xs btn-success" title="Xem tin tuyển dụng này trên trang chủ" target="_blank" class"btn btn-xs btn-success" href="{{URL::route("jobseekers.job", [$slug, $id])}}"><i class="ace-icon fa fa-eye-slash bigger-100"></i></a>
			
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
			{{ Form::close() }}
			')
		->remove_column('slug')
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
			$data['status']=2;
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
	public function getEdit1($page,$id)
	{
		//
		
		$job = Job::whereId($id)->with(array('ntd'=>function($q)
			{
				$q->with('company');
			}))->first();

		if(!$job) return Response::make('Không tìm thấy tin đăng');
		return View::make('admin.jobs.edit', compact('job','page'));
	}

	public function edit($id)
	{
		//
		$page;
		$job = Job::find($id);
		if(!$job) return Response::make('Không tìm thấy tin đăng');
		return View::make('admin.jobs.edit', compact('job','page'));
	}


	/**
	 * Update the specified resource in storage.
	 * PUT /employer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit1($page,$id)
	{

		 $page=$page;
		  
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

				return Redirect::route('admin.jobs.index',array('page'=>$page))->with('success','Đã lưu các thay đổi !');
				
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
		$order=OrderPostRec::whereJobId($id)->delete();
		return Redirect::back()->withSuccess('Xóa tin đăng thành công');
	}
	public function getDelete($id)
	{
		//
		$job = Job::where('id', $id);
		$order=OrderPostRec::whereJobId($id)->delete();
		if (!$job->delete()) {
			return Redirect::back()->withInput()->withErrors('Xóa tin không đăng thành công');
		}
		return Redirect::route('admin.jobs.index')->withSuccess('Xoá tin đăng thành công');
		
	}

	public function getReport()
	{
		$totalJobs = Job::count();
		$totalWaiting = Job::where('status','<>',1)->count();
		$totalVipWaiting=$jobs=Job::whereExists(function ($query) {
							$query->from('order_post_rec')
	                      		  ->whereRaw('order_post_rec.job_id = jobs.id');
            		  })->count();
		//$totalVipWaiting = Job::where('status', 2)->where('vip_from', '<>', 0)->count();
		$totalVipExpring = Job::whereRaw('vip_to >= CURDATE() - INTERVAL 7 DAY AND vip_to >= CURDATE()')->where('vip_from', '<>', '0000-00-00')->count();
		$totalVipExp = Job::whereRaw('vip_to <= CURDATE()')->where('vip_to', '<>', '0000-00-00')->count();
		return View::make('admin.jobs.report', compact('totalJobs', 'totalWaiting', 'totalVipWaiting', 'totalVipExpring', 'totalVipExp'));
	}
	public function getWaiting()
	{
		$job_not_active=Job::where('status','<>',1)->count(); // tin chưa duyệt
	 
		return View::make('admin.jobs.waiting', compact('job_not_active'));
		
	}
	public function datatables_waiting()
	{
		$jobs=Job::where('status','<>', 1)->join('companies','jobs.ntd_id','=','companies.ntd_id')->select(
			'jobs.id as ckid',
		 	'jobs.id as id',
		 	'jobs.vitri as vitri',
		 	'companies.company_name as company_name',
		 	'jobs.updated_at as updated_at',
		 	'jobs.hannop as hannop',
		 	'jobs.is_display as is_display',
		 	'jobs.status as status',
		 	'jobs.id as action',
		 	'jobs.id as cskh'
		 	)->with('ntd');
		$i=1;
		$page=0;
		if (Request::ajax()) {
			$page=(Input::get('iDisplayStart'));
		}
		
		$ntds = Input::get('id');
		$user=AdminAuth::getUser()->username;
		 
		//if($ntds) $jobs->where('jobs.ntd_id', $ntds);
		 
		return Datatables::of($jobs)	
		->edit_column('ckid','{{$ckid}}')
		->remove_column('id')
		->edit_column('vitri', '{{ HTML::link(URL::route(\'admin.jobs.edit1\', [0,$id]), $vitri ) }}')
		->edit_column('company_name','<a id="edit" class="" href="{{URL::route("admin.employers.edit1", array('.$page.',$id) )}}" title="Chỉnh sửa nhà tuyển dụng">{{$company_name}}</a>')
		->edit_column('updated_at', '{{date("d-m-y",strtotime($updated_at))}}') // cập nhật
		->edit_column('hannop','{{date("d-m-y",strtotime($hannop))}}')
		->edit_column('is_display', '@if($is_display==1)<span class="label label-success">Đăng ngay</span>@else <span class="label label-info">Chờ đăng</span>@endif')
		->edit_column('status', '@if($status==1)<span class="label label-primary">Đã duyệt</span>@else <span class="label label-warning">Chưa duyệt</span>@endif')
		->edit_column('action','
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.jobs.destroy", $id) )) }}
			
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
			{{ Form::close() }}
			')
		->edit_column('cskh',''.$user.'')
		->make();
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




	public function getVipWaiting()
	{
		 $jobs_count=Job::whereExists(function ($query) {
							$query->from('order_post_rec')
	                      		  ->whereRaw('order_post_rec.job_id = jobs.id');
            		  })->count();
		/*$jobs1 = Job::whereExists(function ($query) {
							$query->select('ended_date')
	                      ->from('order_post_rec')
	                      ->whereRaw('order_post_rec.job_id = jobs.id');
            		  		})
						  ->with(array('orderpostrec' => function($q1)
						  {
						  		$q1->select('*');
						  }))
						  ->with(array('ntd' => function($q)
							 {
							 	$q->with(array('company'=>function($q2)
							 	{
							 		$q2->select('*');
							 	}))->select('id','email');
							 } 
						));
						  var_dump($jobs1->get()->toArray());
						  die();*/

/*
		$query=Request::get('q');

		if($query) 
			{
				$jobs1->Where('vitri','like','%' . $query . '%')
					  ->orWhereHas('ntd',function($s) use ($query)
					  {
					  	$s->Where('email','like','%' . $query . '%')
					  	  ->orWhere('full_name','like','%' . $query . '%')
					  	  ->orWhere('address','like','%' . $query . '%');
					  	  
					  });	
						// / ->orWhere('companies.company_name','like','%' . $query . '%');
			}

		$jobs=$jobs1->paginate(10);
		 
		$pagination = $jobs->appends(array('q' => $query ))->links(); */
		//return View::make('admin.jobs.vipwaiting', compact('jobs','pagination'));
		return View::make('admin.jobs.vipwaiting',compact('jobs_count'));
	}


	public function datatables_waiting_vip()
	{
		$jobs=Job::whereExists(function ($query) {
							$query->from('order_post_rec')
	                      		  ->whereRaw('order_post_rec.job_id = jobs.id');
            		  })
					->with(array('orderpostrec' => function($q1)
						  {
						  		$q1->addSelect('*');
						  }))
					->join('employers','jobs.ntd_id','=','employers.id')
					->join('companies','jobs.ntd_id','=','companies.ntd_id')->select(
						'jobs.id as id',
						'jobs.vitri as vitri',
						'employers.id as eid',
						'companies.company_name as company_name',
						'jobs.updated_at as updated_at',
						'jobs.hannop as hannop',
						'jobs.is_display as is_display',
						'jobs.id as services',
						 'jobs.id as notes',
						 'jobs.id as action',
						 'jobs.id as cskh')  ; 
		$page=0;
		if (Request::ajax()) {
			 
			 
			$page=(Input::get('iDisplayStart'));
		}
		
		 
		$user=AdminAuth::getUser()->username;
		 
		//if($ntds) $jobs->where('jobs.ntd_id', $ntds);
		//$now=strtotime(date('d-m-Y H:i:s')); 
		return Datatables::of($jobs)
		->remove_column('eid')	
		->edit_column('id','{{$id}}')
		->edit_column('vitri','{{ HTML::link(URL::route(\'admin.jobs.edit1\', [0,$id]), $vitri ) }}')
		->edit_column('company_name','<a id="edit" class="" href="{{URL::route("admin.employers.edit1", array('.$page.',$eid) )}}" title="Chỉnh sửa nhà tuyển dụng">{{$company_name}}</a>
			')
		->edit_column('updated_at','{{date("d-m-y",strtotime($updated_at))}}')
		->edit_column('hannop','
			@if((strtotime(date("d-m-Y",strtotime($hannop)))-strtotime(date("d-m-Y")))/(60*60*24) < 0)
				<span style="color:red">Hết hạn nộp</span>
			@else 
				{{date("d-m-y",strtotime($hannop))}}
			@endif
			')
		->edit_column('is_display','@if($is_display==1)<span class="label label-success">Đăng ngay</span>@else <span class="label label-info">Chờ đăng</span>@endif')
		->edit_column('services','<a href="{{URL::route(\'admin.order.package\')}}/{{$id}}" target="_blank" title="Click vào để xem chi tiết dịch vụ của tin này">Xem chi tiết</a>')
		->edit_column('notes','
			@foreach($orderpostrec as $order)
				@if((strtotime(date("d-m-Y H:i:s",strtotime($order["ended_date"])))-strtotime(date("d-m-Y H:i:s")))/(60*60*24) < 7 && (strtotime(date("d-m-Y H:i:s",strtotime($order["ended_date"])))-strtotime(date("d-m-Y H:i:s")))/(60*60*24)>0)
							 <span style="color:orange"> Có dịch vụ gần hết hạn </span> 
							 <?php   break;?>
							@elseif((strtotime(date("d-m-Y H:i:s",strtotime($order["ended_date"])))-strtotime(date("d-m-Y H:i:s")))/(60*60*24) < 0) 
								<span style="color:red"> Có dịch vụ hết hạn </span>
							  <?php   break;?>
							@else
				@endif 
						 
			@endforeach
			')
		->edit_column('cskh',''.$user.'')
		->edit_column('action','<a class="btn btn-xs btn-danger" href="#" onclick="return confirm(\'Bạn có chắc muốn xóa ?\');" title="Delete"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>')
		->make();
	}



	public function getJobApp()
	{
		 
		return View::make('admin.jobs.cvapp');
	}

	public function datatables_cvapp()
	{

		$id=Input::get('id');
		$user=AdminAuth::getUser()->username;
		$cv=Application::join('resumes','application.cv_id','=','resumes.id')
						->join('jobs','application.job_id','=','jobs.id')
						->join('jobseekers','application.ntv_id','=','jobseekers.id')
						->select('resumes.id as rid','jobs.id as jid','application.id as appid','resumes.tieude_cv as tieude_cv','jobseekers.first_name as first_name','jobseekers.last_name as last_name','application.apply_date as apply_date','resumes.trangthai as trangthai','application.id as thaotac','application.id as cskh');
		if($id) $cv->whereJobId($id);
		return Datatables::of($cv)
		->remove_column('rid')
		->remove_column('jid')
		->edit_column('tieude_cv','<a href="{{URL::route("admin.resumes.edit",$rid)}}">{{$tieude_cv}}</a>')
		->edit_column('first_name','{{$first_name}} {{$last_name}}')
		->edit_column('trangthai','@if($trangthai==1) Đã kích hoạt @else Chưa kích hoạt @endif')
		->edit_column('thaotac','<a href="{{URL::route("admin.jobs.deleteapp",array($rid,$jid))}}">Xóa</a>')
		->remove_column('last_name')
		->edit_column('cskh',''.$user.'')
		->make();
	}
	public function getDeleteApp($cv_id,$job_id)
	{
		$del=Application::whereCvId($cv_id)->whereJobId($job_id);
		if ($del->delete()) {
			return Redirect::back()->withSuccess('Xóa thành công');
		}
		else return Redirect::back()->withErrors('Xóa thất bại');
	}
				
	public function postSendMail()
	{

		Mail::send('admin.jobs.sendmail', array('send_email'=> Input::get('email'),'company'=>Input::get('company'), 'vitri'=>Input::get('post'),'content'=>Input::get('content')), function($message){
				$message->from(AdminAuth::getUser()->email, AdminAuth::getUser()->username);
		        $message->to(Input::get('email'), Input::get('email'))->subject(Input::get('title'));
		    	});
				return Redirect::back()->with('success', 'Đã gửi email đến nhà tuyển dụng thành công');
	}
	

}