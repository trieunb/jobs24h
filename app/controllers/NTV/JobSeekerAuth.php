<?php 

/**
* JobSeekerAuth
*/

class JobSeekerAuth extends Controller
{
	
	public function login()
	{
		return View::make('jobseekers.login');
	}
	public function doLogin()
	{
		
		$params = Input::only('email', 'password');
		$validator = new App\DTT\Forms\JobSeekersLogin;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			try
			{
			     // Login credentials
			    $credentials = array(
			        'email'    => $params['email'],
			        'password' => $params['password']
			    );

			    // Authenticate the user
			    $user = Sentry::authenticate($credentials, true);	  	
			    return Redirect::route('jobseekers.home')->with('user', $user);
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
			    return Redirect::back()->withErrors('Login field is required.');
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
			    return Redirect::back()->withErrors('Password field is required.');
			}
			catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
			{
			    return Redirect::back()->withErrors('Wrong password, try again.');
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			    return Redirect::back()->withErrors( 'User was not found.');
			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
			{
			    return Redirect::back()->withErrors( 'User is not activated.');
			}
			// The following is only required if the throttling is enabled
			catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
			{
			    return Redirect::back()->withErrors( 'User is suspended.');
			}
			catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
			{
			    return Redirect::back()->withErrors( 'User is banned.');
			}
		}
	}
	public function register()
	{
		return View::make('jobseekers.register');
	}
	public function doRegister() 
	{
		$params = Input::only('first_name','last_name','email', 'password','subscribe');
		$validator = new App\DTT\Forms\JobSeekersRegister;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			try {
				if ($params['subscribe'] == null){$params['subscribe'] = 0;}
				$user = Sentry::register(array(
					'first_name'=> $params['first_name'],
					'last_name' => $params['last_name'],
			        'email'     => $params['email'],
			        'password'  => $params['password'],
			        'subscribe' => $params['subscribe'],
			    ));
			    $activationCode = $user->getActivationCode();
				$subject = "Kich hoat tai khoan VNJobs / Activate your VNJobs account";
				$message = "<h3>Chào mừng bạn đến với VnJobs</h3>Chào ".$params['last_name'].",<br>Để hoàn thành việc đăng kí và truy cập vào tài khoản mới của bạn tại VNJobs.<br><a href='".URL::to(''.App::getLocale().'/jobseekers/account-active/'.$params['email'].'/'.$activationCode.'')."' style='font-family: Arial,sans-serif;font-size: 16px;font-weight: bold;color: #ffffff;text-decoration: none;display: inline-block;background:orange;padding:12px;margin:10px 0; border-radius:5px;'>Kích hoạt tài khoản của bạn ngay.</a><br>Đây là thông tin quan trọng về tài khoản mới của bạn. Bạn nên giữ lại email này để bảo lưu thông tin.<br>Email đăng nhập: ".$params['email']."<br>Mật khẩu: ".$params['password']."<br><br><p style='font-size:12px;line-height:18px;color:#555'><em style='font-size:11px'>Đây là email tự động, vui lòng không trả lời email này</em></p>";

			   	// setting the server, port and encryption
				if(App\DTT\Services\SendMail::send($params['email'], $params['last_name'], $subject, $message ) )
				{
					return Redirect::back()->with('success', 'Chúc mừng bạn đã đăng ký thành công! <br>Vui lòng mở email và làm theo hướng dẫn để kích hoạt tài khoản của bạn.');
				} else {
					return Redirect::back()->with('success', 'Hiện tại bạn không thể đăng ký. Xin vui lòng thử lại sau.');
				}
			} catch (Exception $e) {
				return Redirect::back()->withInput()->withErrors($e);
			}
		}
	}
	public function checkActive($email, $code)
	{
		if($email != null && $code != null){
			try
			{
			    $user = Sentry::findUserByLogin($email);
			    if($user->activated != 1){
			    // Attempt to activate the user
					if ($user->attemptActivation($code))
				    {
				        return Redirect::route('account-active')->with('success', 'Kích hoạt tài khoản thành công. Click vào đây để chuyển đến trang <a href="'.URL::route('jobseekers.login').'" class="text-blue">Đăng nhập</a>');
				    }
				    else
				    {
				        return Redirect::route('account-active')->withErrors('Email hoặc mã kích hoạt không đúng. Xin vui lòng kiểm tra lại.');
				    }
				}else{
					return Redirect::route('account-active')->with('success','Tài khoản này đã được kích hoạt.');
				}
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			    return Redirect::route('account-active')->withErrors('Không tìm thấy');
			}
		}
	}

	public function doResetPass(){
		$params = Input::only('email');
		try
		{
		    // Find the user using the user email address
		    $user = Sentry::findUserByLogin($params['email']);

		    // Get the password reset code
		    $resetCode = $user->getResetPasswordCode();
		    $subject = "Tao mat khau dang nhap moi tren VNJobs / Create new password on VNJobs";
			$message = "Chào ".$user->first_name. $user->last_name."<br>Đây là email giúp bạn tạo mật khẩu mới cho tài khoản trên VNJobs. Vui lòng <a href='".URL::to(''.App::getLocale().'/jobseekers/forgot-password/reset-password/'.$params['email']).'/'.$resetCode."'>click vào đây</a> để tạo mật khẩu mới.<br><small style='font-style:italic;'>Lưu ý: Nếu bạn không gửi yêu cầu đến chúng tôi, vui lòng bỏ qua email này.</small>";
		   	// setting the server, port and encryption
			if(App\DTT\Services\SendMail::send($params['email'],$user->last_name, $subject, $message ) )
			{
				return Redirect::back()->with('success', 'Yêu cầu của bạn được chuyển đi thành công! <br>Vui lòng mở email và làm theo hướng dẫn.');
			} else {
				return Redirect::back()->withErrors('success', 'Hiện tại bạn không thể thực hiện yêu cầu này. Xin vui lòng thử lại sau.');
			}
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    return Redirect::back()->withInput->withErrors('Không tìm thấy email');
		}
	}

	public function ChangePass($email, $code){
		return View::make('jobseekers.reset-password')->with('email',$email)->with('code',$code);
	}
	public function doChangePass($email, $code){
		$params = Input::only('password');
		$validator = new App\DTT\Forms\JobseekerResetPass;
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			try
			{
			    // Find the user using the user id
			    $user = Sentry::findUserByLogin($email);

			    // Check if the reset password code is valid
			    if ($user->checkResetPasswordCode($code))
			    {
			        // Attempt to reset the user password
			        if ($user->attemptResetPassword($code, $params['password']))
			        {
			            return Redirect::route('jobseekers.login')->with('success', 'Thay đổi mật khẩu mới thành công. Đăng nhập và tìm kiếm cơ hội việc làm của bạn');
			        }
			        else
			        {
			            return Redirect::back()->withErrors('Hiện tại bạn không thể thực hiện yêu cầu này. Xin vui lòng thử lại sau.');
			        }
			    }
			    else
			    {
			        return Redirect::back()->withErrors('Hiện tại bạn không thể thực hiện yêu cầu này. ');
			    }
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			    return Redirect::back()->withErrors('Không tìm thấy email');
			}
		}
	}
}