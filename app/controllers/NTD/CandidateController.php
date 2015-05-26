<?php 
namespace NTD;
use View, Redirect, Input, Job, CVCategory, WorkLocation, Auth, Config, Str, File, Company;
class CandidateController extends \Controller {
	public function __construct()
	{
		$job_name = Job::where('ntd_id', Auth::id())->lists('vitri', 'id');
		View::share('job_name', $job_name);
	}
	public function getIndex()
	{
		return View::make('employers.candidates.index');
	}
	public function getJob()
	{
		
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