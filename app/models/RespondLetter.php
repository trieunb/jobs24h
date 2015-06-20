<?php

class RespondLetter extends \Eloquent {
	protected $fillable = ['ntd_id', 'created_date', 'subject', 'content', 'type', 'status'];
	protected $table = 'respond_letters';
	public function ntd()
	{
		return $this->belongsTo('NTD', 'ntd_id');
	}
}