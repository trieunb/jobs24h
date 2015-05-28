<?php

class Application extends \Eloquent {
	protected $fillable = [];
	protected $table = 'application';
	public function job()
	{
		return $this->belongsTo('Job', 'job_id');
	}
	public function folder()
	{
		return $this->belongsTo('EFolder', 'folder_id');
	}
	public function full_name() 
	{
		return $this->first_name . " " . $this->last_name;
	}
}