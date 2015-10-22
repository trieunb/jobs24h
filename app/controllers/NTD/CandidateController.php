<?php 
namespace NTD;
use View, Redirect, Input, EFolder, Job, Auth, Response, Application,RSFolder;
class CandidateController extends \Controller {
	public function __construct()
	{
		$job_name = Job::where('ntd_id', Auth::id())->with('application')->get();
		View::share('job_name', $job_name);
		$folders = EFolder::where('ntd_id', Auth::id())->with('application')->orderBy('id', 'desc')->get();
		View::share('folders', $folders);
		$viewed = \OrderDetail::where('ntd_id', Auth::id())->count();
		View::share('viewed', $viewed);
	}
	public function getIndex()
	{
		return Redirect::route('employers.candidates.job', 'all');
	}
	public function getCongViec($id = false)
	{
		$apply = Application::orderBy('id', 'desc')
		->where('left_status', 0)
		->whereHas('job', function($q) {
			$q->where('ntd_id', Auth::id());
		});
		if(is_numeric($id))
		{
			$apply->whereHas('job', function($q) use($id) {
				$q->where('id', $id);
			});
		}

		$apply = $apply->paginate(10);

		  
		
		return View::make('employers.candidates.job', compact('apply'))->with('job_id', $id);
	}
	public function getThuMuc($id = false)
	{
		if($id)
		{
			$apply = Application::orderBy('id', 'desc')->where('nav_id', 2);
			if(is_numeric($id))
			{
				$apply = RSFolder::where('ntd_id', Auth::id())->where('left_status', 0)->where('folder_id', $id)->orderBy('id','desc')->paginate(10);
				$isFolder = 1;
				return View::make('employers.candidates.folder', compact('apply', 'isFolder'))->with('folder_id', $id);
			} else {
				$apply = RSFolder::where('ntd_id', Auth::id())->where('left_status', 0)->orderBy('id','desc');
			}
			$isFolder = 0;
			$apply = $apply->paginate(10);
			return View::make('employers.candidates.folder', compact('apply', 'isFolder'))->with('folder_id', $id);
		}
		return Redirect::route('employers.candidates.folder', 'all');
	}
	public function postJob()
	{
		if(Input::get('act') == 'luu') // luu thu muc
		{
			if(Input::get('valid'))
			{
				//check xem cv do da co o folder can di chuyen chua
				$cvs = Input::get('valid');
				$rsfolder = RSFolder::where('folder_id', Input::get('val'))->get();
				if(count($rsfolder))
				{
					foreach ($rsfolder as $key => $value) {
						if(in_array($value->cv_id, $cvs))
						{
							$value->delete(); 
						}
					}
				}
				foreach ($cvs as $key => $value) {
					RSFolder::create([
							'ntd_id'	=>	Auth::id(),
							'folder_id'	=>	Input::get('val'),
							'cv_id'		=>	$value,
							'status'	=>	1
						]);
				}

				//var_dump(Input::all());die();
				
			}
			return Redirect::back()->with('success', 'Cập nhật thư mục thành công');
		}
		if(Input::get('act') == 'danhgiaall') // luu thu muc
		{
			if(Input::get('valid'))
			{
				$update = Application::whereIn('id', Input::get('valid'))
				->whereHas('job', function($q) {
					$q->where('ntd_id', Auth::id());
				})
				->update(['status'=>Input::get('val')]);
			}
			return Redirect::back()->with('success', 'Cập nhật trạng thái thành công');
		}
		if(Input::get('act') == 'xoaall') // luu thu muc
		{
			$check = Application::whereIn('cv_id', Input::get('valid'))
			->whereHas('job', function($q) {
				$q->where('ntd_id', Auth::id());
			})->lists('id');
			Application::destroy($check);
			//xoa application thi phai xoa ca o folder
			$check = RSFolder::whereIn('cv_id', Input::get('valid'))
			->where('ntd_id', Auth::id())->lists('id');
			RSFolder::destroy($check);

			return Redirect::back()->with('success', 'Xóa thành công');
		}
	}
	public function postThuMuc($id = false)
	{
		if(Input::get('act') == 'luu') // luu thu muc
		{
			if(Input::get('valid'))
			{
				//check xem cv do da co o folder can di chuyen chua
				$cvs = Input::get('valid');
				$rsfolder = RSFolder::find(Input::get('val'));
				if(count($rsfolder))
				{
					if(in_array($rsfolder->cv_id, $cvs))
					{
						$rsfolder->delete();
					}
				}
				$update = RSFolder::whereIn('id', Input::get('valid'))
				->where('ntd_id', Auth::id())
				->update(['folder_id'=>Input::get('val')]);
			}
			//return 1;
			return Redirect::back()->with('success', 'Cập nhật thư mục thành công');
		}
		if(Input::get('act') == 'danhgiaall') // luu thu muc
		{
			if(Input::get('valid'))
			{
				$update = RSFolder::whereIn('id', Input::get('valid'))
				->where('ntd_id', Auth::id())
				->update(['status'=>Input::get('val')]);
			}
			return Redirect::back()->with('success', 'Cập nhật trạng thái thành công');
		}
		if(Input::get('act') == 'xoaall') // luu thu muc
		{

			if (Input::get('valid')==null) {
				return Redirect::back()->withInput()->withErrors('Chọn mục để xóa'); 
			}
			else
			{
				$check = RSFolder::whereIn('id', Input::get('valid'))
				->where('ntd_id', Auth::id())->lists('id');

				RSFolder::destroy($check);
				return Redirect::back()->with('success', 'Xóa thành công');
			}
		}
	}
	public function getQuanLyThuMuc()
	{
		$fds = EFolder::orderBy('created_at', 'desc')->where('ntd_id', Auth::id())->with('application')->paginate(10);
		return View::make('employers.candidates.folder_list', compact('fds'));
	}
	public function postTaoThuMuc()
	{
		if(Input::get('folderName'))
		{
			$folder_name = substr(Input::get('folderName'),0,40);
			\TaskLog::create(['ntd_id'=>Auth::id(), 'action_type'=>'create_folder','target'=>'Tạo thư mục: ' . Input::get("folderName") ]);
			$created = EFolder::firstOrCreate(['folder_name'=>$folder_name, 'ntd_id'=>Auth::id()]);
			
		}
		return Redirect::back()->with('success', 'Tạo folder thành công !');
	}
	public function postSuaThuMuc()
	{
		$folder = EFolder::where('ntd_id', Auth::id())
				->where('id', Input::get('folder_id'))
				->first();
		$folder->folder_name = substr(Input::get('folder_name'), 0, 40);
		$folder->save();
		return Response::json(['success'=>true]);
	}
	public function getXoaThuMuc($id = false)
	{
		if($id)
		{
			$folder = EFolder::where('ntd_id', Auth::id())
				->where('id', $id)
				->first();
			if($folder->application->count() == 0) {
				\TaskLog::create(['ntd_id'=>Auth::id(), 'action_type'=>'del_folder','target'=>'Xóa thư mục: ' . $folder->folder_name ]);
				$folder->delete();
			}


		}
		return Redirect::back()->with('success', 'Xóa folder thành công !');
	}
	public function getHoSoDaXoa()
	{
		$apply = Application::orderBy('id', 'desc')
		->where('nav_id', 3)
		->whereHas('job', function($q) {
			$q->where('ntd_id', Auth::id());
		});
		
		$jobs = $apply->paginate(10);
		return View::make('employers.candidates.deleted', compact('jobs'));
	}
	public function getDanhSachTuChoi()
	{
		$apply = Application::orderBy('id', 'desc')
		->where('nav_id', 4)
		->whereHas('job', function($q) {
			$q->where('ntd_id', Auth::id());
		});
		
		$jobs = $apply->paginate(10);
		return View::make('employers.candidates.blocked', compact('jobs'));
	}
	public function getReport()
	{

	}
	
	public function getTest()
	{
		
	}
	public function getDanhSachHoSoDaXem()
	{
		$detail = \OrderDetail::where('ntd_id', Auth::id())->orderBy('id', 'desc')->paginate(10);
		return View::make('employers.candidates.viewed', compact('detail'));
	}




}