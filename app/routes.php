<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() use($locale)
{
	return Redirect::to('/'.$locale.'/jobseekers');
});
Route::get('/' .$locale, function() use($locale)
{
	if(Request::header('referer'))
	{
		$refererUrl = Request::header('referer');
		$refererUrl = preg_replace("/\/(en|vi)\//", "/$locale/", $refererUrl);
		return Redirect::to($refererUrl);
	} else {
		return Redirect::to('/'.$locale.'/jobseekers');
	}
	die();
});

