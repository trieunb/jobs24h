<?php

class CVCategory extends \Eloquent {
	protected $fillable = ['rs_id', 'job_id', 'mt_type', 'cat_id'];
	protected $table = 'mt_categories';
	public function category()
	{
		return $this->belongsTo('Category', 'cat_id');
	}
	public function job()
	{
		return $this->belongsTo('Job', 'job_id');
	}
	public function resume()
	{
		return $this->belongsTo('Resume', 'rs_id');
	}
}