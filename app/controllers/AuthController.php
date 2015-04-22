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
			try {
				$remember = Input::get('remember', false);
				$credentials = Input::only('username', 'password');
				$user = Sentry::authenticate($credentials, $remember);
				if($user->hasAccess('admin')) return Redirect::to('/admin/');
				else $error = Lang::get('validation.login_permission');
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
			    $error = Lang::get('validation.required');
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
			    $error = Lang::get('validation.required');
			}
			catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
			{
			    $error = Lang::get('validation.login_failed');
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			    $error = Lang::get('validation.login_failed');
			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
			{
			    $error = Lang::get('validation.login_notactive');
			}

			// The following is only required if the throttling is enabled
			catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
			{
			    $error = Lang::get('validation.login_suspend');
			}
			catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
			{
			    $error = Lang::get('validation.login_suspend');
			}
			return Redirect::back()->withInput()->withErrors($error);
			
		}
	}
	public function logout()
	{
		Sentry::logout();
		return Redirect::to('/');
	}
}