<?php 
namespace NTD;
use View, Redirect, Input, EFolder, Job, Auth, Response, Application;
class CandidateController extends \Controller {
	public function __construct()
	{
		$job_name = Job::where('ntd_id', Auth::id())->lists('vitri', 'id');
		View::share('job_name', $job_name);
		$folders = EFolder::where('ntd_id', Auth::id())->orderBy('id', 'desc')->lists('folder_name', 'id');
		View::share('folders', $folders);
	}
	public function getIndex()
	{
		return View::make('employers.candidates.index');
	}
	public function getJob()
	{

	}
	public function getFolder($id = false)
	{
		if($id)
		{
			$jobs = Application::orderBy('id', 'desc');
			if(is_numeric($id))
			{

			}
			return View::make('employers.candidates.folders');
		}
	}
	public function getFolderManager()
	{
		$fds = EFolder::orderBy('created_at', 'desc')->paginate(10);
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
			$folder->delete();
		}
		return Redirect::back()->with('success', 'Xóa folder thành công !');
	}
	public function getReport()
	{

	}
	public function getAlert()
	{


	}
	public function getRespond()
	{

	}
	public function getTest()
	{
		
	}
}