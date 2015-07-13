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
	public function getPersistCode()
    {
        if (!$this->persist_code)
        {
            $this->persist_code = $this->getRandomString();

            // Our code got hashed
            $persistCode = $this->persist_code;

            $this->save();

            return $persistCode;            
        }
        return $this->persist_code;
    }
}