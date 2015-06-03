<?php

class OrderDetail extends \Eloquent {
	protected $fillable = ['order_id', 'viewed_date', 'rs_id'];
	protected $table = 'order_details';
	public function order()
	{
		return $this->belongsTo('Order', 'order_id');
	}
}