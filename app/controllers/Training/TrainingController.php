<?php 

/**
* 
*/

class TrainingController extends Controller
{
	 
	public function home()
	{
		$training=Training::take(6)
							->select('id','title','time_day','fee','content')
							->orderBy('id','desc')
							->get();
		$document[0]=TrainingDocument::take(6) //tài lieeuhj mới
							->select('id','title','author','thumbnail','view','download','created_at')
							->orderBy('id','desc')
							->get();
		$document[1]=TrainingDocument::take(6) //tài liệu xem nhiều
							->select('id','title','author','thumbnail','view','download','created_at')
							->orderBy('download','desc')
							->get();
		$people[0] =TrainingPeople::where('training_roll_id','=',1) // giảng viên
							->take(4)
							->select('name','thumbnail','facebook','twitter','skype','linkedin')
							->get();

		$people[1]=TrainingPeople::where('training_people.training_roll_id','=',4) //học viên tiêu biểu
									->take(8)
									->join('training as tr','tr.id','=','training_people.training_id')
									->select('training_people.name','training_people.thumbnail','tr.title as couser')
									->get();	
		$people[2]=TrainingPeople::where('training_people.training_roll_id','=',3) //học viên cũ
									->take(6)
									->join('training as tr','tr.id','=','training_people.training_id')
									->select('training_people.name','training_people.thumbnail','training_people.feeling','tr.title as couser')
									->get();												
		return View::make('training.home')->with(array('training'=>$training,'document'=>$document,'people'=>$people)); 
	}


	public function detail_doc($id)
	{

		$doc1=TrainingDocument::find($id);
		if(count((array)$doc1)!=0)
		{

		$training=Training::take(4)
			->select('title','time_day','fee','date_open','shift','date_study','time_hour')
			->get();
		$doc1->view=$doc1->view+1;
		$doc1->save();
		$doc_diff=TrainingDocument::where('id','<>',$id)
								->take(5)
								->select('id','title','view','download','author','thumbnail','created_at')
								->get(); 
		
		return View::make('training.detaildoc')->with(array('doc'=>$doc1,'doc_diff'=>$doc_diff,'training'=>$training));
		}

		else
			return 'not found';
	}
	public function dowload_doc($id)
	{
		

		$doc1=TrainingDocument::find($id);
		$doc1->download=$doc1->download+1;
		$doc1->save();
		 
		$path=str_replace(URL::to('/'), public_path(), $doc1['store']);
			if(File::exists($path))
				return Response::download($path);
	}

	public function detail_post($id)
	{
		$post=TrainingPost::find($id);
		if(count((array)$post)!=0)
		{

			$training=Training::take(4)
			->select('title','time_day','fee','date_open','shift','date_study','time_hour')
			->get();
			$post_diff=TrainingPost::where('id','<>',$id)
								->take(5)
								->get(); 
			return View::make('training.detailpost')->with(array('post'=>$post,'post_diff'=>$post_diff,'training'=>$training));


		}

		else "not found";
	}

	public function detail_couser($id)
	{
		$couser=Training::join('training_people as tp','tp.id','=','training.teacher_id')
			->select(array('training.*','tp.name as name','tp.thumbnail as gvthumbnail','tp.worked as worked','tp.yourself as yourself'))
			->find($id);
 		if (count((array)$couser)) {
 			$people[0] =TrainingPeople::where('training_roll_id','=',1) // giảng viên
							->take(4)
							->select('name','thumbnail','facebook','twitter','skype','linkedin')
							->get();
			$training=Training::take(4)
			->select('title','time_day','fee','date_open','shift','date_study','time_hour')
			->get();
		return View::make('training.detailcouser')->with(array('couser'=>$couser,'training'=>$training,'people'=>$people));

		}

	}


	public function post_detail_couser($id)
	{
		 
		$validator = new \App\DTT\Forms\TrainingRegister;
		if($validator->fails())
		{
			//return Redirect::back()->with('ok',$validator);
			return Redirect::back()->withErrors($validator);
		}
		else{
			$data=Input::all();
			$inser_data=TrainingPeople::create(
				array(
					'name' 		=>  $data['name'],
					'phone' 	=>  $data['phone'],
					'email' 	=>  $data['email'],
					'address' 	=>	$data['address'],
					'sex' 		=>  $data['sex'],
					'feeling' 	=> 	$data['songuoi'],
					'training_roll_id'=>2,
					'training_id'=>$id
					)
				);
			return Redirect::back()->with('ok','ok');
		 
		}

	}

	public function all_doc()
	{	
		//tài lieeuhj mới
		$document[0]=TrainingDocument::select('id','title','author','thumbnail','view','download','created_at')
							->orderBy('view','desc')
							->get();
		//tài liệu xem nhiều
		$document[1]=TrainingDocument::select('id','title','author','thumbnail','view','download','created_at')
							->orderBy('download','desc')
							->get();
		 					
		return View::make('training.alldoc')->with('document',$document);
	}

	public function all_couser()
	{	
		//tài lieeuhj mới
		$training=Training::select('id','title','time_day','fee','content')
							->orderBy('id','desc')
							->get();
		 					
		return View::make('training.allcouser')->with('training',$training);
	}
	 

}
