<?php 

class AuthController extends Controller {
	
	public function login()
	{
		return View::make('admin.login');
	}
	public function doLogin()
	{
		$validator = new App\DTT\Forms\UserLoginForm;

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		} else {
			return Redirect::back()->with('success', 'Login Success')->withInput();
		}
	}
}