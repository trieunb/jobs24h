<?php

class OrderPostRec extends \Eloquent {
	protected $fillable = ['ntd_id','eservice_id','epackage_id','total_date','remain_date','created_date','ended_date','epackage_name'];
	protected $table='order_post_rec';

	public function job()
	{
		return $this->beLongTo('Job','job_id');
	}
	
	public function job_has()
	{
		return $this->hasOne('Job','id');
	}

	public function ordersdetail()
	{
		return $this->hasMany('OrderDetail', 'order_post_rec_id');
	}
	 


}