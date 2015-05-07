<?php

class Resume extends \Eloquent {
	protected $fillable = [];
	protected $table = 'resumes';

	public function ntv()
	{
		return $this->beLongsTo('NTV', 'rs_id');
	}
	public function location()
	{
		return $this->hasMany('WorkLocation', 'rs_id');
	}
	public function certificate()
	{
		return $this->hasMany('Certificate', 'rs_id');
	}
	public function experience()
	{
		return $this->hasMany('Experience', 'rs_id');
	}

}