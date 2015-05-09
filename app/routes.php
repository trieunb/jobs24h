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

Route::group(array('prefix'=>'admin'), function() {

	Route::group(array('before'=>'sentry.admin'), function() {
		Route::get('/', array('as'=>'admin.dashboard', 'uses'=>'AdminController@index'));
		Route::get('profile', array('as'=>'admin.profile', 'uses'=>'AdminController@profile'));
		Route::get('users/datatables', array('as'=>'users.datatables', 'uses'=>'UserController@datatables'));
		Route::resource('users', 'UserController');
		Route::get('jobseekers/datatables', array('as'=>'jobseekers.datatables', 'uses'=>'JobSeekerController@datatables'));
		Route::resource('jobseekers', 'JobSeekerController');
		Route::get('employers/datatables', array('as'=>'employers.datatables', 'uses'=>'EmployerController@datatables'));
		Route::resource('employers', 'EmployerController');
		Route::get('resumes/creates/{id}', array('as'=>'resumes.creates', 'uses'=>'ResumeController@creates'));
		Route::get('resumes/{id}/download', array('as'=>'resumes.download', 'uses'=>'ResumeController@download'));
		Route::get('resumes/datatables', array('as'=>'resumes.datatables', 'uses'=>'ResumeController@datatables'));
		Route::resource('resumes', 'ResumeController');
		Route::get('logout', array('as'=>'admin.logout', 'uses'=>'AuthController@logout'));
	});

	Route::group(array('before'=>'sentry.logged.admin'), function() {
		Route::get('login', 'AuthController@login');
		Route::post('login', 'AuthController@doLogin');
	});
});

Route::group(array('prefix'=>$locale), function() {
	Route::group(array('prefix'=>'jobseekers'), function() {
		Route::get('/', array('as'=>'jobseekers.home', 'uses'=>'JobSeeker@home'));
		Route::get('/login', array('as'=>'jobseekers.login', 'uses'=>'JobSeekerAuth@login') );
		Route::post('/login', 'JobSeekerAuth@doLogin' );
		Route::get('/register', array('as'=>'jobseekers.register', 'uses'=>'JobSeekerAuth@register') );
		Route::post('/register', 'JobSeekerAuth@doRegister' );
	});
});


