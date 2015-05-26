<?php

class EFolder extends \Eloquent {
	protected $fillable = ['ntd_id', 'folder_name'];
	protected $table = 'employer_folders';
	public function application()
	{
		return $this->hasMany('Application', 'folder_id');
	}
}