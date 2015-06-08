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
		->with(array('category'=>function($q) {
			$q->with('category');
		}))
		->with(array('province'=>function($q) {
			$q->with('province');
		}))
		->where('id', $job_id)->first();
		return View::make('jobseekers.job', compact('slug','job'));
	}
	public function searchJob(){
		$keyword = Input::get('keyword');
		$province = Input::get('province');
		$categories = Input::get('categories');
		$salary = Input::get('salary');
		$level = Input::get('level');
		$jobs = Job::where('is_display',1)->where('status',1)->with('province')->with('category');
		if($keyword)
		{
			$jobs->where('vitri', 'LIKE', "%".$keyword."%");
		}
		if(count($province) > 0)
		{
			$jobs->whereHas('province', function($query) use($province) {
				$query->whereIn('province_id', $province);
			});
		}else {
			$jobs->with(array('province'	=>	function($query) {
				$query->with('province');
			}));
		}
		if(count($categories) > 0 )
		{
			$jobs->whereHas('category', function($query) use($categories)  {
				$query->whereIn('cat_id', $categories);
			});
		}else {
			$jobs->with(array('category'=>function($query) {
				$query->with('category');
			}));
		}
		if($salary)
		{
			$jobs->where('mucluong_min', 'LIKE', "%".$salary."%")->orWhere('mucluong_max', 'LIKE', "%".$salary."%");
		}
		if(is_numeric($level) && $level != 0)
		{
			$jobs->where('chucvu', $level);
		}

		if(Input::get('perpage') == null){
			$per_page = 20;	
		}else{
			$per_page = Input::get('perpage');	
		}
		
		$jobs = $jobs->paginate($per_page);

		return View::make('jobseekers.result-from-search', compact('jobs', 'per_page', 'keyword', 'province','categories','salary','level'));
	}
}