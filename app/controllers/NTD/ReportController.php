<?php 
namespace NTD;
use View, Redirect, NTD, Auth, Job, Validator, Hash, Input, Order, OrderDetail, DB, VResponse;
class ReportController extends \Controller {
	public function __construct()
	{
		$newest = Order::where('ntd_id', Auth::id())->first();
		View::share('newest', $newest);
	}
	public function getCandidate($type = false)
	{
		if($type == 1) {
			$btitle = 'Danh sách gói hồ sơ đang sử dụng';
			$orders = Order::where('ntd_id', Auth::id())->where('ended_date', '>=', DB::raw('NOW()'))->orderBy('id', 'desc')->paginate(10);
		} elseif($type == 2) {
			$btitle = 'Danh sách gói hồ sơ đã sử dụng';
			$orders = Order::where('ntd_id', Auth::id())->where('ended_date', '<', DB::raw('NOW()'))->orderBy('id', 'desc')->paginate(10);
		} else {
			$btitle = 'Danh sách các gói hồ sơ';
			$orders = Order::where('ntd_id', Auth::id())->orderBy('id', 'desc')->paginate(10);
		}
		
		return View::make('employers.report.candidate', compact('orders', 'btitle'));
	}
	public function getViewCandidate($id = false)
	{
		$detail = OrderDetail::select(DB::raw('YEAR(viewed_date) year, MONTH(viewed_date) month, DAY(viewed_date) day, COUNT(*) post_count'))
		->whereHas('order', function($q) {
			$q->where('ntd_id', Auth::id());
		})
		->where('order_id', $id)
		->groupBy('year')
	    ->groupBy('month')
	    ->groupBy('day')
	    ->orderBy('year', 'desc')
	    ->orderBy('month', 'desc')
	    ->orderBy('day', 'desc')
		->get();
		$order = Order::find($id);
		
		if(!$detail) return 'Không có dữ liệu';
		return View::make('employers.report.view', compact('detail', 'order'));
	}
	public function getAlert()
	{
		return View::make('employers.report.alert');
	}
	public function getRespond()
	{
		$responds = VResponse::where('ntd_id', Auth::id())->with('ntv')->orderBy('id', 'desc')->paginate(10);
		return View::make('employers.candidates.respond', compact('responds'));
	}
	public function getTest()
	{
		return View::make('employers.candidates.test');
	}
	
}