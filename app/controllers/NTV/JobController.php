<?php 

/**
* 
*/
class JobController extends Controller
{
	public function getIndex($slug, $job_id){
		$job = Job::where('id', $job_id)
		->with(array('ntd'=>function($q) {
			$q->with('company');
		}))
		->with(array('category'=>function($q) {
			$q->with('category');
		}))
		->with(array('province'=>function($q) {
			$q->with('province');
		}))
		->where('is_display', 1)->where('hannop', '>=', date('Y-m-d', time()))->first();
		
		return View::make('jobseekers.job', compact('slug','job'));

	}
	public function searchJob(){
		$keyword = Input::get('keyword');
		$province = Input::get('province');
		$categories = Input::get('categories');
		$salary = Input::get('salary');
		$level = Input::get('level');
		$work_type = Input::get('type');
		$id_emp = Input::get('id');
		$jobs = Job::where('is_display',1)->where('hannop', '>=', date('Y-m-d', time()))->where('status',1)->with('province')->with('category');
		if(is_numeric($id_emp) && $id_emp != null){
			$jobs->where('ntd_id',$id_emp);
		}
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
		if(is_numeric($work_type) && $work_type != 0)
		{
			$jobs->where('hinhthuc', $work_type);
		}

		if(Input::get('perpage') == null){
			$per_page = 20;	
		}else{
			$per_page = Input::get('perpage');	
		}
		
		$jobs = $jobs->paginate($per_page);

		return View::make('jobseekers.result-from-search', compact('jobs', 'per_page', 'keyword', 'province','categories','salary','level'));
	}

	public function getCategory(){
		$categories = Category::all();
	
		if(Input::get('id') != null){
			$id = Input::get('id');
			$jobs = Job::where('is_display',1)->where('status',1)->with('category');
			$jobs->whereHas('category', function($query) use($id)  {
				$query->where('cat_id', $id);
			});
			if(Input::get('perpage') == null){
				$per_page = 20;	
			}else{
				$per_page = Input::get('perpage');	
			}
			$jobs = $jobs->paginate($per_page);
		}else{
			$jobs = $per_page = $id= null;
		}
		return View::make('jobseekers.result-from-category', compact('jobs','per_page','id', 'categories')); 
	}
	

	public function postIndex($slug,$id,$action = false){

		if($action == 'share'){
			return $this->shareJob($id);
		}
		if($action == 'feedback'){
			return $this->feedBack($id);
		}
	}


	public function shareJob($id){
		$params = Input::all();
		$respond['has'] = false;
		if(Request::ajax()){
			
			$rules = array(
		       'first_name_friend' => 'required',
		       'last_name_friend' => 'required',
		       'email_name_friend' => 'required|email',
		    );
		    $messages = array(
				'required'	=>	'Thông tin này bắt buộc',
				'email'		=>	'Email không đúng định dạng.',
			);
			$validator = Validator::make($params, $rules, $messages);
			if($validator->fails()){			
	        	$messages = $validator->messages();
	        	$respond['message'] = $validator->getMessageBag()->toJson();
				return Response::json($respond);
			}else{
				$job = Job::where('id',$id)->with(array('ntd'=>function($q) {
					$q->with('company');
				}))
				->with(array('category'=>function($q) {
					$q->with('category');
				}))
				->with(array('province'=>function($q) {
					$q->with('province');
				}))->first();
				if($job->mucluong_max != 0){
					$salary = "Tới $".$job->mucluong_max;
				}
				elseif($job->mucluong_max == 0 && $job->mucluong_min != 0){
					$salary = "$".$job->mucluong_min;
				}
				else{
					$salary = "Thỏa thuận";
				}
				foreach($job->province as $key=>$val){
					$provinces[] = $job->province[$key]->province->province_name;
				};
				$subject = "".$params['first_name_friend'].": Bạn của bạn, ".$GLOBALS['user']->first_name." ".$GLOBALS['user']->last_name." vừa giới thiệu việc làm ".$job->vitri." đến bạn.";
				$message = "Chào ".$params['first_name_friend'].",<br> Bạn của bạn, ".$GLOBALS['user']->first_name." ".$GLOBALS['user']->last_name." vừa giới thiệu việc làm ".$job->vitri." đến bạn:<br><br>
				<h2 style='argin-bottom:5px;margin-top:0;font-family:Arial,sans-serif;font-size:18px;margin-bottom:0px;'>
					<a href='".URL::to(App::getLocale()."/jobseekers/view/".$job->slug."/".$job->id)."' style='font-family:arial,sans-serif;text-decoration:none;color:#00b9f2' target='_blank'>".$job->vitri."</a></h2>
				<span style='color:#999;font-size:14px;font-family:Arial,sans-serif'>".$job->ntd->company->company_name."</span><br>
				<span style='color:#666;font-family:Arial,sans-serif'> 
				Địa điểm: <strong>".implode(',', $provinces)."</strong><br>
				Mức lương: <strong style='color:#f7941d'>".$salary."</strong></span><br>
				<h3>Mô tả công việc</h3>
				<div>".$job->mota."</div><br><br>
				<div><p style='margin:20px 0'><strong><a href='".URL::to(App::getLocale()."/jobseekers/view/".$job->slug."/".$job->id)."' style='font-family:Arial,sans-serif;font-size:12px;text-decoration:underline;color:#555' target='_blank'>Xem toàn bộ thông tin đăng tuyển</a></strong></p></div>";
				Log::info($message);
			   	// setting the server, port and encryption
				if(App\DTT\Services\SendMail::send($params['email_name_friend'], $params['first_name_friend'], $subject, $message ) )
				{
					$respond['has'] = true;
					$respond['message'] = 'Việc làm "'.$job->vitri.'" đã được giới thiệu đến '.$params['first_name_friend'].'';
					return Response::json($respond);
				} else {
					$respond['message'] = 'Việc làm "'.$job->vitri.'" hiện tại không thể giới thiệu đến '.$params['first_name_friend'].'';
					return Response::json($respond);
				}
			}
		}
	}


	public function feedBack(){
		$params = Input::all();
		$respond['has'] = false;
		if(Request::ajax()){
			
			$rules = array(
		       'first_name' => 'required',
		       'last_name' => 'required',
		       'feedback' => 'required',
		       'email' => 'required|email',
		    );
		    $messages = array(
				'required'	=>	'Thông tin này bắt buộc',
				'email'		=>	'Email không đúng định dạng.',
			);
			$validator = Validator::make($params, $rules, $messages);
			if($validator->fails()){			
	        	$messages = $validator->messages();
	        	$respond['message'] = $validator->getMessageBag()->toJson();
				return Response::json($respond);
			}else{
				$create = VResponse::create(array(
					'first_name' => ''.$params['first_name'].'',
					'last_name' => ''.$params['last_name'].'',
					'email' => ''.$params['email'].'',
					'feedback' => ''.$params['feedback'].'',
				));
				if($create){
					$respond['has'] = true;
					$respond['message'] = 'Bạn đã gởi phản hồi đến Nhà tuyển dụng thành công';
					return Response::json($respond);
				}else{
					$respond['message'] = 'Hiện tại không thể gởi phản hồi đến Nhà tuyển dụng';
					return Response::json($respond);
				}
			}	
		}
	}
}