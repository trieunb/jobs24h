<?php 
namespace NTD;
use View, Redirect, NTD, Auth, Job, Validator, Hash, Input;
class AccountController extends \Controller {
	public function getIndex()
	{
		return Redirect::route('employers.account.company');
	}
	public function getCompany()
	{
		return View::make('employers.account.company');
	}
	public function getCompanyReview()
	{
		$company = NTD::find(Auth::id() )->company;
		$jobs = Job::where('ntd_id', Auth::id())->orderBy('id', 'desc')->paginate(3);
		return View::make('employers.account.company_review', compact('company', 'jobs'));
	}
	public function getChangePass()
	{
		$user = Auth::getUser();
		return View::make('employers.account.change_pass', compact('user'));
	}
	public function postChangePass()
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
				return Redirect::back()->with('success', 'Thay đổi mật khẩu thành công.');
			}
		}
	}
	public function getChangeEmail()
	{
		$user = Auth::getUser();
		return View::make('employers.account.change_email', compact('user'));
	}
	public function postChangeEmail()
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
	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('employers.launching');
	}
}