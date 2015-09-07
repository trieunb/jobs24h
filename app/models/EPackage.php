<?php

class EPackage extends \Eloquent {
	protected $fillable = [];
	protected $table = 'epackages';

	public function eservice()
    {
        return $this->belongsTo('EServices','service_id');
    }
	
}