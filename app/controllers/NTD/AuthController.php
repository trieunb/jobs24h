<?php
namespace NTD;
use View, Input, Redirect, Hash, Company, Auth, NTD;
class AuthController extends \BaseController {

	public function getLogin()
	{
		return View::make('employers.login');
	}
	public function postLogin()
	{
		$candicates = array(
			'email'		=>	Input::get('email'),
			'password'	=>	Input::get('password')
			);
		if(Auth::attempt($candicates, true))
		{
			return Redirect::route('employers.jobs.index');
		} else {
			return Redirect::back()->withInput()->withErrors('Thông tin đăng nhập không chính xác !');
		}
	}
	public function getRegister()
	{
		return View::make('employers.register');
	}
	public function postRegister()
	{
		$validator = new \App\DTT\Forms\EmployerRegister;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$ntd = new NTD;
			$ntd->email = Input::get('email');
			$ntd->password = Hash::make(Input::get('password'));
			if($ntd->save())
			{
				$company = new Company;
				$company->company_name = Input::get('company_name');
				$company->total_staff = Input::get('quymo');
				$company->full_description = Input::get('soluoc');
				$company->company_address = Input::get('company_address');
				$company->contact_name = Input::get('contact_name');
				$company->save();
				return Redirect::back()->with('success', 'Tạo tài khoản thành công. Vui lòng đăng nhập.');
			}
		}
	}
		

}