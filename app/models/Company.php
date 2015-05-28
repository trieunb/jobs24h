<?php

class Company extends \Eloquent {
	protected $fillable = [];
	protected $table = 'companies';
	public function category()
	{
		return $this->belongsTo('Category', 'nganhnghe');
	}
}