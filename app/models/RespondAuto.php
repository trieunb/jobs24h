<?php

class RespondAuto extends \Eloquent {
	protected $fillable = ['ntd_id', 'created_date', 'subject', 'content', 'type'];
	protected $table = 'respond_auto';
	public function ntd()
	{
		return $this->belongsTo('NTD', 'ntd_id');
	}
}