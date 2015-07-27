<?php

class NewsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /news
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$list_news = TrainingPost::whereIn('id', array(10,11,12))->get();
		return View::make('admin.news.manager', compact('list_news'));
	}

	public function getAdd(){
		$categories = TrainingCat::whereIn('id', array(10,11,12))->lists('name', 'id');
		return View::make('admin.news.add', compact('categories'));
	}

	public function postAdd(){
		$params = Input::all();
		// Find the user using the user id
		$rules = array(
		       'title' => 'required',
		       'editor1'=> 'required',
		       'thumbnail' => 'image|mimes:jpeg,jpg,bmp,png,gif|max:1000',
		    );
		    $messages = array(
				'title.required'	=>	'Vui lòng Nhập tiêu đề',
				'mimes' => 'Vui lòng tải file đúng định dạng ảnh',
				'editor1.required' => 'Vui lòng Nhập nội dung bài viết'
			);
			$validator = Validator::make($params, $rules, $messages);
			if($validator->fails()){			
		        return Redirect::back()->withErrors($validator);
			}else{
				$thumbnail=Input::file('thumbnail');
				if ($thumbnail!=null) { // nếu chọn image thì upload lên
					$extension = $thumbnail->getClientOriginalExtension();
					$name = Str::random(11) . '.' . $extension;
					$thumbnail->move(Config::get('app.upload_path') . 'news/', $name);
				}else{
					$name = '';
				}

				$insert_data=TrainingPost::create(
					array(
						'title'		=>	$params['title'],
						'content'	=>	$params['editor1'],
						'thumbnail'	=>	$name,
						'training_cat_id'=>	$params['cate']
					)
				);
				if($insert_data){
					return Redirect::back()->with('success','Tạo bài viết thành công');
				}
				else{
					return Redirect::back()->withErrors('Hiện tại không thể tạo bài viết mới')->withInput();
				}
		}
	}

	public function getEdit($id){
		$params = Input::all();
		$news = TrainingPost::find($id);
		$categories = TrainingCat::whereIn('id', array(10,11,12))->lists('name', 'id');
		return View::make('admin.news.edit', compact('news', 'categories'));
	}

	public function postEdit(){
		$params = Input::all();
		$id = $params['id'];
		$post=TrainingPost::find($id);
		// Find the user using the user id
		$rules = array(
		       'title' => 'required',
		       'editor1'=> 'required',
		       'thumbnail' => 'image|mimes:jpeg,jpg,bmp,png,gif|max:1000',
		    );
		    $messages = array(
				'title.required'	=>	'Vui lòng Nhập tiêu đề',
				'mimes' => 'Vui lòng tải file đúng định dạng ảnh',
				'editor1.required' => 'Vui lòng Nhập nội dung bài viết'
			);
			$validator = Validator::make($params, $rules, $messages);
			if($validator->fails()){			
		        return Redirect::back()->withErrors($validator);
			}else{
				$thumbnail=Input::file('thumbnail');
				if ($thumbnail!=null) { // nếu chọn image thì upload lên
					$extension = $thumbnail->getClientOriginalExtension();
					$name = Str::random(11) . '.' . $extension;
					$thumbnail->move(Config::get('app.upload_path') . 'news/', $name);
				}else{
					$name = $post->thumbnail;
				}

				$post->title = ''.$params['title'].'';
				$post->content = ''.$params['editor1'].'';
				$post->thumbnail = $name;
				$post->training_cat_id = $params['cate'];
				if($post->save()){
					return Redirect::back()->with('success','Cập nhật bài viết thành công');
				}
				else{
					return Redirect::back()->withErrors('Hiện tại không thể cập nhật bài viết này')->withInput();
				}
		}
	}

	public function getDelete($id){
		$post=TrainingPost::find($id);
		if($post->delete()){
			return Redirect::back();
		}
	}

	public function postDelete(){
		$params = Input::all();
		$del = TrainingPost::whereIn('id', $params['id'])->delete();
		if($del){
			return Redirect::back();
		}	
	}
}