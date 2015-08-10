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
									->get();	
		$people[2]=TrainingPeople::where('training_people.training_roll_id','=',3) //học viên cũ
									->take(6)
									->get();												
		return View::make('training.home')->with(array('training'=>$training,'document'=>$document,'people'=>$people)); 
	}


	public function detail_doc($id)
	{

		$doc1=TrainingDocument::find($id);
		if(count((array)$doc1)!=0)
		{

		$training=Training::take(4)
			->select('id','title','time_day','fee','date_open','shift','date_study','time_hour')
			->get();
		$doc1->view=$doc1->view+1;
		$doc1->save();
		$doc_diff=TrainingDocument::where('id','<>',$id)
								->take(2)
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
		 
		$path=''.public_path().'/uploads/training/document/'.$doc1['store'].'';
			if(File::exists($path))
				return Response::download($path);
	}

	public function detail_post($id)
	{
		$post=TrainingPost::find($id);
		if(count((array)$post)!=0)
		{

			$training=Training::take(4)
			->select('id','title','time_day','fee','date_open','shift','date_study','time_hour')
			->get();
			$post_diff=TrainingPost::where('id','<>',$id)->where('training_cat_id','=',1)
								->take(5)
								->get(); 
			return View::make('training.detailpost')->with(array('post'=>$post,'post_diff'=>$post_diff,'training'=>$training));


		}

		else "not found";
	}

	public function detail_couser($id)
	{
		 
		 
		 $couser1=Training::find($id);

		 $couser=$couser1->trainingpeoples;
		 
		  $data = array();
		 	$data['name']= '';
		 	$data['worked']='';
		 	$data['yourself']='';
		 	$data['thumbnail']='';
		 	$data['content']= '';
		 	$data['title']= '';
		 	$data['date_open']= '';
		 	$data['shift']= '';
		 	$data['time_hour']= '';
		 	$data['date_study']= '';
		 	$data['time_day']= '';
		 	$data['fee']= '';
		 	$data['discount']= '';
		 	$data['id']= '';
		 foreach ($couser as  $value) {

		 	$data['name']= $value->trainingpeople->name;
		 	$data['worked']=$value->trainingpeople->worked;
		 	$data['yourself']=$value->trainingpeople->yourself;
		 	$data['thumbnail']=$value->trainingpeople->thumbnail;
		 	$data['content']= $value->training->content;
		 	$data['title']= $value->training->title;
		 	$data['date_open']= $value->training->date_open;
		 	$data['shift']= $value->training->shift;
		 	$data['time_hour']= $value->training->time_hour;
		 	$data['date_study']= $value->training->date_study;
		 	$data['time_day']= $value->training->time_day;
		 	$data['fee']= $value->training->fee;
		 	$data['discount']= $value->training->discount;
		 	$data['id']= $value->training->id;
		 	 

		 }
		   	 
		 //var_dump($couser);
		  
		/*$couser=Training::join('people_training as pt','pt.training_id','=','training.id')
						->join('people_training', function($join)
				        {
				            $join->on('training.id', '=', 'people_training.training_id')
				                 ->where('training_people.training_roll_id', '=', 1);

				        })->find($id);

		 
				        //->select(array('training.*','training_people.name as name','training_people.thumbnail as gvthumbnail','training_people.worked as worked','training_people.yourself as yourself'))
				*/		 
		 

 		if (count((array)$couser)) {
 			$people[0] =TrainingPeople::where('training_roll_id','=',1) // giảng viên
							->take(4)
							->select('name','thumbnail','facebook','twitter','skype','linkedin')
							->get();
			$training=Training::take(4)
			->select('id','title','time_day','fee','date_open','shift','date_study','time_hour')
			->get();
		return View::make('training.detailcouser')->with(array('couser'=>$data,'training'=>$training,'people'=>$people));

		}

	}


	public function post_detail_couser($id)
	{
		 
		$validator = new \App\DTT\Forms\TrainingRegister;

		if($validator->fails())
		{
			//return Redirect::back()->with('ok',$validator);

			 
			return Response::json(array(
                    'success' => false,
                    'data'   => $validator->getMessageBag()->toArray()
                ));
			//return Redirect::back()->withErrors($validator);
		}
		else
		{

			$data=Input::all();
			$inser_data=TrainingPeople::create(
				array(
					'name' 		=>  $data['name'],
					'phone' 	=>  $data['phone'],
					'email' 	=>  $data['email'],
					'address' 	=>	$data['address'],
					'sex' 		=>  $data['sex'],
					'feeling' 	=> 	$data['songuoi'],
					'training_roll_id'=>2,	// học viên đăng ký mới
					'training_id'=>$id
					)
				);
			return Response::json(array(
                    'success' => true,
                    
                ));
			
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

	public function all_post()
	{	
		//tài lieeuhj mới
		$post=TrainingPost::where('training_cat_id','=',1)
								->orderBy('id','desc')
								->get(); 
		return View::make('training.allpost')->with(array('post'=>$post));

	}
	 

}
