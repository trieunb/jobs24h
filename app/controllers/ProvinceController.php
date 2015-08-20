<?php

class ProvinceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /Province
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$list_parent = Country::all();
		if(count($list_parent)){
			foreach ($list_parent as $key => $value) {
				$province = Province::where('country_id', $value->id)->get();
				$list_province[] = array('id'=>$value->id,'parent'=>$value->country_name, 'child'=>$province);
			}
		}else{
			$list_province = null;
		}		
		$count_job = 0;
		$count_resume = 0;
		// get category child
		foreach ($list_province[0]['child'] as $key => $child) {
			$count_job = WorkLocation::where('rs_id', 0)->where('job_id', '>', 0)->where('province_id',$child->id)->count();
			$count_resume = WorkLocation::where('job_id', 0)->where('rs_id', '>', 0)->where('province_id',$child->id)->count();
			$provinces[] = array('id'=> $child->id,'name' => $child->province_name, 'count_job' => $count_job, 'count_resume'=> $count_resume);
		}

		$params = Input::all();
		if(Request::ajax()){

			$province = Province::where('country_id', $params['country_id'])->get();
			$count_job = $count_resume = 0;
			// get category child
			foreach ($province as $key => $child) {
				$count_job = WorkLocation::where('rs_id', 0)->where('job_id', '>', 0)->where('province_id',$child->id)->count();
				$count_resume = WorkLocation::where('job_id', 0)->where('rs_id', '>', 0)->where('province_id',$child->id)->count();
				$ajax[] = array('id'=> $child->id,'name' => $child->province_name, 'count_job' => $count_job, 'count_resume'=> $count_resume);
			}
			return Response::json($ajax);
		}

		return View::make('admin.province.home', compact('list_province','provinces'));
	}

	function getEdit($id){
		if(is_numeric($id)){
			$province = Province::where('id', $id)->first();
			$provinces = Country::lists('country_name','id');
			return View::make('admin.province.edit', compact('province', 'provinces'));	
		}else{
			$id = str_replace('country', '', $id);
		 	$country = Country::where('id', $id)->first();
		 	return View::make('admin.province.edit', compact('country'));	
		}
		
		
	}
	function postEdit($id, $action){

		$params = Input::all();
		if(isset($action) == 'province'){
			$update = Province::find($id);
			$update->province_name = $params['name'];
			$update->country_id = $params['parent'];
		}else{
			$update = Country::find($id);
			$update->country_name = $params['name'];
		}
		if($update->save()){
			return Redirect::back()->with('success', 'Cập nhật địa điểm thành công');
		}else{
			return Redirect::back()->withInput->withErrors('Hiện giờ bạn không thể chỉnh sửa mục này');
		}
	}
	function getAdd(){
		$country = Country::lists('country_name','id');
		return View::make('admin.province.add', compact('country'));	
	}
	function postAdd(){
		$params = Input::all();
		$create = Province::create(array(
			'province_name' => $params['name'],
			'country_id' => $params['parent']
		));
		if($create){
			return Redirect::back()->with('success', 'Thêm địa điểm thành công');
		}else{
			return Redirect::back()->withInput->withErrors('Hiện giờ bạn không thể thêm mới mục này');
		}
	}
	function postDelete(){
		$params = Input::all();
		if(Request::ajax()){
			$id = $params['id'];
			$type = $params['type'];
			if($type == 'country'){
				$del = Country::find($id);
				$provinces = Province::where('country_id', $id)->get();
				foreach ($provinces as $key => $province) {
					foreach ($province->mtprovince as $value) {
						if($value->rs_id > 0){
							$resume_id[] = $value->rs_id;
						}else{
							$job_id[] = $value->job_id;
						}
					}
					if(isset($resume_id) && count($resume_id)){
						Resume::whereIn('id', $resume_id)->delete();
						MTEducation::whereIn('rs_id',$resume_id)->delete();
						Experience::whereIn('rs_id',$resume_id)->delete();
						WorkLocation::whereIn('rs_id',$resume_id)->delete();
						CVLanguage::whereIn('rs_id',$resume_id)->delete();
						CVCategory::whereIn('rs_id',$resume_id)->delete();
					}if(isset($job_id) && count($job_id)){
						Job::whereIn('id', $job_id)->delete();
						WorkLocation::whereIn('job_id',$job_id)->delete();
						CVCategory::whereIn('job_id',$job_id)->delete();	
					}
					$del_sub = Province::where('id', $province->id)->delete();
				}
				$del->delete();
				$return = 'Xóa địa điểm thành công';
				return Response::json($return);
			}else{
				$del = Province::find($id);
				foreach ($del->mtprovince as $value) {
					if($value->rs_id > 0){
						$resume_id[] = $value->rs_id;
					}else{
						$job_id[] = $value->job_id;
					}
				}
				if(isset($resume_id) && count($resume_id)){
					Resume::whereIn('id', $resume_id)->delete();
					MTEducation::whereIn('rs_id',$resume_id)->delete();
					Experience::whereIn('rs_id',$resume_id)->delete();
					WorkLocation::whereIn('rs_id',$resume_id)->delete();
					CVLanguage::whereIn('rs_id',$resume_id)->delete();
					CVCategory::whereIn('rs_id',$resume_id)->delete();
				}if(isset($job_id) && count($job_id)){
					Job::whereIn('id', $job_id)->delete();
					WorkLocation::whereIn('job_id',$job_id)->delete();
					CVCategory::whereIn('job_id',$job_id)->delete();	
				}
				$del->delete();
				$return = 'Xóa địa điểm thành công';
				return Response::json($return);
			}
		}
	}

	public function getResume($province_id){
		$resumes = Resume::orderBy('id', 'desc');
		if(is_numeric($province_id)){
			$resumes->whereHas('location', function($q) use($province_id) {
				$q->where('province_id', $province_id);
			});
		}
		$resumes = $resumes->paginate(10);
		return View::make('admin.province.resumes', compact('resumes'));
	}

	public function getJob($province_id){
		$jobs = Job::orderBy('id', 'desc');
		if(is_numeric($province_id)){
			//var_dump($id_cate); die();	
			$jobs->whereHas('province', function($q) use($province_id) {
				$q->where('province_id', $province_id);
			});
		}
		$jobs = $jobs->paginate(10);
		return View::make('admin.province.jobs', compact('jobs'));
	}

}