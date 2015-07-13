<?php 
namespace NTD;
use View, Redirect, Input, EFolder, Job, Auth, Response, Application, Company, Order, Config, EContact;
class OrderController extends \Controller {
	public function __construct()
	{
		$company = Company::where('ntd_id', Auth::id())->first();
		View::share('company', $company);
		$jobs = Job::where('ntd_id', Auth::id())->where('is_display', 1)->where('hannop', '>=', date('Y-m-d'))->count();
		View::share('active_job', $jobs);
		$newest = Order::where('ntd_id', Auth::id())->first();
		View::share('newest', $newest);
	}
	public function getShow($type = false)
	{
		if($type == 1)
		{
			$orders = Order::where('ntd_id', Auth::id())->where('ended_date', '>=', date('Y-m-d H:i:s'))->paginate(10);
		} elseif($type == 2) {
			$orders = Order::where('ntd_id', Auth::id())->where('ended_date', '<', date('Y-m-d H:i:s'))->paginate(10);
		} else {
			$orders = Order::where('ntd_id', Auth::id())->paginate(10);
		}
		return View::make('employers.orders.index', compact('orders'));
	}
	public function getAdd()
	{
		return View::make('employers.orders.add');
	}
	public function getContact($service_id, $package_id)
	{
		$config = Config::get('custom_service.services');
		$services = array();
		foreach ($config as $key => $value) {
			$services[$key] = $value['name'];
		}
		//var_dump($services);die();
		return View::make('employers.orders.contact', compact('services', 'service_id'));
	}
	public function postContact()
	{
		$contacts = Input::all();
		$contacts['ntd_id'] = Auth::id();
		$contacts = EContact::create($contacts);
		return Redirect::back()->with('success', 'Gửi liên hệ thành công. Chúng tôi sẽ liên lạc lại với bạn.');
	}
	public function getDetail($id)
	{

	}
}