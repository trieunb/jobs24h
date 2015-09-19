<?php

class JobHieuung extends \Eloquent {
	protected $fillable = ['job_id','order_post_rec_id'];
	protected $table="job_hieuung";
	function orderpostrec()
	{
		$this->beLongTo('OrderPostRec','order_post_rec_id');
	}
	function job()
	{
		$this->beLongTo('Job','job_id');
	}
}