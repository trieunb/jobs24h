<?php 
namespace NTD;
use View;
class HomeController extends \Controller {
	
	public function home()
	{
		return "Dash board";
	}
	public function launching()
	{
		return View::make('employers.launching');
	}
}