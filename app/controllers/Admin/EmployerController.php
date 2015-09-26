<?php
use App\DTT\Forms\AdminNTDCreate;
class EmployerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /employer
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$employers = User::orderBy('id', 'desc');
		return View::make('admin.employers.index', compact('employers'));
	}
	public function datatables()
	{
		$page=0;
		if (Request::ajax()) {
			$page=(Input::get('iDisplayStart'));
		}
		$user=AdminAuth::getUser()->username;
		$active = Input::get('active');
		 	
		$employers = NTD::join('companies','employers.id','=','companies.ntd_id')->select('employers.id as ckid', 'employers.id as id', 'companies.company_name as company_name', 'employers.email','employers.phone_number', 'employers.created_at', 'employers.is_active', 'employers.id as idd', 'employers.id as ids','employers.id as cskh')->with('job')->orderBy('employers.id','desc');

		if($active!=null) {$employers->whereIsActive($active);}

		return Datatables::of($employers)

		->edit_column('ckid', '<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
		')
		->edit_column('company_name','<a class="" href="{{URL::route("admin.employers.edit",$id)}}?page={{'.$page.'}}&web=emp_index" title="Edit">{{$company_name}}</a>')
		->remove_column('id')
		->edit_column('is_active', '@if($is_active==1)<span class="label label-success">Kích hoạt</span>@else <span class="label label-info">Không kích hoạt</span>@endif')
		->edit_column('idd', '{{ HTML::link(URL::route("admin.jobs.index", ["id"=>$id]), count($job) ) }}')

		->edit_column('ids', '
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.employers.destroy", $id) )) }}
			
			<a class="btn btn-xs btn-info" href="{{URL::to("admin/order/package-employer/$id")}}" title="Chỉnh sửa dịch vụ cho nhà tuyển dụng"><i class="ace-icon fa fa-cogs bigger-120"></i></a> 
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
			{{ Form::close() }}
			')
		->edit_column('cskh',''.$user.'')
		->make();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /employer/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('admin.employers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /employer
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		 
		$data = Input::only('email','password','full_name','address','position','country_id','province_id','phone_number','is_active');
		$data1=Input::only('company_name','work_type','company_address','display_logo','full_description','work_field','giolamviec','chonchungtoi','started_year','quymocty','video_link','google_map'); 
		$data1['contact_name']=Input::get('full_name');

		$rules = array(
			'email'			=>	'required|email|unique:employers,email',
			'password'		=>	'min:3',
			'is_active'		=>	'in:0,1',
			
		);

		$messages = array(
			'email.required'	=>	'Email không được để trống.',
			'email'		=>	'Email không đúng định dạng.',
			'unique'	=>	':attribute đã tồn tại, vui lòng chọn tên khác',
			'min'		=>	':attribute tối thiểu là :min kí tự.',
			
		);
		$validator = Validator::make($data, $rules, $messages);

		$rules1=array(
			'company_name'	=>	'required',
			'filelogo'		=>	'mimes:jpeg,bmp,png|max:100',
			'image1'		=>	'mimes:jpeg,bmp,png|max:1000',
			'image2'		=>	'mimes:jpeg,bmp,png|max:1000',
			'image3'		=>	'mimes:jpeg,bmp,png|max:1000',
			'image4'		=>	'mimes:jpeg,bmp,png|max:1000',
			'image5'		=>	'mimes:jpeg,bmp,png|max:1000',
			);
		$messages1=array(
			'company_name.required'	=>	'Tên công ty không được để trống.',
			'filelogo.mimes'			=>	'Logo không đúng định dạng',
			'image1.mimes'			=>	'Hình ảnh 1 không đúng định dạng',
			'image2.mimes'			=>	'Hình ảnh 2 không đúng định dạng',
			'image3.mimes'			=>	'Hình ảnh 3 không đúng định dạng',
			'image4.mimes'			=>	'Hình ảnh 4 không đúng định dạng',
			'image5.mimes'			=>	'Hình ảnh 5 không đúng định dạng',
			'filelogo.max'			=>	'Dung lượng logo quá lớn',
			'image1.max'			=>	'Hình ảnh 1 dung lượng quá lớn',
			'image2.max'			=>	'Hình ảnh 2 dung lượng quá lớn',
			'image3.max'			=>	'Hình ảnh 3 dung lượng quá lớn',
			'image4.max'			=>	'Hình ảnh 4 dung lượng quá lớn',
			'image5.max'			=>	'Hình ảnh 5 dung lượng quá lớn',
			);

		$validator1 = Validator::make($data1, $rules1, $messages1);
		
		if($validator1->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {

			if (Input::hasFile('filelogo')) {
				$path = Config::get('app.upload_path').'companies/logos/';
				Input::file('filelogo')->move($path, Input::file('filelogo')->getClientOriginalName());
				$data1['logo'] = Input::file('filelogo')->getClientOriginalName();
			}
			 
			$path = Config::get('app.upload_path').'companies/images/';
			$company_images = array();
			$hasImage = false;
			for ($i=1; $i <= 5; $i++) { 
				if (Input::hasFile('image'.$i)) {
					Input::file('image'.$i)->move($path, Input::file('image'.$i)->getClientOriginalName());
					$company_images[] = Input::file('image'.$i)->getClientOriginalName();
					$hasImage = true;
				} else {
					$company_images[] = "";
				}
				unset($data1['image'.$i]);
				
			}
			if($hasImage) $data1['company_images'] = json_encode($company_images);
			//Company::where('ntd_id', Auth::id())->update($params);



			if($data['password'] == '') {
				return Redirect::back()->withInput()->withErrors('Nhập password');
			} else {
				$data['password'] = Hash::make($data['password']);
			}
			 
			$ntd = NTD::create($data);
			if($ntd) {
				$company = new Company;
				$company->ntd_id = $ntd->id;
				$company->save();
				Company::where('ntd_id', $ntd->id)->update($data1);

				return Redirect::route('admin.employers.index')->withSuccess('Thêm mới NTD thành công.');
			}
			else
				return Redirect::back()->withInput()->withErrors('Lỗi khi thêm mới');
			//Company::where('ntd_id', $id)->update($data1);
			//$ntd = NTD::where('id', $id)->update($data);
			//return Redirect::route('admin.employers.index',array('page'=>$page))->withSuccess('Lưu thông tin thành công.');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /employer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /employer/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEditEmployers($page,$id)
	{
		//
		$com = NTD::whereId($id)->with('company')->first();

		if(!$com) return Response::make('Không tìm thấy NTD');
		return View::make('admin.employers.edit', compact('com'));
	}


	public function edit($id)
	{
		//
		$com = NTD::whereId($id)->with('company')->first();

		if(!$com) return Response::make('Không tìm thấy NTD');
		return View::make('admin.employers.edit', compact('com'));
		/*$employer = NTD::find($id);
		if(!$employer) return Response::make('Không tìm thấy NTD');
		return View::make('admin.employers.edit', compact('employer'));*/
	}


	/**
	 * Update the specified resource in storage.
	 * PUT /employer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)// của resource
	{
		 

		$data = Input::only('email','password','full_name','address','position','country_id','province_id','phone_number','is_active');
		 

		$data1=Input::only('company_name','work_type','company_address','display_logo','full_description','work_field','giolamviec','chonchungtoi','started_year','quymocty','video_link','google_map');

		//unset($data['_token']);
		//unset($data['_method']);
		$rules = array(
			'email'			=>	'required|email|unique:employers,email,'.$id,
			'password'		=>	'min:3',
			'is_active'		=>	'in:0,1',
			
		);

		$messages = array(
			'email.required'	=>	'Email không được để trống.',
			'email'		=>	'Email không đúng định dạng.',
			'unique'	=>	':attribute đã tồn tại, vui lòng chọn tên khác',
			'min'		=>	':attribute tối thiểu là :min kí tự.',
			
		);
		$validator = Validator::make($data, $rules, $messages);

		$rules1=array(
			'company_name'	=>	'required',
			'filelogo'		=>	'mimes:jpeg,bmp,png|max:100',
			'image1'		=>	'mimes:jpeg,bmp,png|max:1000',
			'image2'		=>	'mimes:jpeg,bmp,png|max:1000',
			'image3'		=>	'mimes:jpeg,bmp,png|max:1000',
			'image4'		=>	'mimes:jpeg,bmp,png|max:1000',
			'image5'		=>	'mimes:jpeg,bmp,png|max:1000',
			);
		$messages1=array(
			'company_name.required'	=>	'Tên công ty không được để trống.',
			'filelogo.mimes'			=>	'Logo không đúng định dạng',
			'image1.mimes'			=>	'Hình ảnh 1 không đúng định dạng',
			'image2.mimes'			=>	'Hình ảnh 2 không đúng định dạng',
			'image3.mimes'			=>	'Hình ảnh 3 không đúng định dạng',
			'image4.mimes'			=>	'Hình ảnh 4 không đúng định dạng',
			'image5.mimes'			=>	'Hình ảnh 5 không đúng định dạng',
			'filelogo.max'			=>	'Dung lượng logo quá lớn',
			'image1.max'			=>	'Hình ảnh 1 dung lượng quá lớn',
			'image2.max'			=>	'Hình ảnh 2 dung lượng quá lớn',
			'image3.max'			=>	'Hình ảnh 3 dung lượng quá lớn',
			'image4.max'			=>	'Hình ảnh 4 dung lượng quá lớn',
			'image5.max'			=>	'Hình ảnh 5 dung lượng quá lớn',
			);

		$validator1 = Validator::make($data1, $rules1, $messages1);
		
		if($validator1->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {

			if (Input::hasFile('filelogo')) {
				$path = Config::get('app.upload_path').'companies/logos/';
				Input::file('filelogo')->move($path, Input::file('filelogo')->getClientOriginalName());
				$data1['logo'] = Input::file('filelogo')->getClientOriginalName();
			}

			$path = Config::get('app.upload_path').'companies/images/';
			$company_images = array();
			$hasImage = false;
			for ($i=1; $i <= 5; $i++) { 
				if (Input::hasFile('image'.$i)) {
					Input::file('image'.$i)->move($path, Input::file('image'.$i)->getClientOriginalName());
					$company_images[] = Input::file('image'.$i)->getClientOriginalName();
					$hasImage = true;
				} else {
					$company_images[] = "";
				}
				unset($data1['image'.$i]);
				
			}
			if($hasImage) $data1['company_images'] = json_encode($company_images);
			//Company::where('ntd_id', Auth::id())->update($params);



			if($data['password'] == '') {
				unset($data['password']);
			} else {
				$data['password'] = Hash::make($data['password']);
			}
			Company::where('ntd_id', $id)->update($data1);
			$ntd = NTD::where('id', $id)->update($data);
			if (Input::get('web')=='job_index') {
			return Redirect::route('admin.jobs.index',array('page'=>Input::get('page')))->withSuccess('Lưu thông tin thành công.');
			}
			return Redirect::route('admin.employers.index',array('page'=>Input::get('page')))->withSuccess('Lưu thông tin thành công.');
		}

		//
		/*$page=0;
		$data = Input::all();
		unset($data['_token']);
		unset($data['_method']);
		$rules = array(
			'email'			=>	'required|email|unique:employers,email,'.$id,
			'password'		=>	'min:3',
			'is_active'		=>	'in:0,1',
		);
		$messages = array(
			'email.required'	=>	'Email không được để trống.',
			'email'		=>	'Email không đúng định dạng.',
			'unique'	=>	':attribute đã tồn tại, vui lòng chọn tên khác',
			'min'		=>	':attribute tối thiểu là :min kí tự.'
		);
		$validator = Validator::make($data, $rules, $messages);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			if($data['password'] == '') {
				unset($data['password']);
			} else {
				$data['password'] = Hash::make($data['password']);
			}
			$ntd = NTD::where('id', $id)->update($data);
			return Redirect::route('admin.employers.index',array('page'=>$page))->withSuccess('Lưu thông tin thành công.');
		}*/
	}


	public function postEditEmployers($page,$id) // của controller
	{
		//

		$page=$page;
		$data = Input::only('email','password','full_name','address','position','country_id','province_id','phone_number','is_active');
		 

		$data1=Input::only('company_name','work_type','company_address','display_logo','full_description','work_field','giolamviec','chonchungtoi','started_year','quymocty','video_link','google_map');

		//unset($data['_token']);
		//unset($data['_method']);
		$rules = array(
			'email'			=>	'required|email|unique:employers,email,'.$id,
			'password'		=>	'min:3',
			'is_active'		=>	'in:0,1',
			
		);

		$messages = array(
			'email.required'	=>	'Email không được để trống.',
			'email'		=>	'Email không đúng định dạng.',
			'unique'	=>	':attribute đã tồn tại, vui lòng chọn tên khác',
			'min'		=>	':attribute tối thiểu là :min kí tự.',
			
		);
		$validator = Validator::make($data, $rules, $messages);

		$rules1=array(
			'company_name'	=>	'required',
			'filelogo'		=>	'mimes:jpeg,bmp,png|max:100',
			'image1'		=>	'mimes:jpeg,bmp,png|max:1000',
			'image2'		=>	'mimes:jpeg,bmp,png|max:1000',
			'image3'		=>	'mimes:jpeg,bmp,png|max:1000',
			'image4'		=>	'mimes:jpeg,bmp,png|max:1000',
			'image5'		=>	'mimes:jpeg,bmp,png|max:1000',
			);
		$messages1=array(
			'company_name.required'	=>	'Tên công ty không được để trống.',
			'filelogo.mimes'			=>	'Logo không đúng định dạng',
			'image1.mimes'			=>	'Hình ảnh 1 không đúng định dạng',
			'image2.mimes'			=>	'Hình ảnh 2 không đúng định dạng',
			'image3.mimes'			=>	'Hình ảnh 3 không đúng định dạng',
			'image4.mimes'			=>	'Hình ảnh 4 không đúng định dạng',
			'image5.mimes'			=>	'Hình ảnh 5 không đúng định dạng',
			'filelogo.max'			=>	'Dung lượng logo quá lớn',
			'image1.max'			=>	'Hình ảnh 1 dung lượng quá lớn',
			'image2.max'			=>	'Hình ảnh 2 dung lượng quá lớn',
			'image3.max'			=>	'Hình ảnh 3 dung lượng quá lớn',
			'image4.max'			=>	'Hình ảnh 4 dung lượng quá lớn',
			'image5.max'			=>	'Hình ảnh 5 dung lượng quá lớn',
			);

		$validator1 = Validator::make($data1, $rules1, $messages1);
		
		if($validator1->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {

			if (Input::hasFile('filelogo')) {
				$path = Config::get('app.upload_path').'companies/logos/';
				Input::file('filelogo')->move($path, Input::file('filelogo')->getClientOriginalName());
				$data1['logo'] = Input::file('filelogo')->getClientOriginalName();
			}

			$path = Config::get('app.upload_path').'companies/images/';
			$company_images = array();
			$hasImage = false;
			for ($i=1; $i <= 5; $i++) { 
				if (Input::hasFile('image'.$i)) {
					Input::file('image'.$i)->move($path, Input::file('image'.$i)->getClientOriginalName());
					$company_images[] = Input::file('image'.$i)->getClientOriginalName();
					$hasImage = true;
				} else {
					$company_images[] = "";
				}
				unset($data1['image'.$i]);
				
			}
			if($hasImage) $data1['company_images'] = json_encode($company_images);
			//Company::where('ntd_id', Auth::id())->update($params);



			if($data['password'] == '') {
				unset($data['password']);
			} else {
				$data['password'] = Hash::make($data['password']);
			}
			Company::where('ntd_id', $id)->update($data1);
			$ntd = NTD::where('id', $id)->update($data);
			return Redirect::route('admin.employers.index',array('page'=>$page))->withSuccess('Lưu thông tin thành công.');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /employer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$user = NTD::find($id);
		$job = Job::where('ntd_id', $id)->delete();
		$user->delete();
		return Redirect::back()->withSuccess('Xóa thành công NTD');
	}

	public function report()
	{


		
		 

		 
		$job_not_active=Job::where('status','<>',1)->count(); 
		$ntd_vip	= Order::count();
		 
		 
		$total_ntd = NTD::count();
		return View::make('admin.employers.report',compact('job_not_active','ntd_vip','total_ntd'));
	}


	public function datatables_vip()
	{

 
		 

		$page=0;

		 
			$employers = Order::join('employers','orders.ntd_id','=','employers.id')->join('companies','orders.ntd_id','=','companies.ntd_id')
		   ->select(array('orders.id as ckid','employers.id as emid','companies.company_name as name','orders.is_xacthuc as xacthuc','orders.end_date_xacthuc as end_xacthuc','orders.package_name','orders.created_date as created_date','orders.ended_date as ended_date','orders.created_at as created_at','orders.updated_at as updated_at','orders.remain as remain','employers.id as ids'))->groupBy('orders.ntd_id')->having(('orders.ntd_id'), '>', 1);
		 
	   //$employers=null;
	   
/*	$employers	=	Order::join('employers','orders.ntd_id','=','employers.id')
->select(array('orders.id as ckid','orders.ntd_id','orders.package_name','orders.created_date','orders.ended_date','orders.updated_at','orders.remain','employers.email as email'));*/


		return Datatables::of($employers)
		->remove_column('emid')
		->remove_column('end_xacthuc')
		->edit_column('xacthuc','@if($xacthuc==0) <span style="color:red">Chưa xác thực</span> @else 
			@if($end_xacthuc>date(\'Y-m-d H:i:s\'))
			Đã xác thực
			@else
			Hết hạn xác thực
			@endif 
		@endif')
		->edit_column('name','<a class="" href="{{URL::route("admin.employers.edit",$emid)}}?page={{'.$page.'}}&web=emp_vip" title="Edit">{{$name}}</a>')
		->edit_column('created_date','{{date("d-m-Y H:i:s",strtotime($created_date))}}')
		->edit_column('ended_date','{{date("d-m-Y H:i:s",strtotime($ended_date))}}')
		->edit_column('created_at','@if($created_at==$updated_at) Tham gia lần đầu @else Gia hạn @endif')
		->remove_column('updated_at')
		->edit_column('remain','{{$remain}} Ngày')
		->edit_column('ids', '
			<a class="btn btn-xs btn-info" href="{{URL::to("admin/order/package-employer/$ids")}}" title="Chỉnh sửa dịch vụ cho nhà tuyển dụng"><i class="ace-icon fa fa-cogs bigger-120"></i></a>
			')
		->make();



		


	}






}