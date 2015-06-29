<?php

class News extends Controller
{
	public function __construct(){

	}
	public function getIndex($id){
		$new = TrainingPost::find($id);
		return View::make('jobseeker.news', compact('news'));
	}
}