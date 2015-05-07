<?php

class WorkLocation extends \Eloquent {
	protected $fillable = [];
	protected $table = 'mt_work_locations';
	public function province()
	{
		return $this->hasOne('Province', 'id', 'province_id');
	}
}