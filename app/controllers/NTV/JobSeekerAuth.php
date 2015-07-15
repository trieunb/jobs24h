<?php 

/**
* JobSeekerAuth
*/

class JobSeekerAuth extends Controller
{
	
	public function loginWithFacebook() {

	    // get data from input
	    $code = Input::get( 'code' );

	    // get fb service
	    $fb = OAuth::consumer( 'Facebook' );

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if ( !empty( $code ) ) {

	        // This was a callback request from facebook, get the token
	        $token = $fb->requestAccessToken( $code );

	        // Send a request with it
	        $result = json_decode( $fb->request( '/me' ), true );
	        $chk = NTVSentry::where('email', $result['email'])->get();
	        if(count($chk)){
	        	if($chk[0]->facebook_ID != null ){
	        		$user = NTVSentry::where('email', $result['email'])->where('facebook_ID', $result['id'])->first();
		        	if($user != null){
		        		// Log the user in
	    				Sentry::login($user, false);
		        		return Redirect::route('jobseekers.home')->with('user', $user);
		        	}
	        	}else{
	        		$user = Sentry::findUserById($chk[0]->id);
	        		$user->facebook_ID = $result['id'];
	        		// Update the user
				    if ($user->save())
				    {
				        return Redirect::route('jobseekers.login')->withErrors('Người dùng đã tồn tại. Vui lòng đăng nhập');
				    }
	        	}
	        	
	        }else{
	        	$user = Sentry::register(array(
	        		'facebook_ID'	=> $result['id'],
					'first_name'	=> $result['first_name'],
					'last_name' 	=> $result['last_name'],
				    'email'     	=> $result['email'],
				    'password'		=> 'mptelecom!@#',
				    'activated' 	=> true,
				));

		        $credentials = array(
			        'email'    => $result['email'],
			        'password' => 'mptelecom!@#',
			    );
			     // Authenticate the user
				$user = Sentry::authenticate($credentials, true);				    
				return Redirect::route('jobseekers.home')->with('user', $user);
	        }
			

	    }
	    // if not ask for permission first
	    else {
	        // get fb authorization
	        $url = $fb->getAuthorizationUri();

	        // return to facebook login url
			return Redirect::to( (string)$url );

	    }

	}


