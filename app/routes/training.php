<?php 
Route::group(array('prefix'=>$locale), function() {
	Route::group(array('prefix'=>'trainings'), function() {
		Route::get('/', array('as'=>'trainings.home', 'uses'=>'TrainingController@home'));
		
		});
	});

