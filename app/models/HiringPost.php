<?php
use Carbon\Carbon;
class HiringPost extends \Eloquent {
	protected $fillable = ['title', 'post_slug', 'thumbnail', 'content', 'user_id', 'cat_id', 'sub_cat_id', 'views'];
	protected $table = 'hiring_posts';

	public function category()
	{
		return $this->belongsTo('HiringCate', 'cat_id');
	}
	public function subcategory()
	{
		return $this->belongsTo('HiringCate', 'sub_cat_id');
	}
	public function image($image = '', $options = array())
	{
		if(!stristr($image, 'http:'))
		{
			return HTML::image('uploads/hiring/' . $image, null, $options);
		}
		return HTML::image($image, null, $options);
	}
	public function image_url($image = '')
	{
		return URL::to('upload/hiring/' . $image);
	}
	public function admin()
	{
		return $this->belongsTo('AdminUser', 'user_id');
	}
	public function content()
	{
		$arr1 = [];
		$arr2 = [];
		return str_replace($arr1, $arr2, $this->content);
	}
	public function getUpdateAt()
	{
		$txt = 'diff.timediff.';

		$isNow = true;
		$other = Carbon::now();

		$delta = abs($other->diffInSeconds($this->created_at));

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