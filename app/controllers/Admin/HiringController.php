<?php 

class HiringController extends \Controller {
	public function index()
	{
		return View::make('admin.hiring.index');
	}	
	public function datatables()
	{
		$posts = HiringPost::select('id', 'title', 'thumbnail', 'user_id', 'cat_id', 'sub_cat_id', 'views', 'id as ids', 'id as postid', 'post_slug')
		->with('admin')->with('category')->with('subcategory');
		$stt = 1;
		return Datatables::of($posts)
		->edit_column('id', '<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
')
		->edit_column('title', '<a href="{{ URL::route("hiring.detail", [$post_slug,$postid]) }}" target="_blank">{{$title}}</a>' )
		->edit_column('thumbnail', '{{ HTML::image(\'uploads/hiring/thumbnail/\'.$thumbnail, "", ["width"=>75,"height"=>75]) }}')
		->edit_column('user_id', '{{$admin["username"]}}')
		->edit_column('cat_id', '{{$category["cat_name"]}}')
		->edit_column('sub_cat_id', '{{$subcategory["cat_name"]}}')
		->edit_column('ids', '
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.hiring.destroy", $ids) )) }}
			<a class="btn btn-xs btn-info" href="{{URL::route("admin.hiring.edit", array($ids) )}}" title="Edit"><i class="glyphicon glyphicon-edit"></i></a> 
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Bạn muốn xóa bài này ?\');" type="submit" title="Delete"><i class="glyphicon glyphicon-remove"></i></button>
			{{ Form::close() }}
			')
		->make();
	}
	public function ajax()
	{
		if(Input::get('title'))
		{
			return Str::slug(Input::get('title'));
		}
		if(Input::get('cat_id'))
		{
			$sub_cate = HiringCate::where('parent', Input::get('cat_id'))->lists('cat_name', 'id');
			return json_encode($sub_cate);
		}
	}
	public function create()
	{

		return View::make('admin.hiring.create');
	}
	public function show()
	{

	}
	public function store()
	{
		$data = Input::all();
		unset($data['_method']);unset($data['_token']);
		preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $data['content'], $matches);
		if($matches[1])
		{
			$data['thumbnail'] = $this->getFileName($matches[1]);
		}
		$data['content'] = preg_replace('/(< *img[^>]*src *= *["\']?([^"\']*).*>)/i', '<img src="$2">', $data['content']);
		$data['user_id'] = AdminAuth::getUser()->id;
		$post = HiringPost::create($data);
		return Redirect::route('admin.hiring.index')->withSuccess('Thêm bài viết mới thành công.');
	}
	protected function getFileName($full)
	{
		$tmp = explode("/", $full);
		$tmp = $tmp[count($tmp)-1];
		if(! stristr($full, URL::to('/')))
		{
			//ko co hinh, phai tai hinh ve
			$content = @file_get_contents($full);
			if($content) {
				$file_dir = Config::get("app.upload_path") . 'hiring/'.$tmp;
				File::put($file_dir, $content);
				$img = Image::make($file_dir)->resize(75, 75);
    			$img->save(Config::get("app.upload_path") . 'hiring/thumbnail/'.$tmp);
			}
		}
		return $tmp;
	}
	public function upload()
	{
		$logo = Input::file('upload');
	 	$file1=array('logo'=>$logo);
		$rules1 = array('logo' => 'image|mimes:jpeg,jpg,bmp,png,gif|max:10000');

		$validator_image=Validator::make($file1,$rules1);
		
		$output = ['name' => $logo->getClientOriginalName(),'tmp_name'=>$logo->getClientOriginalExtension(), 'size' => $logo->getClientSize()];
		 
		if ($validator_image->fails()) {
		 	echo "<script>alert('Bạn phải chọn image');</script>";
		}
		else
			{
				$fileName = Str::random(16).'.'.$output['tmp_name'];
				$logo->move(Config::get("app.upload_path") . 'hiring/', $fileName);
				$path_logo=URL::to('uploads/hiring/'.$fileName.'');
				$img = Image::make(Config::get("app.upload_path") . 'hiring/'.$fileName)->resize(75, 75);
    			$img->save(Config::get("app.upload_path") . 'hiring/thumbnail/'.$fileName);
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
	public function edit($id)
	{
		$post = HiringPost::find($id);
		if(! $post) return Response::make('Post not found!');
		return View::make('admin.hiring.edit', compact('post'));
	}
	public function update($id)
	{
		$data = Input::all(); unset($data['_method']);unset($data['_token']);

		preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $data['content'], $matches);
		if($matches[1])
		{
			$data['thumbnail'] = $this->getFileName($matches[1]);
		}
		$data['content'] = preg_replace('/(< *img[^>]*src *= *["\']?([^"\']*).*>)/i', '<img src="$2">', $data['content']);
		
		$post = HiringPost::where('id', $id)->update($data);
		if($post) {
			return Redirect::route('admin.hiring.index')->withSuccess('Lưu thay đổi thành công .');
		} else {
			Session::flash('sub_cat_id', Input::get('sub_cat_id'));
			return Redirect::back()->withInput();
		}
		
	}
	public function destroy($id)
	{
		$post = HiringPost::find($id);
		$post->delete();
		return Redirect::route('admin.hiring.index')->withSuccess('Xóa thành công');
	}
	
}