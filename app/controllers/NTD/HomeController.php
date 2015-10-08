<?php 
namespace NTD;
use View,Redirect,DB;
class HomeController extends \Controller {
	
	public function home()
	{
		
		return Redirect::route('employers.launching');
	}
	public function launching()
	{
		 
		return View::make('employers.launching');
	}
}