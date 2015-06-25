<?php
class CungunglaodongController extends \BaseController
{

	public function getIndex()
	{
		 $data=TrainingCat::where('id','<>',1)->get();
		return View::make('admin.cungung.allservices')->with('data',$data);
	}

	public function getEditServices($id)
	{
		$data=TrainingCat::where('id','=',$id)->get();
		return View::make('admin.cungung.editservices')->with('data',$data);
	}

	public function postEditServices($id)
	{

		$data=Input::only('name');
		$logo=Input::file('banner');
		 
		$insert_data=TrainingCat::find($id);
		if ($logo!=null) { //nếu chọn image
	
		$file1=array('logo'=>$logo);

		$rules1 = array('logo' => 'image|mimes:jpeg,jpg,bmp,png,gif|max:1000');
		$validator_image=Validator::make($file1,$rules1);
		$output = ['name' => $logo->getClientOriginalName(),'tmp_name'=>$logo->getClientOriginalExtension(), 'size' => $logo->getClientSize()];
			 
			if ($validator_image->fails())
			 	return Redirect::back()->withErrors('Bạn phải chọn ảnh và ảnh đó phải dưới 1mb');
			else
				{
					$path=str_replace(URL::to('/'), public_path(), $insert_data['banner']);// xóa ảnh trước khi thêm
				 	if(File::exists($path))
						unlink($path);
					$fileName = rand(11111,99999).'.'.$output['tmp_name'];
					 $logo->move('uploads/cungunglaodong/', $fileName);
					 $path_logo=URL::to('uploads/cungunglaodong/'.$fileName.'');
				}
		}
		else 
			$path_logo=$insert_data['banner'];

		$insert_data->name=$data['name'];
		 
		 
		$insert_data->banner=$path_logo;
		 
		$insert_data->save();
		if($insert_data)
			return Redirect::back()->with('success','Đã lưu thành công');
		else
			return Redirect::back()->withInput->withErrors('Hiện giờ không thể lưu nội dung');
	
	}

	public function getDeleteServices($id)
	{
		if (isset($id)) {
			$delete_data=TrainingCat::find($id);

			//kiểm tra có ảnh đại diện hay hok, nếu có thì xóa
			if ($delete_data['banner']!=URL::to('uploads/training/avatar.jpg')) {
				
				$path=str_replace(URL::to('/'), public_path(), $delete_data['banner']);
				 if(File::exists($path))
					unlink($path);
				 
			}
			
			if ($delete_data->delete()) {

				return Redirect::back()->with('success','Đã xóa thông tin thành công');
			}

		}
		return Redirect::back()->withErrors('Không thể xóa');
	}


	public function getAddServices()
	{
		return View::make('admin.cungung.addservices');
	}
	public function postAddServices()
	{
		$data=Input::only('name');
		$logo=Input::file('banner');
	 
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
					 $logo->move('uploads/cungunglaodong/', $fileName);
					 $path_logo=URL::to('uploads/cungunglaodong/'.$fileName.'');
				}
		}

		else 
			$path_logo=URL::to('uploads/cungunglaodong/avatar.jpg'); //nếu không chọn imahe thì lấy mặc định



		$insert_data=TrainingCat::create(
			array(
				'name'		=>	$data['name'],
				'banner'	=>	$path_logo,
				
				)
			);
		
		if($insert_data)
			return Redirect::back()->with('success','Đã lưu thành công');
		else
			return Redirect::back()->withInput->withErrors('Hiện giờ không thể lưu nội dung');
	
	}


	public function getPostServices()
	{
		$data=TrainingPost::where('training_cat_id','<>',1)
							->join('training_cat as trc','trc.id','=','training_post.training_cat_id')
							->select(array('training_post.id','training_post.title','training_post.content','trc.name as name'))
							->get();
		return View::make('admin.cungung.postservices')->with('data',$data);
	}

	public function getEditPostServices($id)
	{

		$cat=TrainingCat::where('id','<>','1')->lists('name','id');
		$data=TrainingPost::where('id','=',$id)
							->select('training_cat_id','id','title','content')
							->get();
		return View::make('admin.cungung.editpostservices')->with(array('data'=>$data,'cat'=>$cat));
	}

	public function postEditPostServices($id)
	{

		$data=Input::all();
		$insert_data=TrainingPost::find($id);
		$insert_data->title=$data['title'];
		$insert_data->content=$data['editor1'];
		$insert_data->training_cat_id=$data['cat_id'];
		if($insert_data->save())
			return Redirect::back()->with('success','Đã thay đổi thành công');
		else
			return Redirect::back()->withErrors('Không thể thay đổi vào lúc này');
	}

	public function getDeletePostServices($id)
	{
		if (isset($id)) {
			$delete_data=TrainingPost::find($id);

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


	public function getAddPostServices()
	{
		$cat=TrainingCat::where('id','<>','1')->lists('name','id');

		return View::make('admin.cungung.addpostservices')->with('cat',$cat);
	}

	public function postAddPostServices()
	{
		$data=Input::all();
		$insert_data=TrainingPost::create(
			array(
				'title'		=>	$data['title'],
				'content'	=>	$data['editor1'],
				'training_cat_id'=> $data['cat_id']
				)
			);
		
		if($insert_data)
			return Redirect::back()->with('success','Đã lưu thành công');
		else
			return Redirect::back()->withInput->withErrors('Hiện giờ không thể lưu nội dung');
	
	

	}


	public function getViewPostServices($id)
	{
		$data=TrainingPost::where('training_cat_id','=',$id)
							->join('training_cat as trc','trc.id','=','training_post.training_cat_id')
							->select(array('training_post.id','training_post.title','training_post.content','trc.name as name'))
							->paginate(10);
		return View::make('admin.cungung.postservices')->with('data',$data);

	}


}
?>