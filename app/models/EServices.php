<?php

class EServices extends \Eloquent {
	protected $fillable = [];
	protected $table = 'eservices';
	public function epackages()
	{
		return $this->hasMany('EPackage');
	}
}