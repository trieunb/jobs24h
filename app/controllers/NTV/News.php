<?php

class News extends Controller
{
	public function __construct(){

	}
	public function getIndex($id){
		$new = TrainingPost::find($id);
		$related = TrainingPost::where('training_cat_id', $new->training_cat_id)->where('id', '!=', $new->id)->take(10)->get();
		return View::make('jobseekers.news', compact('new','related'));
	}
}