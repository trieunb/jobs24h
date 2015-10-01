<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

/**
 * Filter authentication
 */

Route::filter('sentry.logged', function() {
	if(Sentry::check())
	{
		return Redirect::to('/');
	} 
});
Route::filter('sentry.admin', function() { //chan chua dang nhap
	if( ! AdminAuth::check())
	{
		return Redirect::to('/admin/login');
	}
	View::share('user', AdminAuth::getUser() );
});
Route::filter('ntd.guest', function() {
	if(Auth::check())
	{
		return Redirect::route('employers.jobs.index');
	}
});
Route::filter('sentry.ntv', function() {
	if( ! Sentry::check())
	{
		return Redirect::route('jobseekers.login');
	} 
});
Route::filter('sentry.logged.admin', function() {
	if( AdminAuth::check())
	{
		return Redirect::to('/admin/');
	}
	
});
Route::filter('ntd.auth', function() {
	if( ! Auth::check())
	{
		return Redirect::route('employers.login');
	}
});
Route::filter('sentry.logged.ntv', function() {
	if( Sentry::check())
	{
		return Redirect::route('jobseekers.edit-basic-info');
	}
});


//kiểm tra quyền admin
Route::filter('sentry.permissions.admin_full',function()
{
	if( !AdminAuth::check_permissions('admin_full'))
	{
		return "Bạn không được phép truy cập";

	}
	 
	 
	 
});

//Kiểm tra quyền nhà tuyển dụng
Route::filter('sentry.permissions.ntd_full',function()
{
	if( !AdminAuth::check_permissions('ntd_full'))
	{
		return "Bạn không được phép truy cập";

	}
	 
	 
});

//kiểm tra quyền người tìm việc
Route::filter('sentry.permissions.ntv_full',function()
{
	if( !AdminAuth::check_permissions('ntv_full'))
	{
		return "Bạn không được phép truy cập";

	}
	 
	 
});
//kiểm tra quyền training
Route::filter('sentry.permissions.train_full',function()
{
	if( !AdminAuth::check_permissions('train_full'))
	{
		return "Bạn không được phép truy cập";

	}
	 
	 
});
//kiểm tra quyền cung ứng
Route::filter('sentry.permissions.culd_full',function()
{
	if( !AdminAuth::check_permissions('culd_full'))
	{
		return "Bạn không được phép truy cập";

	}
	 
	 
});
//kiểm tra quyền tin tưc
Route::filter('sentry.permissions.news_full',function()
{
	if( !AdminAuth::check_permissions('news_full'))
	{
		return "Bạn không được phép truy cập";

	}
	 
	 
});

//kiểm tra quyền hiring
Route::filter('sentry.permissions.hiring_full',function()
{
	if( !AdminAuth::check_permissions('hiring_full'))
	{
		return "Bạn không được phép truy cập";

	}
	 
	 
});


/**
 * Filter languages
 */
Route::filter('detectLang', function($lang = "vi")
{
    if($lang != "vi" && in_array($lang , Config::get('app.available_language')))
    {
        Config::set('app.locale', $lang);
    }else{
        $browser_lang = !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',') : '';
        $browser_lang = substr($browser_lang, 0,2);
        $userLang = (in_array($browser_lang, Config::get('app.available_language'))) ? $browser_lang : Config::get('app.locale');
        Config::set('app.locale', $userLang);
    }
});

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
