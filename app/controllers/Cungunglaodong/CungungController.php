<?php 
	class CungungController extends Controller
	{

		public function __construct()
		{
			$all_dichvu=TrainingCat::whereAbout(2)->get();
			 
			View::share('all_dichvu',$all_dichvu);

		}
		public function home()
		{
			$data=Partner::get();
			return View::make('cungunglaodong.home')->with('data',$data);
		}

		public function detail($id)
		{
			$services=TrainingCat::whereId($id)->first(); 
			$data=TrainingPost::where('training_cat_id','=',$id)
			->select('title','content')
			->get()
			->toArray();
			 
			 
			return View::make('cungunglaodong.detail')->with(array('services'=>$services,'data'=>$data));
		}

	}
?>
