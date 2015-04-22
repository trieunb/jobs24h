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
			$remember = Input::get('remember', false);
			$credentials = Input::only('username', 'password');
			$user = AdminAuth::authenticate($credentials, $remember);
			if($user)
			{
				return Redirect::to('/admin/');
			}
			return Redirect::back()->withInput()->withErrors('Tên đăng nhập hoặc mật khẩu không đúng !');
			
		}
	}
	public function logout()
	{
		AdminAuth::logout();
		return Redirect::to('/');
	}
}