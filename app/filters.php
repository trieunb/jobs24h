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
Route::filter('sentry.ntd', function() {
	if( ! Sentry::check())
	{
		return Redirect::to('/employer/login');
	} else {
		$user = Sentry::getUser();
		if( ! $user->hasAccess('ntd'))
		{
			return Redirect::to('/employer/login');
		}
	}
});
Route::filter('sentry.ntv', function() {
	if( ! Sentry::check())
	{
		return Redirect::to('/login');
	} else {
		$user = Sentry::getUser();
		if( ! $user->hasAccess('ntv'))
		{
			return Redirect::to('/login');
		}
	}
});
Route::filter('sentry.logged.admin', function() {
	if( AdminAuth::check())
	{
		return Redirect::to('/admin/');
	}
	
});
Route::filter('sentry.logged.ntd', function() {
	if( Sentry::check())
	{
		$user = Sentry::getUser();
		if($user->hasAccess('ntd'))
		{
			return Redirect::to('/employer/');
		}
	}
});
Route::filter('sentry.logged.ntv', function() {
	if( Sentry::check())
	{
		return Redirect::to('/profile');
	}
});

/**
 * Filter languages
 */
Route::filter('detectLang', function($lang = "vi")
{echo 'aaaaaa';
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
