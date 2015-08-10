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
		$employers = NTD::select('id as ckid', 'id', 'email', 'full_name', 'created_at', 'is_active', 'id as idd', 'id as ids')->with('job');
		return Datatables::of($employers)
		->edit_column('ckid', '<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
')
		->remove_column('last_name')
		->edit_column('is_active', '@if($is_active==1)<span class="label label-success">Kích hoạt</span>@else <span class="label label-info">Không kích hoạt</span>@endif')
		->edit_column('idd', '{{ HTML::link(URL::route("admin.jobs.index", ["id"=>$id]), count($job) ) }}')

		->edit_column('ids', '
			{{ Form::open(array("method"=>"delete", "route"=>array("admin.employers.destroy", $id) )) }}
			<a class="btn btn-xs btn-info" href="{{URL::route("admin.employers.edit", array($id) )}}" title="Edit"><i class="ace-icon fa fa-pencil bigger-120"></i></a> 
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
				$company->company_name = '';
				$company->total_staff = 1;
				$company->full_description = '';
				$company->company_address = '';
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
	public function update($id)
	{
		//
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
			return Redirect::route('admin.employers.index')->withSuccess('Lưu thông tin thành công.');
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

}