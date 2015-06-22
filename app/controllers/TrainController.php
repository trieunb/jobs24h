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
	public function getPeople($id)
	{
		$data=TrainingPeople::where('training_roll_id','=',$id)
		->join('training_roll as tr','tr.id','=','training_people.training_roll_id')
		->join('training as t','t.id','=','training_people.training_id')
		->select('training_people.*','tr.name as roll','t.title as name_datao')
		->paginate(10);
		return View::make('admin.training.people')->with('data',$data);
	}

	public function getEditPeople($id)
	{

		$data=TrainingPeople::where('training_people.id','=',$id)->join('training_roll as tr','tr.id','=','training_people.training_roll_id')->join('training as t','t.id','=','training_people.training_id')->select('training_people.*','tr.name as roll','tr.id as roll_id','t.title as name_datao','t.id as id_daotao')->get();
		$people=TrainingRoll::lists('name','id');
		$training=Training::lists('title','id');
		return View::make('admin.training.editpeople')->with(array('data'=>$data,'people'=>$people,'training'=>$training));

	}	
	
	public function postEditPeople($id)
	{
		 

		$data=Input::only('name','sex','address','phone','email','facebook','twitter','skype','linkedin','training_roll_id','training_id');
		$logo=Input::file('thumbnail');

		$insert_data=TrainingPeople::find($id);

		if ($logo!=null) { //nếu chọn image
	
		$file1=array('logo'=>$logo);

		$rules1 = array('logo' => 'image|mimes:jpeg,jpg,bmp,png,gif|max:1000');
		$validator_image=Validator::make($file1,$rules1);
		$output = ['name' => $logo->getClientOriginalName(),'tmp_name'=>$logo->getClientOriginalExtension(), 'size' => $logo->getClientSize()];
			 
			if ($validator_image->fails())
			 	return Redirect::back()->withErrors('Bạn phải chọn ảnh và ảnh đó phải dưới 1mb');
			else
				{
					$path=str_replace(URL::to('/'), public_path(), $insert_data['thumbnail']);// xóa ảnh trước khi thêm
				 	if(File::exists($path))
						unlink($path);
					$fileName = rand(11111,99999).'.'.$output['tmp_name'];
					 $logo->move('uploads/training/', $fileName);
					 $path_logo=URL::to('uploads/training/'.$fileName.'');
				}
		}
		else 
			$path_logo=$insert_data['thumbnail'];


		$insert_data->name=$data['name'];
		$insert_data->sex=$data['sex'];
		$insert_data->address=$data['address'];
		$insert_data->phone=$data['phone'];
		$insert_data->email=$data['email'];
		$insert_data->facebook=$data['facebook'];
		$insert_data->twitter=$data['twitter'];
		$insert_data->skype=$data['skype'];
		$insert_data->thumbnail=$path_logo;
		$insert_data->linkedin=$data['linkedin'];
		$insert_data->training_roll_id=$data['training_roll_id'];
		$insert_data->training_id=$data['training_id'];
		 


		if ($insert_data->save()) 
			return Redirect::back()->with('success','Đã lưu thành công');
		else 
			return Redirect::back()->withErrors('Hiện tại không thể lưu');
	
	}

	public function getDeletePeople($id) //xóa thông tin học viên hoặc giảng viên
	{
		if (isset($id)) {
			$delete_data=TrainingPeople::find($id);

			//kiểm tra có ảnh đại diện hay hok, nếu có thì xóa
			if ($delete_data['thumbnail']!=URL::to('uploads/training/avatar.jpg')) {
				
				$path=str_replace(URL::to('/'), public_path(), $delete_data['thumbnail']);
				 if(File::exists($path))
					unlink($path);
				 
			}
			
			if ($delete_data->delete()) {

				return Redirect::back()->with('success','Đã xóa thông tin thành công');
			}

		}
		return Redirect::back()->withErrors('Không thể xóa');	
	}


	public function getAddPeople()
	{
		$roll_id=TrainingRoll::lists('name','id');
		$training_id=Training::lists('title','id');
		return View::make('admin.training.addpeople')->with(array('roll_id'=>$roll_id,'training_id'=>$training_id));
	}

	public function postAddPeople()
	{
		
		  
		$data=Input::only('name','sex','address','phone','email','facebook','twitter','skype','linkedin','roll_id','training_id');
		
		$logo=Input::file('thumbnail');
	 
		if ($logo!=null) { // nếu chọn image thì upload lên
	
			$file1=array('logo'=>$logo);

			$rules1 = array('logo' => 'image|mimes:jpeg,jpg,bmp,png,gif|max:1000');
			$validator_image=Validator::make($file1,$rules1);
			$output = ['name' => $logo->getClientOriginalName(),'tmp_name'=>$logo->getClientOriginalExtension(), 'size' => $logo->getClientSize()];
			 
			if ($validator_image->fails())
			 	return Redirect::back()->withErrors('Bạn phải chọn ảnh và ảnh đó phải dưới 1mb');
			else
				{
					$fileName = rand(11111,99999).'.'.$output['tmp_name'];
					 $logo->move('uploads/training/', $fileName);
					 $path_logo=URL::to('uploads/training/'.$fileName.'');
				}
		}

		else 
			$path_logo=URL::to('uploads/training/72618.png'); //nếu không chọn imahe thì lấy mặc định

		$insert_data=TrainingPeople::create(
			array(
				'name'=>$data['name'],
				'sex'=>$data['sex'],
				'address'=>$data['address'],
				'phone'=>$data['phone'],
				'email'=>$data['email'],
				'facebook'=>$data['facebook'],
				'twitter'=>$data['twitter'],
				'skype'=>$data['skype'],
				'linkedin'=>$data['linkedin'],
				'skype'=>$data['skype'],
				'training_roll_id'=>$data['roll_id'],
				'training_id'=>$data['training_id'],
				'thumbnail'=>$path_logo


				));
		if($insert_data)
		{
			return Redirect::back()->with('success','Đã lưu');
		}

	}


	// document
	public function getDocument()
	{
		$data=TrainingDocument::paginate(10);
		return View::make('admin.training.document')->with('data',$data);
	}

	public function getAddDocument()
	{
		return View::make('admin.training.adddocument');
	}


	public function postAddDocument()
	{
		 $data=Input::only('title','editor1','author');
		$logo=Input::file('thumbnail');
		$document=Input::file('store');
		if ($document==null) {
			return Redirect::back()->withErrors('Chưa có file của tài liệu');
		}


		if ($logo!=null) { // nếu chọn image thì upload lên
	
			$file1=array('logo'=>$logo);

			$rules1 = array('logo' => 'image|mimes:jpeg,jpg,bmp,png,gif|max:1000');
			$validator_image=Validator::make($file1,$rules1);
			$output = ['name' => $logo->getClientOriginalName(),'tmp_name'=>$logo->getClientOriginalExtension(), 'size' => $logo->getClientSize()];
			 
			if ($validator_image->fails())
			 	return Redirect::back()->withErrors('Bạn phải chọn ảnh và ảnh đó phải dưới 1mb');
			else
				{
					$fileName = 'document_'.rand(11111,99999).'.'.$output['tmp_name'].'';
					 $logo->move('uploads/training/', $fileName);
					 $path_logo=URL::to('uploads/training/'.$fileName.'');
				}
		}

		else 
			$path_logo=URL::to('uploads/training/72618.png'); //nếu không chọn imahe thì lấy mặc định

		//upload tài liệu
		
		$name_document='document_'.rand(11111,99999).'.'.$document->getClientOriginalExtension().'';
		$document->move('uploads/training/document/', $name_document);
		$path_document=URL::to('uploads/training/document/'.$name_document.'');



		$insert_data=TrainingDocument::create(
			array(
				'title'=>$data['title'],
				'content'=>$data['editor1'],
				'author'=>$data['author'],
				'store'=>$path_document,
				'thumbnail'=>$path_logo,
				)
			);
		if ($insert_data) 
			return Redirect::back()->with('success','Đã lưu tài liệu thành công');
		else
			return Redirect::back()->withErrors('Hiện tại không thể lưu');

		 
	}


	public function getDeleteDocument($id)
	{
		if (isset($id)) {
			$delete_data=TrainingDocument::find($id);
			$path=str_replace(URL::to('/'), public_path(), $delete_data['store']);
			if(File::exists($path))
			File::delete($path);

			if($delete_data->delete())
				return Redirect::back()->with('success','Đã xóa tài liệu');
			else
				return Redirect::back()->withErrors('Không thể xóa tài liệu này');
		}
	}

	public function getEditDocument($id)
	{
		if(isset($id))
		{
			$data=TrainingDocument::where('id','=',$id)->select('title','author','content','store','thumbnail')->get();
			return View::make('admin.training.editdocument')->with('data',$data);
		}
	}

	public function postEditDocument($id)
	{
		if (isset($id)) 
		{
			$data=Input::only('title','editor1','author');
			$logo=Input::file('thumbnail');
			$file_document=Input::file('store');
			$insert_data=TrainingDocument::find($id);


			if($logo!=null) // xét thumnail
			{

				$file1=array('logo'=>$logo);

				$rules1 = array('logo' => 'image|mimes:jpeg,jpg,bmp,png,gif|max:1000');
				$validator_image=Validator::make($file1,$rules1);
				$output = ['name' => $logo->getClientOriginalName(),'tmp_name'=>$logo->getClientOriginalExtension(), 'size' => $logo->getClientSize()];
				 
				if ($validator_image->fails())
				 	return Redirect::back()->withErrors('Bạn phải chọn ảnh và ảnh đó phải dưới 1mb');
				else
					{
						$path=str_replace(URL::to('/'), public_path(), $insert_data['thumbnail']);// xóa ảnh trước khi thêm
					 	if(File::exists($path))
							unlink($path);
						$fileName = rand(11111,99999).'.'.$output['tmp_name'];
						 $logo->move('uploads/training/', $fileName);
						 $path_logo=URL::to('uploads/training/'.$fileName.'');
					}
			}
			else 
				$path_logo=$insert_data['thumbnail'];

			if($file_document!=null) // xét file
			{
				$path=str_replace(URL::to('/'), public_path(), $insert_data['store']);// xóa ảnh trước khi thêm
					if(File::exists($path))
					unlink($path);

				$name_document='document_'.rand(11111,99999).'.'.$file_document->getClientOriginalExtension().'';
				$file_document->move('uploads/training/document/', $name_document);
				$path_document=URL::to('uploads/training/document/'.$name_document.'');
			}
			else
				$path_document=$insert_data['store'];

			$insert_data->title=$data['title'];
			$insert_data->content=$data['editor1'];
			$insert_data->author=$data['author'];
			$insert_data->thumbnail=$path_logo;
			$insert_data->store=$path_document;

			if ($insert_data->save()) {
				return Redirect::back()->with('success','Đã thay đổi');

			}
			else
				return Redirect::back()->withErrors('Hiện tại Không thể thay đổi thông tin');

		}
		
	}
	//end document


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