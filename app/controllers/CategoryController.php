<?php

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /category
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$list_parent = Category::where('parent_id', 0)->get();
		if(count($list_parent)){
			foreach ($list_parent as $key => $value) {
				$cate = Category::where('parent_id', $value->id)->get();
				$list_category[] = array('id'=>$value->id,'parent'=>$value->cat_name, 'child'=>$cate);
			}
		}else{
			$list_category = null;
		}		
		$count_job = 0;
		$count_resume = 0;
		// get category child
		foreach ($list_category[0]['child'] as $key => $child) {
			$count_job = CVCategory::where('rs_id', 0)->where('job_id', '>', 0)->where('cat_id',$child->id)->count();
			$count_resume = CVCategory::where('job_id', 0)->where('rs_id', '>', 0)->where('cat_id',$child->id)->count();
			$sub_cate[] = array('id'=> $child->id,'name' => $child->cat_name, 'count_job' => $count_job, 'count_resume'=> $count_resume);
		}

		$params = Input::all();
		if(Request::ajax()){

			$cate = Category::where('parent_id', $params['parent_id'])->get();
			$count_job = $count_resume = 0;
			// get category child
			foreach ($cate as $key => $child) {
				$count_job = CVCategory::where('rs_id', 0)->where('job_id', '>', 0)->where('cat_id',$child->id)->count();
				$count_resume = CVCategory::where('job_id', 0)->where('rs_id', '>', 0)->where('cat_id',$child->id)->count();
				$ajax[] = array('id'=> $child->id,'name' => $child->cat_name, 'count_job' => $count_job, 'count_resume'=> $count_resume);
			}
			return Response::json($ajax);
		}

		return View::make('admin.category.home', compact('list_category','sub_cate'));
	}

	function getEdit($id){
		$cate = Category::where('id', $id)->first();
		$categories = Category::where('parent_id', 0)->lists('cat_name','id');
		return View::make('admin.category.edit', compact('cate', 'categories'));	
	}
	function postEdit($id){
		$params = Input::all();
		$update = Category::find($id);
		$update->cat_name = $params['name'];
		$update->parent_id = $params['parent'];
		if($update->save()){
			return Redirect::back()->with('success', 'Cập nhật ngành nghề thành công');
		}else{
			return Redirect::back()->withInput->withErrors('Hiện giờ bạn không thể chỉnh sửa mục này');
		}
	}
	function getAdd(){
		$categories = Category::where('parent_id', 0)->lists('cat_name','id');
		return View::make('admin.category.add', compact('categories'));	
	}
	function postAdd(){
		$params = Input::all();
		$create = Category::create(array(
			'cat_name' => $params['name'],
			'parent_id' => $params['parent']
		));
		if($create){
			return Redirect::back()->with('success', 'Thêm ngành nghề thành công');
		}else{
			return Redirect::back()->withInput->withErrors('Hiện giờ bạn không thể thêm mới mục này');
		}
	}
	function postDelete(){
		$params = Input::all();
		if(Request::ajax()){
			$id = $params['id'];
			$del = Category::find($id);
			$sub_cate = Category::where('parent_id', $id)->get();
			if(count($sub_cate)){
				foreach ($sub_cate as $key => $cate) {
					foreach ($cate->mtcategory as $value) {
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
					$del_sub = Category::where('id', $cate->id)->delete();
				}
				$del->delete();
				$return = 'Xóa nghành nghề thành công';
				return Response::json($return);
			}else{
				foreach ($del->mtcategory as $value) {
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
				$return = 'Xóa nghành nghề thành công';
				return Response::json($return);
			}
		}
	}

	public function getResume($cate_id){
		$resumes = Resume::orderBy('id', 'desc');
		if(is_numeric($cate_id)){
			$resumes->whereHas('cvcategory', function($q) use($cate_id) {
				$q->where('cat_id', $cate_id);
			});
		}
		$resumes = $resumes->paginate(10);
		return View::make('admin.category.resumes', compact('resumes'));
	}

	public function getJob($cate_id){
		$jobs = Job::orderBy('id', 'desc');
		if(is_numeric($cate_id)){
			//var_dump($id_cate); die();	
			$jobs->whereHas('category', function($q) use($cate_id) {
				$q->where('cat_id', $cate_id);
			});
		}
		$jobs = $jobs->paginate(10);
		return View::make('admin.category.jobs', compact('jobs'));
	}

}