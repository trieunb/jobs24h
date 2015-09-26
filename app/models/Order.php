<?php

class Order extends \Eloquent {
	protected $fillable = ['start_date_xacthuc','end_date_xacthuc','is_xacthuc','ntd_id','package_id' ,'package_name', 'total', 'remain', 'created_date', 'ended_date'];
	protected $table = 'orders';
	 

	public function ntd()
	{
		return $this->belongsTo('NTD', 'ntd_id');
	}
	public function ordersdetail()
	{
		return $this->hasMany('OrderDetail', 'order_id');
	}

}