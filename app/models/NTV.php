<?php

class NTV extends \Eloquent {
	protected $fillable = [];
	protected $table = 'ntv_info';

	public function resume()
	{
		return $this->hasMany('Resume');
	}
}