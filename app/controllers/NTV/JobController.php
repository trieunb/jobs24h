<?php 

/**
* 
*/
class JobController extends Controller
{
	public function getIndex($slug, $job_id){
		$job = Job::where('slug',$slug)
		->with(array('ntd'=>function($q) {
			$q->with('company');
		}))
		->where('id', $job_id)->first();
		return View::make('jobseekers.job', compact('slug','job'));
	}
}