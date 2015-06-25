<?php 
Route::group(array('prefix'=>$locale), function() {
	Route::group(array('prefix'=>'cungunglaodong'), function() {
		Route::get('/', array('as'=>'cungunglaodong.home', 'uses'=>'CungungController@home'));
		Route::get('/detail/{id}', array('as'=>'cungunglaodong.detail', 'uses'=>'CungungController@detail')); 
		
		});
	});

