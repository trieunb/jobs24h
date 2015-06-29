<?php

class Application extends \Eloquent {
	protected $fillable = ['job_id','ntv_id','cv_id' ,'prefix_title','first_name','last_name','headline','email','contact_phone','address','province_id','file_name','apply_date'];
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
	public function ntv()
	{
		return $this->belongsTo('NTV', 'ntv_id');
	}
	public function resume()
	{
		return $this->belongsTo('Resume', 'cv_id');
	}
	public function province()
	{
		return $this->belongsTo('Province', 'province_id');
	}
}