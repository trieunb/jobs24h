<?php

class Job extends \Eloquent {
	protected $fillable = ['ntd_id'];
	protected $table = 'jobs';
	public function province()
	{
		return $this->hasMany('WorkLocation');
	}
	public function category()
	{
		return $this->hasMany('CVCategory');
	}
	public function level()
	{
		return $this->belongsTo('Level', 'chucvu');
	}
	public function education()
	{
		return $this->belongsTo('Education', 'bangcap');
	}
	public function ntd()
	{
		return $this->belongsTo('NTD', 'ntd_id');
	}
	public function work()
	{
		return $this->belongsTo('WorkType', 'hinhthuc');
	}
	public function application()
	{
		return $this->hasMany('Application', 'job_id');
	}
	public function arrayLocation($keyGet = 'province_id')
	{
		$location = $this->province->toArray();
		$province_ids = array();
		foreach ($location as $key => $value) {
			$province_ids[] = $value[$keyGet];
		}
		return $province_ids;
	}
	public function arrayCategory($keyGet = 'cat_id')
	{
		$categories = $this->category->toArray();
		$cat_ids = array();
		foreach ($categories as $key => $value) {
			$cat_ids[] = $value[$keyGet];
		}
		return $cat_ids;
	}

	public function updateLocation($jobid = false, $location = array())
	{
		if(count($location))
		{
			WorkLocation::where('job_id', $jobid)->delete();
			foreach ($location as $value) {
				WorkLocation::create(['job_id'=>$jobid, 'mt_type'=>2, 'province_id'=>$value]);
			}
		}
		return true;
	}
	public function updateCategory($jobid = false, $category = array())
	{
		if(count($category))
		{
			CVCategory::where('job_id', $jobid)->delete();
			foreach ($category as $value) {
				CVCategory::create(['job_id'=>$jobid, 'mt_type'=>2, 'cat_id'=>$value]);
			}
		}
		return true;
	}


	public function orderpostrec()
	{
		return $this->hasMany('OrderPostRec','job_id');
	}

	 
	
}