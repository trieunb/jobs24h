<?php
use Carbon\Carbon;
class Resume extends \Eloquent {
	protected $fillable = ['ntv_id', 'tieude_cv', 'bangcapcaonhat', 'namkinhnghiem','bangcapcaonhat','ctyganday',
	'cvganday','capbachientai','vitrimongmuon','capbacmongmuon','mucluong','loaitien',
	'dinhhuongnn','kynang','danhgiabanthan','sothich','hinhthuclamviec','loaihs','trangthai',
	'is_public','is_visible','is_default','file_name'];
	protected $table = 'resumes';

	public function ntv()
	{
		return $this->beLongsTo('NTV', 'ntv_id');
	}
	public function level(){
		return $this->beLongsTo('Level', 'capbachientai');
	}
	public function capbac(){
		return $this->beLongsTo('Level', 'capbacmongmuon');
	}
	public function bangcap(){
		return $this->beLongsTo('Education', 'bangcapcaonhat');
	}
	public function location()
	{
		return $this->hasMany('WorkLocation', 'rs_id');
	}
	public function certificate()
	{
		return $this->hasMany('Certificate', 'rs_id');
	}
	public function experience()
	{
		return $this->hasMany('Experience', 'rs_id');
	}
	public function education()
	{
		return $this->hasMany('MTEducation', 'rs_id');
	}
	public function cvcategory()
	{
		return $this->hasMany('CVCategory', 'rs_id');
	}
	public function cvlanguage()
	{
		return $this->hasMany('CVLanguage', 'rs_id');
	}
	public function arrayLocation($keyGet = 'province_id')
	{
		$location = $this->location->toArray();
		$province_ids = array();
		foreach ($location as $key => $value) {
			$province_ids[] = $value[$keyGet];
		}
		return $province_ids;
	}
	public function arrayCategory($keyGet = 'cat_id')
	{
		$categories = $this->cvcategory->toArray();
		$cat_ids = array();
		foreach ($categories as $key => $value) {
			$cat_ids[] = $value[$keyGet];
		}
		return $cat_ids;
	}

	public function updateLocation($resume = false, $location = array())
	{
		if(count($location))
		{
			WorkLocation::where('rs_id', $resume)->delete();
			foreach ($location as $value) {
				WorkLocation::firstOrCreate(['rs_id'=>$resume, 'mt_type'=>1, 'province_id'=>$value]);
			}
		}
		return true;
	}
	public function updateCategory($resume = false, $category = array())
	{
		if(count($category))
		{
			CVCategory::where('rs_id', $resume)->delete();
			foreach ($category as $value) {
				CVCategory::firstOrCreate(['rs_id'=>$resume, 'mt_type'=>1, 'cat_id'=>$value]);
			}
		}
		return true;
	}
	public function getUpdateAt()
	{
		$txt = 'diff.timediff.';

		$isNow = true;
		$other = Carbon::now();

		$delta = abs($other->diffInSeconds($this->updated_at));

		// 30 days per month, 365 days per year... good enough!!
		$divs = array(
		   'second' => Carbon::SECONDS_PER_MINUTE,
		   'minute' => Carbon::MINUTES_PER_HOUR,
		   'hour'   => Carbon::HOURS_PER_DAY,
		   'day'    => 30,
		  
		   'month'  => Carbon::MONTHS_PER_YEAR,
		   
		);

		$unit = 'year';

		foreach ($divs as $divUnit => $divValue) {
		   if ($delta < $divValue) {
		      $unit = $divUnit;
		      break;
		   }

		   $delta = floor($delta / $divValue);
		}

		if ($delta == 0) {
		   $delta = 1;
		}

		$txt .= $unit;
		return Lang::choice($txt, $delta, compact('delta'));
	}
	

}