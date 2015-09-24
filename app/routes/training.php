<?php 
Route::group(array('prefix'=>$locale), function() {
	Route::group(array('prefix'=>'dao-tao'), function() {
		Route::get('/', array('as'=>'trainings.home', 'uses'=>'TrainingController@home'));
		Route::get('/tai-lieu/{id}', array('as'=>'trainings.detaildoc', 'uses'=>'TrainingController@detail_doc')); 
		Route::get('/download-tai-lieu/{id}',array('as'=>'trainings.dowloaddoc', 'uses'=>'TrainingController@dowload_doc'));
		Route::get('/bai-viet/{id}', array('as'=>'trainings.detailpost', 'uses'=>'TrainingController@detail_post'));
		Route::get('/khoa-hoc/{id}',array('as'=>'trainings.detailcouser', 'uses'=>'TrainingController@detail_couser'));
		Route::post('/khoa-hoc/{id}',array('as'=>'trainings.detailcouser', 'uses'=>'TrainingController@post_detail_couser'));
		Route::get('/tat-ca-tai-lieu',array('as'=>'trainings.alldoc', 'uses'=>'TrainingController@all_doc'));
		Route::get('/tat-ca-khoa-hoc',array('as'=>'trainings.allcouser', 'uses'=>'TrainingController@all_couser'));
		Route::get('/tat-ca-bai-viet',array('as'=>'trainings.allpost', 'uses'=>'TrainingController@all_post'));
		Route::get('/tat-ca-giang-vien',array('as'=>'trainings.allgv', 'uses'=>'TrainingController@all_gv'));
		Route::get('/demo', function()
		{
			return View::make('training.demo');
		});

		
		});
	});