	public function loginWithGoogle() {

	    // get data from input
	    $code = Input::get( 'code' );

	    // get google service
	    $googleService = OAuth::consumer( 'Google' );

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if ( !empty( $code ) ) {

	        // This was a callback request from google, get the token
	        $token = $googleService->requestAccessToken( $code );

	        // Send a request with it
	        $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );
	        $chk = NTVSentry::where('email', $result['email'])->get();
	        if(count($chk)){
	        	if($chk[0]->facebook_ID != null ){
	        		$user = NTVSentry::where('email', $result['email'])->where('gplus_ID', $result['id'])->first();
		        	if($user != null){
		        		// Log the user in
	    				Sentry::login($user, false);
		        		return Redirect::route('jobseekers.home')->with('user', $user);
		        	}
	        	}else{
	        		$user = Sentry::findUserById($chk[0]->id);
	        		$user->facebook_ID = $result['id'];
	        		// Update the user
				    if ($user->save())
				    {
				        return Redirect::route('jobseekers.login')->withErrors('Người dùng đã tồn tại. Vui lòng đăng nhập');
				    }
	        	}
	        	
	        }else{
	        	$gender = 1;
	        	if($result['gender'] == 'male') $gender = 0;
	        	$user = Sentry::register(array(
	        		'gplus_ID' 	=> $result['id'],
					'first_name'=> $result['given_name'],
					'last_name' => $result['family_name'],
				    'email'     => $result['email'],
				    'gender'    => $gender,
				    'password'	=> 'mptelecom!@#',
				    'activated' => true,
				));

		        $credentials = array(
			        'email'    => $result['email'],
			        'password' => 'mptelecom!@#',
			    );			    
			    $user = Sentry::authenticate($credentials, true);				    
				return Redirect::route('jobseekers.home')->with('user', $user);
	        }

	    }
	    // if not ask for permission first
	    else {
	        // get googleService authorization
	        $url = $googleService->getAuthorizationUri();

	        // return to google login url
	        return Redirect::to( (string)$url );
	    }

	}


	public function loginWithLinkedin() {

        // get data from input
        $code = Input::get( 'code' );

        $linkedinService = OAuth::consumer( 'Linkedin' );


        if ( !empty( $code ) ) {

            // This was a callback request from linkedin, get the token
            $token = $linkedinService->requestAccessToken( $code );
            // Send a request with it. Please note that XML is the default format.
            //$result = json_decode($linkedinService->request('/people/~?format=json'), true);
            $result = json_decode($linkedinService->request('/people/~:(id,first-name,last-name,headline,member-url-resources,picture-url,location,public-profile-url,email-address)?format=json'), true);
            $chk = NTVSentry::where('email', $result['emailAddress'])->get();
	         if(count($chk)){
	        	if($chk[0]->facebook_ID != null ){
	        		$user = NTVSentry::where('email', $result['emailAddress'])->where('linkedin_ID', $result['id'])->first();
		        	if($user != null){
		        		// Log the user in
	    				Sentry::login($user, false);
		        		return Redirect::route('jobseekers.home')->with('user', $user);
		        	}
	        	}else{
	        		$user = Sentry::findUserById($chk[0]->id);
	        		$user->facebook_ID = $result['id'];
	        		// Update the user
				    if ($user->save())
				    {
				        return Redirect::route('jobseekers.login')->withErrors('Người dùng đã tồn tại. Vui lòng đăng nhập');
				    }
	        	}
	        	
	        }else{
	        	$user = Sentry::register(array(
	        		'linkedin_ID'	=> $result['id'],
					'first_name'	=> $result['firstName'],
					'last_name' 	=> $result['lastName'],
				    'email'     	=> $result['emailAddress'],
				    'password'		=> 'mptelecom!@#',
				    'activated' 	=> true,
				));

		        $credentials = array(
			        'email'    => $result['emailAddress'],
			        'password' => 'mptelecom!@#',
			    );
			    // Authenticate the user
				$user = Sentry::authenticate($credentials, true);	  	
				return Redirect::route('jobseekers.home')->with('user', $user);			    
	        }
        }// if not ask for permission first
        else {
            // get linkedinService authorization
            $url = $linkedinService->getAuthorizationUri(array('state'=>'DCEEFWF45453sdffef424'));

            // return to linkedin login url
            return Redirect::to( (string)$url );
        }


    }

	public function loginWithYahoo() {
	   	// get data from input
	    $token = Input::get( 'oauth_token' );
	    $verify = Input::get( 'oauth_verifier' );
	    // get yahoo service
	    $yh = OAuth::consumer( 'Yahoo' );

	    // if code is provided get user data and sign in
	    if ( !empty( $token ) && !empty( $verify ) ) {
	                // This was a callback request from yahoo, get the token
	                $token = $yh->requestAccessToken( $token, $verify );
	                $xid = array($token->getExtraParams());
	                $result = json_decode( $yh->request( 'https://social.yahooapis.com/v1/user/'.$xid[0]['xoauth_yahoo_guid'].'/profile?format=json' ), true ); 
	                var_dump($result); die();
	                dd($result);                                
	    }
	    // if not ask for permission first
	    else {
	        // get request token
	        $reqToken = $yh->requestRequestToken();
	        // get Authorization Uri sending the request token
	        $url = $yh->getAuthorizationUri(array('oauth_token' => $reqToken->getRequestToken()));
	        // return to yahoo login url
	        return Redirect::to( (string)$url );
	    }
	}

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
			    return Redirect::back()->withInput()->withErrors('Vui lòng nhập Email.');
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
			    return Redirect::back()->withInput()->withErrors('Vui lòng nhập mật khẩu.');
			}
			catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
			{
			    return Redirect::back()->withInput()->withErrors('Sai mật khẩu, vui lòng thử lại.');
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			    return Redirect::back()->withInput()->withErrors( 'Không tìm thấy người dùng.');
			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
			{
			    return Redirect::back()->withInput()->withErrors( 'Người dùng chưa được kích hoạt.');
			}
			// The following is only required if the throttling is enabled
			catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
			{
			    return Redirect::back()->withInput()->withErrors( 'Người dùng đã bị khóa.');
			}
			catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
			{
			    return Redirect::back()->withInput()->withErrors( 'User is banned.');
			}
		}
	}

	public function loginAjax()
	{
		$params = Input::all();
		$respond['has'] = false;
		if(Request::ajax()){
			$validator = new App\DTT\Forms\JobSeekersLogin;
			if($validator->fails())
			{
				$respond['message'] = $validator->getMessageBag()->toJson();
				return Response::json($respond);
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
				    $respond['has'] = true;
					$respond['message'] = 'Đăng nhập thành công.';
					return Response::json($respond);
				}
				catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
				{
				    $respond['message'] = json_encode(array('' => 'Vui lòng nhập Email.'));
					return Response::json($respond);
				}
				catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
				{
				    $respond['message'] = json_encode(array('' => 'Vui lòng nhập mật khẩu.'));
					return Response::json($respond);
				}
				catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
				{
				    $respond['message'] = json_encode(array('' => 'Sai mật khẩu, vui lòng thử lại.'));
					return Response::json($respond);
				}
				catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
				{
				    $respond['message'] = json_encode(array('' => 'Không tìm thấy người dùng.'));
					return Response::json($respond);
				}
				catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
				{
				    $respond['message'] = json_encode(array('' => 'Người dùng chưa được kích hoạt.'));
					return Response::json($respond);
				}
				// The following is only required if the throttling is enabled
				catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
				{
				    $respond['message'] = json_encode(array('' => 'Người dùng đã bị khóa.'));
					return Response::json($respond);
				}
				catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
				{
				    $respond['message'] = json_encode(array('' => 'User is banned.'));
					return Response::json($respond);
				}
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
	public function logout(){
		Sentry::logout();
		return Redirect::route('jobseekers.home');
	}
}