<?php

class VResponse extends \Eloquent {
	protected $fillable = ['ntv_id', 'ntd_id', 'title', 'content', 'submited_date'];
	protected $table ='responds';
	public function ntd()
	{
		return $this->belongsTo('NTD', 'ntd_id');
	}
	public function ntv()
	{
		return $this->belongsTo('NTV', 'ntv_id');
	}
}