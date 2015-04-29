<?php

class WorkLocation extends \Eloquent {
	protected $fillable = [];
	protected $table = 'ntv_work_locations';
	public function province()
	{
		return $this->hasOne('Province', 'id', 'province_id');
	}
}