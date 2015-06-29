<?php

class ViewResume extends \Eloquent {
	protected $fillable = ['ntv_id, ntd_id, cv_id'];
	protected $table ='view_resume';
	public function ntd()
	{
		return $this->belongsTo('NTD', 'ntd_id');
	}
	public function ntv()
	{
		return $this->belongsTo('NTV', 'ntv_id');
	}
	public function cv()
	{
		return $this->belongsTo('Resume', 'cv_id');
	}
}