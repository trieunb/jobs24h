<?php

class TrainController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /training
	 *
	 * @return Response
	 */


	// bảng training
	public function getIndex()
	{
		$data=Training::join('training_people as tp','tp.id','=','training.teacher_id')->select(array('training.*','tp.name as name_teacher'))->paginate(10);

		 return View::make('admin.training.index')->with('data',$data);
	}

	public function getEditCouser($id) // chỉnh sửa các khóa học
	{
		//return $id;
		$data=Training::where('training.id','=',$id)->join('training_people as tp','tp.id','=','training.teacher_id')->select(array('training.*','tp.name as name_teacher','tp.id as teacher_id'))->get();
		$teacher=TrainingPeople::where('training_roll_id','=',1)->lists('name','id');



		return View::make('admin.training.editcouser')->with(array('data'=>$data,'teacher'=>$teacher));
	}


	public function postEditCouser($id) 
	{

		 
		$data=Input::only('title','time_day','fee','date_open','shift','date_study','time_hour','editor1','discount','teacher_id');


		$insert_data=Training::find($id);
		$insert_data->title=$data['title'];
		$insert_data->time_day=$data['time_day'];
		$insert_data->fee=$data['fee'];
		$insert_data->date_open=$data['date_open'];
		$insert_data->shift=$data['shift'];
		$insert_data->date_study=$data['date_study'];
		$insert_data->time_hour=$data['time_hour'];
		$insert_data->content=$data['editor1'];
		$insert_data->discount=$data['discount'];
		$insert_data->teacher_id=$data['teacher_id'];
		$insert_data->save();
		if($insert_data)
			return Redirect::back()->with('success','Đã lưu thành công');
		else
			return Redirect::back()->withInput->withErrors('Hiện giờ không thể lưu nội dung');
	}


	// thêm khóa học
	public function getAddCouser()
	{
		$teacher=TrainingPeople::where('training_roll_id','=',1)->lists('name','id');

		return View::make('admin.training.addcouser')->with('teacher',$teacher);
	}

	public function postAddCouser() 
	{

		 
		$data=Input::only('title','time_day','fee','date_open','shift','date_study','time_hour','editor1','discount','teacher_id');

		$insert_data=Training::create(
			array(
				'title'		=>	$data['title'],
				'time_day'	=>	$data['time_day'],
				'fee'		=>	$data['fee'],
				'date_open'	=>	$data['date_open'],
				'date_study'=>	$data['date_study'],
				'time_hour'	=>	$data['time_hour'],
				'content'	=>	$data['editor1'],
				'discount'	=>	$data['discount'],
				'teacher_id'=>	$data['teacher_id']
				)
			);
		
		if($insert_data)
			return Redirect::back()->with('success','Đã lưu thành công');
		else
			return Redirect::back()->withInput->withErrors('Hiện giờ không thể lưu nội dung');
	}



	public function getDelete($id) // xóa trong table training
	{
		if(isset($id))
		{
			$training=Training::find($id);
			$training->delete();
			return Redirect::back()->with('success','Đã xóa chương trình đào tạo');
		}
		else{
			return Redirect::back()->withErrors('Lỗi không thể xóa');
		}
	}

	//end training



	// table training_post
	public function getPost()
	{
		//get data dào tạo
		$data=TrainingPost::join('training_cat as tc','tc.id','=','training_post.training_cat_id')->select('training_post.*','tc.name as name_cat' )->paginate(10);
		if(count((array)$data)==0)
			return View::make('admin.training.post')->with('success','Chưa có dữ liệu');
		else
			return View::make('admin.training.post')->with('data',$data);
	}


	public function getEditPost($id)
	{
		if(isset($id))
		{
		$data=TrainingPost::where('training_post.id','=',$id)->join('training_cat as tc','tc.id','=','training_post.training_cat_id')->select(array('training_post.*','tc.name as name_cat','tc.id as cat_id'))->get();
		$cat=TrainingCat::lists('name','id');
		return View::make('admin.training.editpost')->with(array('data'=>$data,'cat'=>$cat));
		}

	}
	public function postEditPost($id)
	{
		 
		$data=Input::only('title','subtitle','editor1','thumbnail','cat_id');
		$insert_data=TrainingPost::find($id);
		$insert_data->title=$data['title'];
		$insert_data->subtitle=$data['subtitle'];
		$insert_data->content=$data['editor1'];
		$insert_data->thumbnail=$data['thumbnail'];
		$insert_data->training_cat_id=$data['cat_id'];
		$insert_data->save();
		if($insert_data)
			return Redirect::back()->with('success','Đã lưu thành công');
		else
			return Redirect::back()->withInput->withErrors('Hiện giờ không thể lưu nội dung');
	
	}

	public function getDeletePost($id) // xóa bài viết
	{
		if(isset($id))
		{
			$training_post=TrainingPost::find($id);
			$training_post->delete();
			return Redirect::back()->with('success','Đã xóa bài viết');
		}
		else{
			return Redirect::back()->withErrors('Lỗi không thể xóa');
		}

	}



	public function getAddPost()
	{
		$cat=TrainingCat::lists('name','id');

		return View::make('admin.training.addpost')->with('cat',$cat);
	}

	public function postAddPost() 
	{

		 
		$data=Input::only('title','subtitle','editor1','thumbnail','cat_id');

		$insert_data=TrainingPost::create(
			array(
				'title'		=>	$data['title'],
				'subtitle'	=>	$data['subtitle'],
				'content'	=>	$data['editor1'],
				'thumbnail'	=>	$data['thumbnail'],
				'training_cat_id'=>	$data['cat_id']
				)
			);
		
		if($insert_data)
			return Redirect::back()->with('success','Đã lưu thành công');
		else
			return Redirect::back()->withInput->withErrors('Hiện giờ không thể lưu nội dung');
	}


	//end table training_post


	// Học viên giảng viên 
	public function people()
	{
		
	}
	


	// upload ảnh dùng chung 

	public function postUpload() // upload ảnh trong ckeditor
	{
		 $logo = Input::file('upload');
		 $file1=array('logo'=>$logo);
			$rules1 = array('logo' => 'image|mimes:jpeg,jpg,bmp,png,gif|max:1000');

			$validator_image=Validator::make($file1,$rules1);
			
			$output = ['name' => $logo->getClientOriginalName(),'tmp_name'=>$logo->getClientOriginalExtension(), 'size' => $logo->getClientSize()];
			 
			if ($validator_image->fails())
			 	echo 'Bạn phải chọn image';
			else
				{
					$fileName = rand(11111,99999).'.'.$output['tmp_name'];
					 $logo->move('uploads/training/', $fileName);
					 $path_logo=URL::to('uploads/training/'.$fileName.'');
					 $funcNum = $_GET['CKEditorFuncNum'] ;
					// Optional: instance name (might be used to load a specific configuration file or anything else).
					$CKEditor = $_GET['CKEditor'] ;
					// Optional: might be used to provide localized messages.
					$langCode = $_GET['langCode'] ;
					 
					// Check the $_FILES array and save the file. Assign the correct path to a variable ($url).
					$url=$path_logo;
					// Usually you will only assign something here if the file could not be uploaded.
					$message = '';
					 
					echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
		
				}
		 
	}

	//end upload ảnh


}