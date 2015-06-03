<?php 
namespace NTD;
use View, Redirect, Input, EFolder, Job, Auth, Response, Application;
class CandidateController extends \Controller {
	public function __construct()
	{
		$job_name = Job::where('ntd_id', Auth::id())->with('application')->get();
		View::share('job_name', $job_name);
		$folders = EFolder::where('ntd_id', Auth::id())->with('application')->orderBy('id', 'desc')->get();
		View::share('folders', $folders);
	}
	public function getIndex()
	{
		return Redirect::route('employers.candidates.job', 'all');
	}
	public function getJob($id = false)
	{
		$apply = Application::orderBy('id', 'desc')
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
	public function getFolder($id = false)
	{
		if($id)
		{
			$apply = Application::orderBy('id', 'desc')->where('nav_id', 2);
			if(is_numeric($id))
			{
				$apply->whereHas('job', function($q) {
					$q->where('ntd_id', Auth::id());
				})->where('folder_id', $id);
			}
			$apply = $apply->paginate(10);
			return View::make('employers.candidates.folder', compact('apply'))->with('folder_id', $id);
		}
		return Redirect::route('employers.candidates.folder', 'all');
	}
	public function getFolderManager()
	{
		$fds = EFolder::orderBy('created_at', 'desc')->with('application')->paginate(10);
		return View::make('employers.candidates.folder_list', compact('fds'));
	}
	public function postFolderCreate()
	{
		if(Input::get('folderName'))
		{
			$folder_name = substr(Input::get('folderName'),0,20);
			$created = EFolder::firstOrCreate(['folder_name'=>$folder_name, 'ntd_id'=>Auth::id()]);
			
		}
		return Redirect::back()->with('success', 'Tạo folder thành công !');
	}
	public function postFolderUpdate()
	{
		$folder = EFolder::where('ntd_id', Auth::id())
				->where('id', Input::get('folder_id'))
				->first();
		$folder->folder_name = substr(Input::get('folder_name'), 0, 20);
		$folder->save();
		return Response::json(['success'=>true]);
	}
	public function getFolderDelete($id = false)
	{
		if($id)
		{
			$folder = EFolder::where('ntd_id', Auth::id())
				->where('id', $id)
				->first();
			if($folder->application->count() == 0)
				$folder->delete();
		}
		return Redirect::back()->with('success', 'Xóa folder thành công !');
	}
	public function getDeleted()
	{
		$apply = Application::orderBy('id', 'desc')
		->where('nav_id', 3)
		->whereHas('job', function($q) {
			$q->where('ntd_id', Auth::id());
		});
		
		$jobs = $apply->paginate(10);
		return View::make('employers.candidates.deleted', compact('jobs'));
	}
	public function getBlocked()
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
}