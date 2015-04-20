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

Route::get('/', function()
{
	return View::make('hello');
});
<<<<<<< HEAD

Route::get('admin/login', 'AuthController@login' );
Route::post('admin/login', 'AuthController@doLogin' );
=======
Route::get('admin/dashboard','AdminController@index');
>>>>>>> cc50c047d6c6228f8742d3f68f27d798f0b9da94
