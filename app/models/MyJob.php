<?php

class MyJob extends \Eloquent {
	protected $fillable = ['ntv_id', 'job_id'];
	protected $table = 'my_jobs';

	public function application(){
		return $this->hasMany('Application', 'job_id');
	}
	public function jobs(){
		return $this->beLongsTo('Job', 'job_id');
	}
	
}
