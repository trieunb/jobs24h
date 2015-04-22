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

App::setLocale(Session::get('language', 'vi'));	

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix'=>'admin'), function() {

	Route::group(array('before'=>'sentry.admin'), function() {
		Route::get('/', array('as'=>'admin.dashboard', 'uses'=>'AdminController@index'));
		Route::get('profile', array('as'=>'admin.profile', 'uses'=>'AdminController@profile'));
		Route::get('users/datatables', array('as'=>'users.datatables', 'uses'=>'UserController@datatables'));
		Route::resource('users', 'UserController');
		Route::get('logout', array('as'=>'admin.logout', 'uses'=>'AuthController@logout'));
	});

	Route::group(array('before'=>'sentry.logged.admin'), function() {
		Route::get('login', 'AuthController@login');
		Route::post('login', 'AuthController@doLogin');
	});
});
