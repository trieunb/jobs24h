<?php

class NTVSentry extends \Cartalyst\Sentry\Users\Eloquent\User {
	protected $fillable = [];
	protected $table = 'jobseekers';
	public function province(){
		return $this->belongsTo('Province', 'province_id');
	}
	public function country(){
		return $this->belongsTo('Country', 'country_id');
	}
}