<?php

class OrderDetailNtd extends \Eloquent {
	protected $fillable = ['order_id', 'madonhang','name_package', 'ntd_id','order_post_rec_id','price'];
	
	protected $table = 'order_detail_ntd';
	public function order()
	{
		return $this->belongsTo('Order', 'order_id');
	}
	public function orderpostrec()
	{
		return $this->belongsTo('OrderPostRec', 'order_post_rec_id');
	}

	public function resume()
	{
		return $this->belongsTo('Resume', 'rs_id');
	}

	 

}