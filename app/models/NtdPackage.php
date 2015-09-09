<?php

class NtdPackage extends \Eloquent {
	protected $fillable = [];
	protected $table = 'employer_package';

	public function ntd() {return $this->belongsTo('NTD','ntd_id');}
	public function package() {return $this->belongsTo('Package', 'package_id');}
}