<?php 
namespace NTD;
use View, Redirect, NTD, Auth, Job, Validator, Hash, Input;
class SearchController extends \Controller {
	public function getBasic()
	{
		return View::make('employers.search.basic');
	}
	public function getAdvance()
	{

	}
	public function getCategory()
	{

	}
	public function postCalendar()
	{
		$year = Input::get('year');
		$month = str_pad(Input::get('month'), 2, '0', STR_PAD_LEFT);
		$total_day = date('t', strtotime($year."-".$month."-01"));
		$tr = $td = array();
		$lead_day = date('w', strtotime($year."-".$month."-01")) + 1;
		$start = 1;
		for($i = 1; $start <= $total_day; $i++)
		{
			$tmp = array();
			foreach (range(1, 7) as $key => $value) {
				if($i < $lead_day || $start > $total_day) {
					$tmp[] = '&nbsp;';
				} else {
					$tmp[] = $start;
					$start += 1;
				}
				$i += 1;
			}
			$td[] = $tmp;
		}
		$html = "";
		foreach ($td as $key => $value) {
			$html .= "<tr>";
			foreach ($value as $val) {
				$html .= "<td><a data-toggle=\"modal\" href=\"#modal-history\" href=\"\">$val</a></td>";
			}
			$html .= "</tr>";
		}
		return $html;
	}
	public function postBasic()
	{
		$resumes = \Resume::orderBy('id', 'desc');
		if(Input::get('keyword'))
		{
			if(Input::get('full_keyword')) $resumes->where('tieude_cv', Input::get('keyword'));
			else $resumes->where('tieude_cv', 'LIKE', "%".Input::get('keyword')."%");
		}
		if(is_numeric(Input::get('category')))
		{
			$resumes->whereHas('cvcategory', function($q) {
				$q->where('cat_id', Input::get('category'))->where('rs_id', '>', 0);
			});
		}
		if(is_numeric(Input::get('location')))
		{
			$resumes->whereHas('location', function($q) {
				$q->where('province_id', Input::get('location'))->where('rs_id', '>', 0);
			});
		}
		if(is_numeric(Input::get('level')))
		{
			$resumes->where('capbachientai', Input::get('level'));
		}
		$input = Input::all();
		$result = $resumes->paginate(10);
		return View::make('employers.search.basic', compact('result', 'input'));
	}
	public function getHistory()
	{

	}
}
