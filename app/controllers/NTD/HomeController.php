<?php 
namespace NTD;
use View,Redirect,DB;
class HomeController extends \Controller {
	
	public function home()
	{
		
		return Redirect::route('employers.launching');
	}
	public function launching()
	{
		$jobs = \Job::join('companies','jobs.ntd_id','=','companies.ntd_id')
			->leftjoin('order_post_rec as ord',
				function($q){
					$q->on('ord.job_id','=','jobs.id');
				})
			->groupBy('ord.job_id')
			->with('ntd')->with('application')->orderBy('jobs.id','desc'); 

		var_dump($jobs->get()->toArray());
		die();
		return View::make('employers.launching');
	}
}