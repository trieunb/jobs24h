<?php 
namespace NTD;
use View, Redirect, Input, Job, CVCategory, WorkLocation, Auth, Config, Str, File, Company,RespondAuto, Response;
use App\DTT\Forms\EmployerAddJob, RespondLetter;
class JobController extends \Controller {
	
	public function __construct()
	{
		$jobs = Job::where('ntd_id', Auth::id())
		->orderBy('id', 'desc')
		->get();
		$job_count['active'] = $job_count['expiring'] = $job_count['inactive'] = $job_count['isapply'] = $job_count['expired'] = $job_count['all'] = 0;
		foreach ($jobs as $job) {
			$job_count['all'] += 1;
			if($job->is_display == 1 & $job->hannop >= date('Y-m-d')) $job_count['active'] += 1;
			if($job->is_display == 0 & $job->hannop >= date('Y-m-d')) $job_count['inactive'] += 1;
			if($job->is_display == 1 & $job->is_apply == 0) $job_count['isapply'] += 1;
			if($job->hannop < date('Y-m-d')) $job_count['expired'] += 1;
			if($job->is_display == 1 && $job->hannop >= date('Y-m-d') && $job->hannop <= date('Y-m-d', strtotime("+7 days"))) $job_count['expiring'] += 1;

		}
		View::share('job_count', $job_count);
	}
	public function getIndex()
	{
		$title = 'Tất cả việc làm';
		$jobs = Job::where('ntd_id', Auth::id())
		->orderBy('id', 'desc')
		->with(array('category'	=>	function($query) {
				$query->with('category');
		}))
		->with(array('province'	=>	function($query) {
				$query->with('province');
		}))
		->paginate(5);
		return View::make('employers.jobs.index', compact('jobs', 'title'));
	}
	public function getDangHienThi()
	{
		$title = 'Việc làm đang hiển thị';
		$jobs = Job::where('ntd_id', Auth::id())
		->orderBy('id', 'desc')
		->with(array('category'	=>	function($query) {
				$query->with('category');
		}))
		->with(array('province'	=>	function($query) {
				$query->with('province');
		}))
		->where('is_display', 1)
		->where('hannop', '>=', date('Y-m-d'))
		->paginate(5);
		return View::make('employers.jobs.index', compact('jobs', 'title'));
	}
	public function getDanhSachCho()
	{
		$title = 'Việc làm chờ đăng';
		$jobs = Job::where('ntd_id', Auth::id())
		->orderBy('id', 'desc')
		->with(array('category'	=>	function($query) {
				$query->with('category');
		}))
		->with(array('province'	=>	function($query) {
				$query->with('province');
		}))
		->where('is_display', 0)
		->where('hannop', '>=', date('Y-m-d'))
		->paginate(5);
		return View::make('employers.jobs.index', compact('jobs', 'title'));
	}
	public function getNgungNhanHs()
	{
		$title = 'Ngưng nhận hồ sơ';
		$jobs = Job::where('ntd_id', Auth::id())
		->orderBy('id', 'desc')
		->with(array('category'	=>	function($query) {
				$query->with('category');
		}))
		->with(array('province'	=>	function($query) {
				$query->with('province');
		}))
		->where('is_display', 1)
		->where('is_apply', 0)
		->paginate(5);
		return View::make('employers.jobs.index', compact('jobs', 'title'));
	}
	public function getHetHan()
	{
		$title = 'Việc làm hết hạn';
		$jobs = Job::where('ntd_id', Auth::id())
		->orderBy('id', 'desc')
		->with(array('category'	=>	function($query) {
				$query->with('category');
		}))
		->with(array('province'	=>	function($query) {
				$query->with('province');
		}))
		->where('hannop', '<', date('Y-m-d'))
		->paginate(5);
		return View::make('employers.jobs.index', compact('jobs', 'title'));
	}
	public function postAction()
	{
		$job = array();
		extract(Input::all());

		if(isset($submit))
		{
			$check = Job::whereIn('id', $job)->where('ntd_id', Auth::id())->count();
			if($check != count($job)) return Redirect::back()->withErrors('Công việc không tìm thấy !');
			$message = "";
			if($submit == 'active')
			{
				$check = Job::whereIn('id', $job)->update(array('is_display'=>1));
				\TaskLog::create(['ntd_id'=>Auth::id(), 'action_type'=>'resume_job','target'=>'Đăng lại tin tuyển dụng: '.implode(",",$job)]);
				$message = 'Đăng thành công';
			}
			if($submit == 'inactive')
			{
				$check = Job::whereIn('id', $job)->update(array('is_display'=>0));
				\TaskLog::create(['ntd_id'=>Auth::id(), 'action_type'=>'pause_job','target'=>'Ngưng hiển thị tin tuyển dụng: '.implode(",",$job)]);
				$message = 'Tạm ngừng đăng thành công';
			}
			if($submit == 'unapply')
			{
				$check = Job::whereIn('id', $job)->update(array('is_apply'=>0));
				\TaskLog::create(['ntd_id'=>Auth::id(), 'action_type'=>'pause_rs','target'=>'Ngưng nhận hồ sơ tại tin tuyển dụng: '.implode(",",$job)]);
				$message = 'Ngưng nhận hồ sơ thành công';
			}
			if($submit == 'apply')
			{
				$check = Job::whereIn('id', $job)->update(array('is_apply'=>1));
				\TaskLog::create(['ntd_id'=>Auth::id(), 'action_type'=>'resume_rs','target'=>'Mở nhận hồ sơ tại tin tuyển dụng: '.implode(",",$job)]);
				$message = 'Mở nhận hồ sơ thành công';
			}
			if($submit == 'expired')
			{
				$check = Job::whereIn('id', $job)->update(array(
						'is_apply'	=>	1,
						'hannop'	=>	\DB::raw('hannop + INTERVAL 30 DAY')
					));
				\TaskLog::create(['ntd_id'=>Auth::id(), 'action_type'=>'renew_job','target'=>'Đăng lại công việc thành công: '.implode(",",$job)]);
				$message = 'Đăng lại công việc thành công.';
			}
			if($submit == 'export')
			{
				$jobs = Job::where('ntd_id', Auth::id())->get();
				\TaskLog::create(['ntd_id'=>Auth::id(), 'action_type'=>'export_job','target'=>'Xuất danh sách công việc: '.implode(",",$job)]);
				$message = '';
				$result = array();
				if(count($jobs))
				{
					$user = Auth::getUser();
					$result[] = ["Người xuất:", $user->full_name];
					$result[] = ["Ngày Xuất Báo Cáo:", date('Y-m-d H:i:s')];
					$result[] = ["Email đăng nhập:", $user->email];
					$result[] = ["Tên Thư Mục:", "Tất cả việc làm"];
					$result[] = [" "];
					$result[] = ["STT", "Mã Số", "Chức danh", "Ngày đăng", "Ngày hết hạn", "Lượt xem", "Lượt nộp"];
					$stt = 1;
					foreach ($jobs as $key => $value) {
						$result[] = [
							$stt,
							$value->matin,
							$value->vitri,
							$value->created_at,
							$value->hannop,
							$value->luotxem,
							$value->application->count()
						];
						$stt += 1;
					}
					\Excel::create('Danh sach viec lam da dang', function($excel) use($result) {
						$excel->sheet('Jobs', function($sheet) use($result) {
					        $sheet->fromArray($result);
					    });
					})->download('xlsx');
				}
			}

			if($submit == 'delete')
			{
				$check = Job::destroy($jobs);
				\TaskLog::create(['ntd_id'=>Auth::id(), 'action_type'=>'delete_job','target'=>'Xóa tin tuyển dụng: '.implode(",",$job)]);
				$message = 'Xóa thành công';
			}
			return Redirect::back()->with('success', $message);

		}
		return Redirect::back();
	}
	public function getAction()
	{
		return Redirect::route('employers.jobs.index');
	}
	public function getSapHetHan()
	{
		$title = 'Việc làm sắp hết hạn';
		$jobs = Job::where('ntd_id', Auth::id())
		->orderBy('id', 'desc')
		->with(array('category'	=>	function($query) {
				$query->with('category');
		}))
		->with(array('province'	=>	function($query) {
				$query->with('province');
		}))
		->where('is_display', 1)
		->where('hannop', '>=', date('Y-m-d'))
		->where('hannop', '<=', date('Y-m-d', strtotime("+7 days")))
		->paginate(5);
		return View::make('employers.jobs.index', compact('jobs', 'title'));
	}

