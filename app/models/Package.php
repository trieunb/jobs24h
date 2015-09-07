<?php

class Package extends \Eloquent {
	protected $fillable = ['service_id', 'package_name', 'total_date', 'total_resume', 'price'];
	protected $table = 'packages';
	public function eservice()
	{
		return $this->belongsTo('EServices','service_id');
	}
	public function ntdpackage() {
	 	return $this->hasMany('NtdPackage', 'package_id');
	 }
}