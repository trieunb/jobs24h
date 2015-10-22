<?php

class OptionController extends \BaseController {
	public function getIndex()
	{
		$data=OptionHome::get()->toArray();
		return View::make('admin.option.index', compact('data'));
	}
	private function upload_insert_image($name,$file)
	{
		$logo=$file;
 		$file1=array('logo'=>$logo);
 		$rules1 = array('logo' => 'image|mimes:jpeg,jpg,bmp,png,gif,ico|max:1000');
		$validator_image=Validator::make($file1,$rules1);
		$output = ['name' => $logo->getClientOriginalName(),'tmp_name'=>$logo->getClientOriginalExtension(), 'size' => $logo->getClientSize()];
		if ($validator_image->fails())
				 	return false;
		else
			{
				$path = 'public/assets/images/';
				$fileName = rand(11111,99999).'_'.$name.'.'.$output['tmp_name'];
				$logo->move($path, $fileName);
				$insert=OptionHome::whereName($name)->update(array('value'=>$fileName));
				return true;
			}
	}
	public function postAjax()
	{
		$action=Input::get('action');
		 if($action=='logo')
			 {
				 if (Input::hasFile('logo')) {
				 	$resut=	$this->upload_insert_image($action,Input::file('logo'));
				 	if($resut)
				 		return Redirect::back()->with('success','Đã up logo thành công');
				 	else 
				 		return Redirect::back()->withErrors('Bạn phải chọn ảnh và ảnh đó phải dưới 1mb');
					}
					else
					return Redirect::back()->withErrors('Không thể upload');
			}
		elseif($action=='background')
		{
			 	if (Input::hasFile('background')) {
			 		$resut = $this->upload_insert_image($action,Input::file('background'));
			 		 if($resut)
				 		return Redirect::back()->with('success','Đã up logo thành công');
				 	else 
				 		return Redirect::back()->withErrors('Bạn phải chọn ảnh và ảnh đó phải dưới 1mb');
					}
				else
				return Redirect::back()->withErrors('Không thể upload');	
		}
		elseif ($action=='favicon') {
			if (Input::hasFile('favicon')) {
		 		$resut = $this->upload_insert_image($action,Input::file('favicon'));
		 		 if($resut)
			 		return Redirect::back()->with('success','Đã up logo thành công');
				 	else 
				 		return Redirect::back()->withErrors('Bạn phải chọn ảnh và ảnh đó phải dưới 1mb');
					}
			
				else
				return Redirect::back()->withErrors('Không thể upload');
		}
		
		else {
			$title=Input::get($action);
			$insert=OptionHome::whereName($action)->update(array('value'=>$title));
			return Redirect::back()->with('success','Đã save thành công');
		}

			
	}

}
?>