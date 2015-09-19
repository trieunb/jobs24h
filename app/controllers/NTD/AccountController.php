<?php 
namespace NTD;
use View, Redirect, NTD, Auth, Job, Validator, Hash, Input, RespondLetter, Response, RespondAuto;
use Company, Config;
class AccountController extends \Controller {
	public function __construct()
	{
		$user = Auth::getUser();
		View::share('user', $user);
	}
	public function getIndex()
	{
		return Redirect::route('employers.account.company');
	}
	public function getThongTinCongTy()
	{
		$com = Company::where('ntd_id', Auth::id())->first();
		return View::make('employers.account.company', compact('com'));
	}
	public function postThongTinCongTy()
	{
		 
		$params = Input::all();
		$validator = new \App\DTT\Forms\EmployerUpdateCompany;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			if (Input::hasFile('filelogo')) {
				$path = Config::get('app.upload_path').'companies/logos/';
				Input::file('filelogo')->move($path, Input::file('filelogo')->getClientOriginalName());
				$params['logo'] = Input::file('filelogo')->getClientOriginalName();
			}
			unset($params['filelogo']);
			unset($params['_token']);
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
				unset($params['image'.$i]);
				
			}
			if($hasImage) $params['company_images'] = json_encode($company_images);
			Company::where('ntd_id', Auth::id())->update($params);
			return Redirect::route('employers.account.companyreview');
		}
	}
	public function getXemThongTinCongTy()
	{
		$company = NTD::find(Auth::id() )->company;
		$jobs = Job::where('ntd_id', Auth::id())->orderBy('id', 'desc')->paginate(3);
		return View::make('employers.account.company_review', compact('company', 'jobs'));
	}
	public function getDoiMatKhau()
	{
		$user = Auth::getUser();
		return View::make('employers.account.change_pass', compact('user'));
	}
	public function postDoiMatKhau()
	{
		$validator = new \App\DTT\Forms\EmployerChangePass;
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		} else {

			$user = Auth::getUser();
			if( ! Hash::check(Input::get('oldpass'), $user->password))
			{
				return Redirect::back()->withInput()->withErrors('Mật khẩu cũ không chính xác.');
			} else {
				$user->password = Hash::make(Input::get('password'));
				$user->save();
				\TaskLog::create(['ntd_id'=>Auth::id(), 'action_type'=>'create_folder','target'=>'Đổi mật khẩu user: ' . $user->full_name ]);
				return Redirect::back()->with('success', 'Thay đổi mật khẩu thành công.');
			}
		}
	}
	public function getDoiEmail()
	{
		$user = Auth::getUser();
		return View::make('employers.account.change_email', compact('user'));
	}
	public function postDoiEmail()
	{
		$rules = [
			'email'	=>	'required|confirmed|email|unique:employers,email,'.Auth::id(),
		];
		$messages = [
			'email.required'	=>	'Email không được để trống.',
			'email.confirmed'	=>	'Nhập lại email không chính xác.',
			'email.email'		=>	'Email không đúng định dạng',
			'email.unique'		=>	'Email đã tồn tại, vui lòng chọn email khác.'
		];
		$validator = Validator::make(Input::all(), $rules, $messages);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			//check Password
			$user = Auth::getUser();
			if( ! Hash::check(Input::get('password'), $user->password))
			{
				return Redirect::back()->withInput()->withErrors('Mật khẩu không chính xác.');
			} else {
				$user->email = Input::get('email');
				$user->save();
				return Redirect::back()->with('success', 'Đổi email thành công.');
			}
		}
	}
	public function getQuanLyTacVu()
	{
		$task = \TaskLog::where('ntd_id', Auth::id())->orderBy('id', 'desc')->paginate(20);
		return View::make('employers.account.task_logs', compact('task'));
	}
	public function getThongTinTaiKhoan()
	{
		return View::make('employers.account.user_information');
	}
	public function postThongTinTaiKhoan()
	{

		$user = Auth::getUser();
		if($user->update(Input::all())) return Redirect::back()->with('success', 'Cập nhật thông tin thành công.');
		return Redirect::back()->withErrors('Có lỗi khi cập nhật.');

	}
	public function getThuPhanHoiUngVien()
	{
		$letters = \RespondLetter::where('ntd_id', Auth::id())->orderBy('id', 'desc')->paginate(10);
		return View::make('employers.account.respond', compact('letters'));
	}
	public function getChinhSuaThu($id)
	{
		$letter = RespondLetter::where('ntd_id', Auth::id())->where('id', $id)->first();
		if( ! $letter) return Response::make('Không tìm thấy thư', 404);
		return View::make('employers.account.respond_edit', compact('letter'));
	}
	public function postChinhSuaThu($id)
	{
		$letter = RespondLetter::where('ntd_id', Auth::id())->where('id', $id)->first();
		if( ! $letter) return Response::make('Không tìm thấy thư', 404);
		$validator = new \App\DTT\Forms\EmployerAddLetter;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$letter = RespondLetter::find($id)->update(Input::all());
			if($letter) return Redirect::route('employers.account.respond')->withSuccess('Lưu thông tin thành công.');
			else return Redirect::back()->withInput()->withErrors('Có lỗi khi lưu.');
		}
	}
	public function getSaoChepThu($id)
	{
		$letter = RespondLetter::where('ntd_id', Auth::id())->where('id', $id)->first();
		if( ! $letter) return Redirect::back()->withErrors('Không tìm thấy thư');
		$this->createLetter(['subject'=>$letter->subject, 'content'=>$letter->content, 'type'=>$letter->type]);
		return Redirect::back()->withSuccess('Sao chép thư thành công.');
	}
	public function getTaoThuMoi()
	{
		return View::make('employers.account.respond_create');
	}
	public function postTaoThuMoi()
	{
		$validator = new \App\DTT\Forms\EmployerAddLetter;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$params = Input::all();
			$letter = $this->createLetter($params);
			if($letter) return Redirect::route('employers.account.respond')->withSuccess('Thêm mới thư thành công.');
			else return Redirect::back()->withInput()->withErrors('Có lỗi khi thêm mới thư.');
		}
	}
	public function postXoaThu()
	{
		$letters = Input::get('cbletter');
		if(count($letters))
		{
			$let = RespondLetter::whereIn('id', $letters)->where('ntd_id', Auth::id())->get();
			if(count($letters) != $let->count())
			{
				return Redirect::back()->withErrors('Không tìm thấy thư');
			} else {
				RespondLetter::whereIn('id', $letters)->delete();
				return Redirect::back()->withSuccess('Xóa thư thành công.');
			}
		}
		return Redirect::back()->withSuccess('Xóa thư thành công.');
	}
	private function createLetter($params)
	{
		$params['ntd_id'] = Auth::id();
		$params['created_date'] = date('Y-m-d');
		$params['status'] = 1;
		$letter = \RespondLetter::create($params);
		return $letter;
	}
	private function createLetterAuto($params)
	{
		$params['ntd_id'] = Auth::id();
		$params['created_date'] = date('Y-m-d');
		$letter = RespondAuto::create($params);
		return $letter;
	}
	public function getThuTraLoiTuDong()
	{
		$letters = RespondAuto::where('ntd_id', Auth::id())->orderBy('id', 'desc')->paginate(10);
		return View::make('employers.account.respond_auto', compact('letters'));
	}
	public function getChinhSuaThuTuDong($id)
	{
		$letter = RespondAuto::where('ntd_id', Auth::id())->where('id', $id)->first();
		if( ! $letter) return Response::make('Không tìm thấy thư', 404);
		return View::make('employers.account.respond_edit_auto', compact('letter'));
	}
	public function postChinhSuaThuTuDong($id)
	{
		$letter = RespondAuto::where('ntd_id', Auth::id())->where('id', $id)->first();
		if( ! $letter) return Response::make('Không tìm thấy thư', 404);
		$validator = new \App\DTT\Forms\EmployerAddLetter;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$letter = RespondAuto::find($id)->update(Input::all());
			if($letter) return Redirect::route('employers.account.auto')->withSuccess('Lưu thông tin thành công.');
			else return Redirect::back()->withInput()->withErrors('Có lỗi khi lưu.');
		}
	}
	public function getSaoChepThuTuDong($id)
	{
		$letter = RespondAuto::where('ntd_id', Auth::id())->where('id', $id)->first();
		if( ! $letter) return Redirect::back()->withErrors('Không tìm thấy thư');
		$this->createLetterAuto(['subject'=>$letter->subject, 'content'=>$letter->content, 'type'=>$letter->type]);
		return Redirect::back()->withSuccess('Sao chép thư thành công.');
	}
	public function getTaoThuTuDong()
	{
		return View::make('employers.account.respond_create_auto');
	}
	public function postTaoThuTuDong()
	{
		$validator = new \App\DTT\Forms\EmployerAddLetter;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$params = Input::all();
			$letter = $this->createLetterAuto($params);
			if($letter) return Redirect::route('employers.account.auto')->withSuccess('Thêm mới thư thành công.');
			else return Redirect::back()->withInput()->withErrors('Có lỗi khi thêm mới thư.');
		}
	}
	public function postXoaThuTuDong()
	{
		$letters = Input::get('cbletter');
		if(count($letters))
		{
			$let = RespondAuto::whereIn('id', $letters)->where('ntd_id', Auth::id())->get();
			if(count($letters) != $let->count())
			{
				return Redirect::back()->withErrors('Không tìm thấy thư');
			} else {
				RespondAuto::whereIn('id', $letters)->delete();
				Job::whereIn('letter_auto_id', $letters)->update(['letter_auto_id'=>0]);
				return Redirect::back()->withSuccess('Xóa thư thành công.');
			}
		}
		return Redirect::back()->withSuccess('Xóa thư thành công.');
	}
	public function getUserManager()
	{
		$users = 1;
		return View::make('employers.account.users');
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('employers.launching');
	}
}