	public function getDangTuyenDung()
	{
		$order=\OrderPostRec::whereNtdId(Auth::id())->get();
		return View::make('employers.jobs.add',compact('order'));
	}
	public function postDangTuyenDung()
	{
		$validator = new EmployerAddJob;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$data = Input::all();
			unset($data['hieuung']);
			unset($data['_token']);
			unset($data['thuongluong']);
			$ntd_nganhnghe = $data['ntd_nganhnghe']; unset($data['ntd_nganhnghe']);
			$ntd_diadiem = $data['ntd_diadiem']; unset($data['ntd_diadiem']);
			$video = $data['video']; unset($data['video']);
			$data['ntd_id'] = Auth::id();
			$data['status'] = 1;
			//$data['is_display'] = (Input::get('status')==2)?1:0;
			$data['slug'] = Str::slug(Input::get('vitri'));
			$data['keyword_tags'] = json_encode($data['keyword_tags']);
			$matin = Job::orderBy('matin', 'desc')->first();
			if($matin) $matin = $matin->matin;
			else $matin = 100000;
			$data['matin'] = $matin + 1;
			if(@$data['show_auto_reply'] && is_numeric($data['letter_auto']))
			{
				$data['letter_auto_id'] = $data['letter_auto'];
			} else if($data['letter_auto'] == 'none' && @$data['show_auto_reply'])
			{
				//them thu
				if($data['subject'] && $data['content'])
				{
					$letter = RespondAuto::create([
						'ntd_id'	=>	Auth::id(),
						'created_date'	=>	date('Y-m-d'),
						'subject'	=>	$data['subject'],
						'content'	=>	$data['content'],
						'type'	=>	1,
						]);
					$data['letter_auto_id'] = $letter->id;
				} else {
					$data['letter_auto_id'] = 0;
				}
			} else {
				$data['letter_auto_id'] = 0;
			}
			unset($data['subject']);
			unset($data['content']);
			unset($data['show_auto_reply']);
			unset($data['letter_auto']);
			
			$hinhanh = array();

			for($i = 1; $i <= 3; $i++)
			{
				$hinhanh[] = $data['hinhanh'.$i]; unset($data['hinhanh'.$i]);
			}
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
					//upload file
					$filenames = array();
					foreach ($hinhanh as $key => $value) {
						if($value != NULL)
						{
							$name = Str::random(11) . '.' . File::extension($value->getClientOriginalName());
							$value->move(Config::get('app.upload_path') . 'companies/images/', $name);
							$filenames[] = $name;
						}
					}
					$company = Company::where('ntd_id', Auth::id())->first();
					$company->video_link = $video;
					$company->company_images = json_encode($filenames);
					$company->save();

					
					if(Input::get('hieuung')){
						foreach (Input::get('hieuung') as $key => $value) {
						\JobHieuung::create(
								array(
									'job_id'=>$job->id,
									'order_post_rec_id'=>$value,
									));
							  
						}
						 
					}


					return Redirect::route('employers.jobs.index')->with('success', 'Đăng tin thành công !');
				} else {
					return Redirect::back()->withInput()->withErrors('Lỗi');
				}
			} catch (Exception $e) {
				return Redirect::back()->withInput()->withErrors('Lỗi khi save !');
			}

		}
	}
	public function getSuaTinDang($id)
	{
		$job = Job::where('id', $id)->where('ntd_id', Auth::id())->first();


		$order=\OrderPostRec::whereNtdId(Auth::id())->get();

		$order_check=\JobHieuung::whereJobId($id)->lists('order_post_rec_id');
		 

		if( ! $job)
		{
			return Redirect::back()->withErrors('Không tìm thấy việc làm.');
		}
		$job->keyword_tags = json_decode($job->keyword_tags, true);
		return View::make('employers.jobs.edit', compact('job','order','order_check'));
	}
	public function postSuaTinDang($id)
	{

		 
		$validator = new EmployerAddJob;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$data = Input::all();
			unset($data['_token']);
			unset($data['hieuung']);
			unset($data['thuongluong']);
			$ntd_nganhnghe = $data['ntd_nganhnghe']; unset($data['ntd_nganhnghe']);
			$ntd_diadiem = $data['ntd_diadiem']; unset($data['ntd_diadiem']);
			$data['ntd_id'] = Auth::id();
			//$data['status'] = 1;
			//$data['is_display'] = (Input::get('status')==2)?1:0;
			$data['keyword_tags'] = json_encode($data['keyword_tags']);
			if(@$data['show_auto_reply'] && is_numeric($data['letter_auto']))
			{
				$data['letter_auto_id'] = $data['letter_auto'];
			} else if($data['letter_auto'] == 'none')
			{
				$data['letter_auto_id'] = 0;
			}
			unset($data['show_auto_reply']);
			unset($data['letter_auto']);
			//dd($data);
			$job = Job::where('ntd_id', Auth::id())->where('id', $id)->first();
			if( ! $job) return Redirect::route('employers.jobs.index')->withErrors('Không tìm thấy công việc.');
			foreach ($data as $key => $value) {
				$job->$key = $value;
			}
			try {
				
				$job->updateLocation($job->id, $ntd_diadiem);
				$job->updateCategory($job->id, $ntd_nganhnghe);
				$job->save();
				if(Input::get('hieuung')){

					$insert_hieuung	=\JobHieuung::whereJobId($job->id)->delete();
					

					foreach (Input::get('hieuung') as $key => $value) {
					\JobHieuung::create(
							array(
								'job_id'=>$job->id,
								'order_post_rec_id'=>$value,
								));
					}
				}
					 
					


				return Redirect::route('employers.jobs.index')->with('success', 'Đã lưu các thay đổi !');
				
			} catch (Exception $e) {
				return Redirect::back()->withInput()->withErrors('Lỗi khi save !');
			}

		}
	}
	public function getDelete($id)
	{
		$job = Job::where('id', $id)->where('ntd_id', Auth::id())->first();
		$del_job_hieuung=\JobHieuung::whereJobId($id)->delete();
		if($job)
		{
			Job::destroy($job->id);
		}
		return Redirect::back()->with('success', 'Xóa việc làm thành công.');
	}
	public function getTimKiem()
	{
		if(Input::get('keyword') || Input::get('noilamviec') || Input::get('ngaydang1') || Input::get('ngaydang2')
			 || Input::get('ngayhethan1') || Input::get('ngayhethan1'))
		{
			$jobs = Job::where('ntd_id', Auth::id())->with('province')->with('category');
			if(Input::get('keyword'))
			{
				$jobs->where('vitri', 'LIKE', "%".Input::get('keyword')."%");
			}
			if(is_numeric(Input::get('noilamviec')))
			{
				$jobs->whereHas('province', function($query) {
					$query->where('province_id', Input::get('noilamviec'));
				});
			} else {
				$jobs->with(array('province'	=>	function($query) {
					$query->with('province');
				}));
			}
			if( count(Input::get('nganhnghe')) )
			{
				$jobs->whereHas('category', function($query) {
					$query->whereIn('cat_id', Input::get('nganhnghe'));
				});
			} else {
				$jobs->with(array('category'	=>	function($query) {
					$query->with('category');
				}));
			}
			if(Input::get('ngaydang1'))
			{
				$jobs->whereRaw('YEAR(created_at)>='.date("Y",strtotime(Input::get('ngaydang1'))).' AND 
					MONTH(created_at)>='.date("m",strtotime(Input::get('ngaydang1'))).' AND
					DAY(created_at)>='.date("d",strtotime(Input::get('ngaydang1'))).'
					' );
			}
			if(Input::get('ngaydang2'))
			{
				$jobs->whereRaw('YEAR(created_at)<='.date("Y",strtotime(Input::get('ngaydang2'))).' AND 
					MONTH(created_at)<='.date("m",strtotime(Input::get('ngaydang2'))).' AND
					DAY(created_at)<='.date("d",strtotime(Input::get('ngaydang2'))).'
					' );
			}
			if(Input::get('ngayhethan1'))
			{
				$jobs->where('hannop', '>=', Input::get('ngayhethan1') );
			}
			if(Input::get('ngayhethan2'))
			{
				$jobs->where('hannop', '<=', Input::get('ngayhethan2') );
			}

			$jobs = $jobs->paginate(5);
			foreach (Input::all() as $key => $value) {
				$jobs->appends(array($key => $value));
			}

		} else {
			return Redirect::route('employers.jobs.index');
		}
		$title = 'Tìm kiếm việc làm';
		$input = Input::all();
		return View::make('employers.jobs.index', compact('jobs', 'title', 'input'));
	}
	public function postAjax()
	{
		if(Input::get('action') == 'getLetter')
		{
			$letter = RespondAuto::where('ntd_id', Auth::id())->where('id', Input::get('letterId'))->first();
			if( ! $letter)
			{
				return Response::json(['has'=>false, 'message'=>'Không tìm thấy thư']);
			} else {
				return Response::json(['has'=>true, 'subject'=>$letter->subject, 'content'=>$letter->content]);
			}
		}
		if(Input::get('action') == 'getRespond')
		{
			$letter = RespondLetter::where('ntd_id', Auth::id())->where('id', Input::get('letterId'))->first();
			if( ! $letter)
			{
				return Response::json(['has'=>false, 'message'=>'Không tìm thấy thư']);
			} else {
				return Response::json(['has'=>true, 'subject'=>$letter->subject, 'content'=>$letter->content]);
			}
		}
	}
	public function getExport($jobId = false)
	{
		if(is_numeric($jobId))
		{
				$app = \Application::whereHas('job', function($q) {$q->where('ntd_id', Auth::id()); })->where('job_id', $jobId)->get();
				$job = Job::find($jobId);
				if(count($app))
				{
					$user = Auth::getUser();
					$result[] = ["Ngày Xuất Báo Cáo:", date('Y-m-d H:i:s')];
					$result[] = ["Email đăng nhập:", $user->email];
					$result[] = ["Mã tuyển dụng:", $job->matin];
					$result[] = ["Vị trí:", $job->vitri];
					$result[] = ["Hết hạn:", $job->hannop];
					$nn = array();
					foreach ($job->category as $key => $value) {
						$nn[] = $value->category->cat_name;
					}
					$result[] = ["Ngành nghề:", implode(',', $nn)];
					$result[] = [""];
					$result[] = ["STT", "Ứng viên", "Ngày sinh", "Giới tính", "Email", "Điện thoại", "Ngày nộp"];
					$stt = 1;
					foreach ($app as $key => $value) {
						if($value->ntv_id > 0) {
							if($value->ntv->gender==1) $gt = 'Nam';
							elseif($value->ntv->gender==2) $gt = 'Nữ';
							else $gt = 'Không tiết lộ';
						}
						$result[] = [
							$stt,
							($value->ntv_id>0)?$value->ntv->first_name.' '.$value->ntv->last_name:$value->first_name.' '.$value->last_name,
							($value->ntv_id>0)?$value->ntv->date_of_birth:'',
							($value->ntv_id>0)?$gt:'',
							($value->ntv_id>0)?$value->ntv->email:$value->email,
							($value->ntv_id>0)?$value->ntv->phone_number:$value->contact_phone,
							$value->apply_date
						];
						$stt += 1;
					}
					\Excel::create('DS ho so da apply', function($excel) use($result) {
						$excel->sheet('Resumes', function($sheet) use($result) {
					        $sheet->fromArray($result);
					    });
					})->download('xlsx');
				}
			return 1;
		}
		return Redirect::route('employers.jobs.index');
	}
}