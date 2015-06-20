<?php

class RSFolder extends \Eloquent {
	protected $fillable = ['ntd_id', 'folder_id', 'cv_id'];
	protected $table = 'employer_rs_folder';
	public function ntd()
	{
		return $this->belongsTo('NTD', 'ntd_id');
	}
	public function folder()
	{
		return $this->belongsTo('EFolder', 'folder_id');
	}
	public function resume()
	{
		return $this->belongsTo('Resume', 'cv_id');
	}
}