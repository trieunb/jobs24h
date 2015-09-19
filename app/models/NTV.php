<?php

class NTV extends \Eloquent {
	protected $fillable = [];
	protected $table = 'jobseekers';

	public function resume()
	{
		return $this->hasMany('Resume', 'ntv_id');
	}
	public function apply()
	{
		return $this->hasMany('Application', 'ntv_id');
	}
	public function full_name()
	{
		return $this->first_name . " " . $this->last_name;
	}
	public function province(){
		return $this->belongsTo('Province', 'province_id');
	}
	public function country(){
		return $this->belongsTo('Country', 'country_id');
	}
	public function resumeCount()
	{
	  return $this->resume()
	    ->selectRaw('ntv_id, count(*) as aggregate');
	}
	public function applyJobCount()
	{
	  return $this->apply()
	    ->selectRaw('ntv_id, count(*) as aggregate');
	}
	public function resumeUploadCount()
	{
	  return $this->resume()
	    ->selectRaw('ntv_id,count(*) as aggregate')
	    ->where('file_name', '!=', '');
	}
}