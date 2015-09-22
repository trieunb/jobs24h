<?php

class Order extends \Eloquent {
	protected $fillable = ['ntd_id','package_id' ,'package_name', 'total', 'remain', 'created_date', 'ended_date'];
	protected $table = 'orders';
	 

	public function ntd()
	{
		return $this->belongsTo('NTD', 'ntd_id');
	}
}