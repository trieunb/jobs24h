<?php

class NTV extends \Eloquent {
	protected $fillable = [];
	protected $table = 'jobseekers';

	public function resume()
	{
		return $this->hasMany('Resume');
	}
	public function full_name()
	{
		return $this->first_name . " " . $this->last_name;
	}
	
}