<?php 
Route::group(array('prefix'=>$locale), function() {
	Route::group(array('prefix'=>'cung-ung-lao-dong'), function() {
		Route::get('/', array('as'=>'cungunglaodong.home', 'uses'=>'CungungController@home'));
		Route::get('/chi-tiet/{id}', array('as'=>'cungunglaodong.detail', 'uses'=>'CungungController@detail')); 
		
		});
	});

