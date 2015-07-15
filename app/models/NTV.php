<?php

class NTV extends \Eloquent {
	protected $fillable = [];
	protected $table = 'jobseekers';

	public function resume()
	{
		return $this->hasMany('Resume', 'ntv_id');
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
	
}