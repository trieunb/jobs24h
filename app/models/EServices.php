<?php

class EServices extends \Eloquent {
	protected $fillable = [];
	protected $table = 'eservices';
	public function epackages()
	{
		return $this->hasMany('EPackage','service_id');
	}
	public function packages()
	{
		return $this->hasMany('Package','service_id');
	}

}