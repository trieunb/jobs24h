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

		$employers = NTD::join('companies','employers.id','=','companies.ntd_id')->select('employers.id as ckid', 'employers.id as id', 'companies.company_name as company_name', 'employers.email','employers.phone_number', 'employers.created_at', 'employers.is_active', 'employers.id as idd', 'employers.id as ids')->with('job');
		return Datatables::of($employers)

		->edit_column('ckid', '<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
		')
		->edit_column('company_name','<a class="" href="{{URL::route("admin.employers.edit1", array('.$page.',$id) )}}" title="Edit">{{$company_name}}</a>')
		->remove_column('id')
		->edit_column('is_active', '@if($is_active==1)<span class="label label-success">Kích hoạt</span>@else <span class="label label-info">Không kích hoạt</span>@endif')
		->edit_column('idd', '{{ HTML::link(URL::route("admin.jobs.index", ["id"=>$id]), count($job) ) }}')

		->edit_column('ids', '
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.employers.destroy", $id) )) }}
			
			<a class="btn btn-xs btn-info" href="{{URL::to("admin/order/index/$id")}}" title="Chỉnh sửa dịch vụ cho nhà tuyển dụng"><i class="ace-icon fa fa-cogs bigger-120"></i></a> 
			<button class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete ?\');" type="submit" title="Delete"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
			{{ Form::close() }}
			')
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
		$data = Input::all();
	
		$validator = new AdminNTDCreate;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			unset($data['_token']);
			$data['password'] = Hash::make($data['password']);
			$ntd = NTD::create($data);
			if($ntd) {
				$company = new Company;
				$company->ntd_id = $ntd->id;
				$company->company_name = $data['company_name'];
				$company->total_staff = $data['quymo'];
				$company->full_description =$data['soluoc'];
				$company->company_address = $data['company_address'];
				$company->contact_name = $data['full_name'];
				$company->save();

				return Redirect::route('admin.employers.index')->withSuccess('Thêm mới NTD thành công.');
			}
			else return Redirect::back()->withErrors('Có lỗi khi thêm.');
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
		$employer = NTD::find($id);
		if(!$employer) return Response::make('Không tìm thấy NTD');
		return View::make('admin.employers.edit', compact('employer'));
	}


	public function edit($id)
	{
		//
		$employer = NTD::find($id);
		if(!$employer) return Response::make('Không tìm thấy NTD');
		return View::make('admin.employers.edit', compact('employer'));
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
		//
		$page=0;
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
		}
	}


	public function postEditEmployers($page,$id) // của controller
	{
		//
		$page=$page;
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
		/*$employers	=	Order::select('id as ckid','ntd_id','package_name','created_date','ended_date','updated_at','remain')->with('ntd')->addSelect('ntd.email as email');
		var_dump($employers->get()->toArray());
		die();*/
		$job_not_active=Job::where('status','<>',1)->count(); 
		$ntd_vip	=	Order::count(); 
		
		return View::make('admin.employers.report',compact('job_not_active','ntd_vip'));
	}


	public function datatables_vip()
	{

		$page=0;
		$employers = Order::join('employers','orders.ntd_id','=','employers.id')->join('companies','orders.ntd_id','=','companies.ntd_id')
	   ->select(array('orders.id as ckid','employers.id as emid','companies.company_name as name','orders.package_name','orders.created_date as created_date','orders.ended_date as ended_date','orders.created_at as created_at','orders.updated_at as updated_at','orders.remain as remain','employers.id as ids'));


/*	$employers	=	Order::join('employers','orders.ntd_id','=','employers.id')
->select(array('orders.id as ckid','orders.ntd_id','orders.package_name','orders.created_date','orders.ended_date','orders.updated_at','orders.remain','employers.email as email'));*/


		return Datatables::of($employers)
		->remove_column('emid')
		->edit_column('name','<a class="" href="{{URL::route("admin.employers.edit1", array('.$page.',$emid) )}}" title="Edit">{{$name}}</a>')
		->edit_column('created_date','{{date("d-m-Y H:i:s",strtotime($created_date))}}')
		->edit_column('ended_date','{{date("d-m-Y H:i:s",strtotime($ended_date))}}')
		->edit_column('created_at','@if($created_at==$updated_at) Tham gia lần đầu @else Gia hạn @endif')
		->remove_column('updated_at')
		->edit_column('remain','{{$remain}} Ngày')
		->edit_column('ids', '
			<a class="btn btn-xs btn-info" href="{{URL::to("admin/order/index/$ids")}}" title="Chỉnh sửa dịch vụ cho nhà tuyển dụng"><i class="ace-icon fa fa-cogs bigger-120"></i></a>
			')
		->make();



		


	}






}