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
		return "Login POST Method";
	}
	public function register()
	{
		return View::make('jobseekers.register');
	}
	public function doRegister()
	{
		return "Register Action";
	}
}