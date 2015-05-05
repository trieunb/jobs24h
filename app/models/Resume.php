<?php

class Resume extends \Eloquent {
	protected $fillable = [];
	protected $table = 'ntv_cv';

	public function ntv()
	{
		return $this->beLongsTo('NTV', 'ntv_id');
	}
	public function location()
	{
		return $this->hasMany('WorkLocation', 'ntvcv_id');
	}
	public function certificate()
	{
		return $this->hasMany('Certificate', 'ntvcv_id');
	}
	public function experience()
	{
		return $this->hasMany('Experience', 'ntvcv_id');
	}

}