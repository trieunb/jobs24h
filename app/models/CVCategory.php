<?php

class CVCategory extends \Eloquent {
	protected $fillable = ['rs_id', 'mt_type', 'cat_id'];
	protected $table = 'mt_categories';
	public function category()
	{
		return $this->belongsTo('Category', 'cat_id');
	}
	
}