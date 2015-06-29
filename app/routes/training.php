<?php 
Route::group(array('prefix'=>$locale), function() {
	Route::group(array('prefix'=>'trainings'), function() {
		Route::get('/', array('as'=>'trainings.home', 'uses'=>'TrainingController@home'));
		Route::get('/detail-doc/{id}', array('as'=>'trainings.detaildoc', 'uses'=>'TrainingController@detail_doc')); 
		Route::get('/dowload-doc/{id}',array('as'=>'trainings.dowloaddoc', 'uses'=>'TrainingController@dowload_doc'));
		Route::get('/detail-post/{id}', array('as'=>'trainings.detailpost', 'uses'=>'TrainingController@detail_post'));
		Route::get('/detail-couser/{id}',array('as'=>'trainings.detailcouser', 'uses'=>'TrainingController@detail_couser'));
		Route::post('/detail-couser/{id}',array('as'=>'trainings.detailcouser', 'uses'=>'TrainingController@post_detail_couser'));
		Route::get('/all-doc',array('as'=>'trainings.alldoc', 'uses'=>'TrainingController@all_doc'));
		Route::get('/all-couser',array('as'=>'trainings.allcouser', 'uses'=>'TrainingController@all_couser'));
		Route::get('/all-post',array('as'=>'trainings.allpost', 'uses'=>'TrainingController@all_post'));

		});
	});

