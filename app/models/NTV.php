<?php

class NTV extends \Eloquent {
	protected $fillable = [];
	protected $table = 'jobseekers';

	public function resume()
	{
		return $this->hasMany('Resume');
	}
	
}