<?php 
class ProductServiceController extends \Controller {

	function getIndex()
	{
		$epackage=EPackage::with('eservice')->get();
		$package_view_cv=Package::with('eservice')->get();
		
		return View::make('admin.products.product',compact('epackage','package_view_cv'));
	}

	function getEdit($name,$id)
	{
		if($name=="search")
		{
			$package_view_cv=Package::whereId($id)->first();
			$epackage=null;
			return View::make('admin.products.edit',compact('epackage','package_view_cv')); 
		}
		if($name=="post")
		{
			$package_view_cv=null;
			$epackage=EPackage::whereId($id)->with('eservice')->first();

			return View::make('admin.products.edit',compact('epackage','package_view_cv')); 
		}


	}
	function postEdit($name,$id)
	{
		if($name=="search")
		{
			$data	=	Input::get();
			unset($data['_token']);
			$insert=Package::find($id);
			foreach ($data as $key => $value) {
				$insert->$key=$value;
			}
			if ($insert->save()) {
				return Redirect::back()->with('success','Đã lưu');
			}
			else
				return Redirect::back()->withErrors('Hiện tại không thể lưu')->withInput();	
		}


		if($name=="post")
		{
			$data	=	Input::get();
			unset($data['_token']);
			$insert=EPackage::find($id);
			foreach ($data as $key => $value) {
				$insert->$key=$value;
			}
			if ($insert->save()) {
				return Redirect::back()->with('success','Đã lưu');
			}
			else
				return Redirect::back()->withErrors('Hiện tại không thể lưu')->withInput();	
		}


	}

	function getDelete($name,$id)
	{
		if ($name=="search") {
			$insert=Package::find($id);
			$delete_package_search=Order::wherePackageId($id)->delete();
			if ($insert->delete()) {
				return Redirect::back()->with('success','Đã xóa');
			}
			else
				return Redirect::back()->withErrors('Hiện tại không thể xóa')->withInput();
		}
		if ($name=="post") {
			$insert=EPackage::find($id);
			if ($insert->delete()) {
				return Redirect::back()->with('success','Đã xóa');
			}
			else
				return Redirect::back()->withErrors('Hiện tại không thể xóa')->withInput();
		}

	}
}