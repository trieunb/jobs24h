<?php 
namespace NTD;
use View, Redirect, Input, Job, CVCategory, WorkLocation, Auth, Config, Str, File, Company;
use App\DTT\Forms\EmployerAddJob;
class JobController extends \Controller {
	
	public function __construct()
	{
		$jobs = Job::where('ntd_id', Auth::id())
		->orderBy('id', 'desc')
		->get();
		$job_count['active'] = $job_count['expiring'] = $job_count['inactive'] = $job_count['isapply'] = $job_count['expired'] = $job_count['all'] = 0;
		foreach ($jobs as $job) {
			$job_count['all'] += 1;
			if($job->is_display == 1 & $job->expired_date >= date('Y-m-d')) $job_count['active'] += 1;
			if($job->is_display == 0 & $job->expired_date >= date('Y-m-d')) $job_count['inactive'] += 1;
			if($job->is_display == 1 & $job->is_apply == 0) $job_count['isapply'] += 1;
			if($job->expired_date < date('Y-m-d')) $job_count['expired'] += 1;
			if($job->is_display == 1 && $job->expired_date >= date('Y-m-d') && $job->expired_date <= date('Y-m-d', strtotime("+7 days"))) $job_count['expired'] += 1;

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
	public function getActive()
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
		->where('expired_date', '>=', date('Y-m-d'))
		->paginate(5);
		return View::make('employers.jobs.index', compact('jobs', 'title'));
	}
	public function getInActive()
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
		->where('expired_date', '>=', date('Y-m-d'))
		->paginate(5);
		return View::make('employers.jobs.index', compact('jobs', 'title'));
	}
	public function getIsApply()
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
	public function getExpired()
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
		->where('expired_date', '<', date('Y-m-d'))
		->paginate(5);
		return View::make('employers.jobs.index', compact('jobs', 'title'));
	}
	public function postAction()
	{
		extract(Input::all());
		if(isset($submit) && isset($job) && isset($submit))
		{
			$check = Job::whereIn('id', $job)->where('ntd_id', Auth::id())->count();
			if($check != count($job)) return Redirect::back()->withErrors('Công việc không tìm thấy !');
			$message = "";
			if($submit == 'active')
			{
				$check = Job::whereIn('id', $job)->update(array('is_display'=>1));
				$message = 'Đăng thành công';
			}
			if($submit == 'inactive')
			{
				$check = Job::whereIn('id', $job)->update(array('is_display'=>0));
				$message = 'Tạm ngừng đăng thành công';
			}
			if($submit == 'unapply')
			{
				$check = Job::whereIn('id', $job)->update(array('is_apply'=>0));
				$message = 'Ngưng nhận hồ sơ thành công';
			}
			if($submit == 'apply')
			{
				$check = Job::whereIn('id', $job)->update(array('is_apply'=>1));
				$message = 'Mở nhận hồ sơ thành công';
			}
			if($submit == 'delete')
			{
				$check = Job::destroy($job);
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
	public function getExpiring()
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
		->where('expired_date', '>=', date('Y-m-d'))
		->where('expired_date', '<=', date('Y-m-d', strtotime("+7 days")))
		->paginate(5);
		return View::make('employers.jobs.index', compact('jobs', 'title'));
	}

	public function getAdd()
	{
		return View::make('employers.jobs.add');
	}
	public function postAdd()
	{
		$validator = new EmployerAddJob;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$data = Input::all();
			unset($data['_token']);
			$ntd_nganhnghe = $data['ntd_nganhnghe']; unset($data['ntd_nganhnghe']);
			$ntd_diadiem = $data['ntd_diadiem']; unset($data['ntd_diadiem']);
			$video = $data['video']; unset($data['video']);
			$data['ntd_id'] = Auth::id();
			$data['status'] = 1;
			$data['keyword_tags'] = json_encode($data['keyword_tags']);
			$data['matin'] = Job::orderBy('matin', 'desc')->first()->matin + 1;
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

					return Redirect::route('employers.jobs.index')->with('success', 'Đăng tin thành công !');
				} else {
					return Redirect::back()->withInput()->withErrors('Lỗi');
				}
			} catch (Exception $e) {
				return Redirect::back()->withInput()->withErrors('Lỗi khi save !');
			}

		}
	}
	public function getEdit($id)
	{
		$job = Job::where('id', $id)->where('ntd_id', Auth::id())->first();
		if( ! $job)
		{
			return Redirect::back()->withErrors('Không tìm thấy việc làm.');
		}
		$job->keyword_tags = json_decode($job->keyword_tags, true);
		return View::make('employers.jobs.edit', compact('job'));
	}
	public function postEdit($id)
	{
		$validator = new EmployerAddJob;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$data = Input::all();
			unset($data['_token']);
			$ntd_nganhnghe = $data['ntd_nganhnghe']; unset($data['ntd_nganhnghe']);
			$ntd_diadiem = $data['ntd_diadiem']; unset($data['ntd_diadiem']);
			$data['ntd_id'] = Auth::id();
			$data['status'] = 1;
			$data['keyword_tags'] = json_encode($data['keyword_tags']);

			$job = Job::where('ntd_id', Auth::id())->where('id', $id)->first();
			if( ! $job) return Redirect::route('employers.jobs.index')->withErrors('Không tìm thấy công việc.');
			foreach ($data as $key => $value) {
				$job->$key = $value;
			}
			try {
				
				$job->updateLocation($job->id, $ntd_diadiem);
				$job->updateCategory($job->id, $ntd_nganhnghe);
				$job->save();

				return Redirect::route('employers.jobs.index')->with('success', 'Đã lưu các thay đổi !');
				
			} catch (Exception $e) {
				return Redirect::back()->withInput()->withErrors('Lỗi khi save !');
			}

		}
	}
	public function getDelete($id)
	{
		$job = Job::where('id', $id)->where('ntd_id', Auth::id())->first();
		if($job)
		{
			Job::destroy($job->id);
		}
		return Redirect::back()->with('success', 'Xóa việc làm thành công.');
	}
	public function getSearch()
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
}