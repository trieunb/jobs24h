<?php

class WorkLocation extends \Eloquent {
	protected $fillable = ['rs_id', 'job_id', 'mt_type', 'province_id'];
	protected $table = 'mt_work_locations';
	public function province()
	{
		return $this->hasOne('Province', 'id', 'province_id');
	}
	public function resume()
	{
		return $this->belongsTo('Resume', 'rs_id');
	}
	public function job()
	{
		return $this->belongsTo('Job', 'job_id');
	}
}