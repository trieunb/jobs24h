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

}