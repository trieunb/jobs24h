<?php

class Subscribe extends \Eloquent {
	protected $fillable = ['ntv_id', 'times', 'categories', 'provinces', 'keyword', 'level', 'salary'];
	protected $table = 'subscribe';
	public function province()
	{
		return $this->hasMany('WorkLocation');
	}
	public function category()
	{
		return $this->hasMany('CVCategory');
	}
}