<?php 
namespace NTD;
use Config, File, View, Redirect, NTD, Auth, Job, Validator, Hash, Input, DB, Resume, RSFolder, EFolder, Response, Category, Mail,Application;
use VResponse, RespondLetter,Request;
class SearchController extends \Controller {
	public function getCoBan()
	{

		if(Input::get('category'))
		{
			$history = array();
			$resumes = \Resume::orderBy('id', 'desc')->where('is_public', 1)->where('is_visible', 0)->where('trangthai', 1);
			if(Input::get('keyword'))
			{
				if(Input::get('full_keyword')) $resumes->where('tieude_cv', Input::get('keyword'));
				else $resumes->where('tieude_cv', 'LIKE', "%".Input::get('keyword')."%");
				$history['keyword'] = Input::get('keyword');
			}
			if(is_numeric(Input::get('category')))
			{
				$resumes->whereHas('cvcategory', function($q) {
					$q->where('cat_id', Input::get('category'))->where('rs_id', '>', 0);
				});
				$history['category'] = Input::get('category');
			}
			if(is_numeric(Input::get('location')))
			{
				$resumes->whereHas('location', function($q) {
					$q->where('province_id', Input::get('location'))->where('rs_id', '>', 0);
				});
				$history['location'] = Input::get('location');
			}
			if(is_numeric(Input::get('level')))
			{
				$resumes->where('capbachientai', Input::get('level'));
				$history['level'] = Input::get('level');
			}
			$result = $resumes->paginate(10);
			$input = Input::all();
			foreach ($input as $key => $value) {
				if($key == 'submit') continue;
				$result->appends(array($key=>$value));
			}
			//insert history
			$history['ntd_id'] = Auth::id();
			$history['total_result'] = $result->getTotal();
			$history['search_date'] = date('Y-m-d');

			if(isset($input['submit'])) \SearchHistory::create($history);
			return View::make('employers.search.basic', compact('result', 'input'));
		} else {
			return View::make('employers.search.basic');
		}
	}
	public function getNangCao()
	{
		if(Input::get('category'))
		{
			$resume = Resume::orderBy('id', 'desc')->where('is_public', 1)->where('is_visible', 0)->where('trangthai', 1);
			if (Input::get('keyword')) {
				if(Input::get('full_keyword')) $resume->where('tieude_cv', Input::get('keyword'));
				else $resume->where('tieude_cv', 'LIKE', "%".Input::get('keyword')."%");
			}
			if (is_numeric(Input::get('category'))) {
				$resume->whereHas('cvcategory', function($q) {
					$q->where('cat_id', Input::get('category'));
				});
			}
			if (is_numeric(Input::get('location'))) {
				$resume->whereHas('location', function($q) {
					$q->where('province_id', Input::get('location'));
				});
			}
			if (is_numeric(Input::get('level'))) {
				$resume->where('capbacmongmuon', Input::get('level'));
			}
			if (is_numeric(Input::get('namkinhnghiem'))) {
				$resume->where('namkinhnghiem', Input::get('namkinhnghiem'));
			}
			if (is_numeric(Input::get('language'))) {
				$resume->whereHas('cvlanguage', function($q) {
					$q->where('lang_id', Input::get('language'));
				});
			}
			if (is_numeric(Input::get('updated_at'))) {
				if(Input::get('updated_at') == 1) { //cập nhật hôm nay
					$resume->whereRaw('YEAR(updated_at)=? and MONTH(updated_at)=? and DAY(updated_at)=?', [date('Y'), date('n'), date('j')]);
				}
				if(Input::get('updated_at') == 2) { //cập nhật hôm qua
					$resume->whereRaw('YEAR(updated_at)=? and MONTH(updated_at)=? and DAY(updated_at)=?', [date('Y', strtotime('- 1 day')), date('n', strtotime('- 1 day')), date('j', strtotime('- 1 day'))]);
				}
				if(Input::get('updated_at') == 3) { //cập nhật tuần này
					$resume->whereRaw('updated_at > NOW() - INTERVAL 7 DAY');
				}
				if(Input::get('updated_at') == 4) { //cập nhật tháng này
					$resume->whereRaw('updated_at > NOW() - I`');
				}
				if(Input::get('updated_at') == 5) { //cập nhật năm này
					$resume->whereRaw('updated_at > NOW() - INTERVAL 365 DAY');
				}
			}
			if (is_numeric(Input::get('gender'))) {
				$resume->whereHas('ntv', function($q) {
					$q->where('gender', Input::get('gender'));
				});
			}
			if (is_numeric(Input::get('education'))) {
				$resume->whereHas('bangcap', function($q) {
					$q->where('bangcapcaonhat', Input::get('education'));
				});
			}
			if (is_numeric(Input::get('luong_from'))) {
				$resume->where('mucluong', '>=', Input::get('luong_from'));
			}
			if (is_numeric(Input::get('luong_to'))) {
				$resume->where('mucluong', '<=', Input::get('luong_to'));
			}
			$input = Input::all();
			
			$result = $resume->paginate(10);
			foreach ($input as $key => $value) {
				if($key == 'submit') continue;
				$result->appends(array($key=>$value));
			}
			return View::make('employers.search.advance_result', compact('result', 'input'));
		} else {
			return View::make('employers.search.advance');
		}
	}
	public function getCat($id = false)
	{
		return "$id chưa có layout";
	}
	public function getTheoNganhNghe($id = false)
	{
		if(is_numeric($id))
		{
			$result = Resume::orderBy('id', 'desc')
			->where('is_public', 1)->where('is_visible', 0)->where('trangthai', 1)
			->whereHas('cvcategory', function($q) use($id) {
				$q->where('cat_id', $id);
			})->paginate(10);
			$input = ['category'=>$id, 'location'=>'all'];
			$cats = Category::where('parent_id', 1)->lists('cat_name', 'id');
			return View::make('employers.search.advance_result', compact('result', 'input', 'cats'));
		} else {
			$category = \Category::where('parent_id', '>', 0)
			->with([
				'mtcategory'	=>	function($q) {
					$q->where('rs_id', '>', 0)->whereHas('resume', function($q1) {
						$q1->where('is_public', 1)->where('is_visible', 0)->where('trangthai', 1);
					});
				}])
			->get();
			$allCategory = \Category::getList();
			return View::make('employers.search.category', compact('category', 'allCategory'));
		}
		
	}
	public function postCalendarView()
	{
		$td = $this->calendar();
		$html = "";
		foreach ($td as $key => $value) {
			$html .= "<tr>";
			foreach ($value as $val) {
				$html .= "<td><a class=\"view-history\" id=\"view_$val\">$val</a></td>";
			}
			$html .= "</tr>";
		}
		return $html;
	}
	public function calendar()
	{
		$year = Input::get('year');
		$month = str_pad(Input::get('month'), 2, '0', STR_PAD_LEFT);
		$total_day = date('t', strtotime($year."-".$month."-01"));
		$td = array();
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
		return $td;	
	}
	public function postCalendar()
	{
		$year=Input::get('year');
		$month=Input::get('month');
		if ($month>9) {
		$search=\SearchHistory::whereNtdId(Auth::id())->where('search_date','like','%'.$year.'-'.$month.'%')->lists('search_date');	
		}
		else
		$search=\SearchHistory::whereNtdId(Auth::id())->where('search_date','like','%'.$year.'-0'.$month.'%')->lists('search_date');
		$result=array_unique($search);
		
		foreach ($result as $key => $value) {
		 	$t[]=date('d',strtotime($value));
		 } 

		$td = $this->calendar();
		$html = "";
		foreach ($td as $key => $value) {
			$html .= "<tr>";
			foreach ($value as $val) {
				//	$t=date('d',strtotime($val1));
				if (in_array($val,$t))
				$html .= "<td><a style=\"color:#EA00E3\" data-toggle=\"modal\" id=\"date_$val\" href=\"#modal-history\" class=\"show-modal\">$val</a></td>";
				else
				$html .= "<td><a data-toggle=\"modal\" id=\"date_$val\" href=\"#modal-history\" class=\"show-modal\">$val</a></td>";	
			}
			$html .= "</tr>";
		}
		return $html;
	}
	
	public function getHistory()
	{

	}
	public function getHistoryInfo()
	{
		$year = Input::get('year');
		$month = str_pad(Input::get('month'), 2, '0', STR_PAD_LEFT);
		$day = str_pad(Input::get('day'), 2, '0', STR_PAD_LEFT);
		$result = \SearchHistory::orderBy('id', 'desc')
		->where('ntd_id', Auth::id())
		->where('search_date', $year.'-'.$month.'-'.$day)
		->orderBy('id', 'desc')
		->paginate(10);
		$result->appends(array('year' => $year, 'month'=>$month,'day'=>$day));
		$category = \Category::lists('cat_name', 'id');

		$level = \Level::lists('name', 'id');
		$location = \Province::lists('province_name', 'id');
		return View::make('employers.search.table_result', compact('result', 'category', 'level', 'location'));
	}
	public function getXemHoSo($id)
	{
		 
		 
		$resume = Resume::where('id', $id)->with('cvcategory')->with('location')->with('bangcap')->first();
		$employer = Auth::id();
		$check_order=\Order::whereNtdId($employer)->first();
		$history=\SearchHistory::whereNtdId($employer)->orderBy('created_at','desc')->first();
	//	$saveView=\OrderDetail::whereNtdId($employer)->whereRsId($id)->whereOrderId($check_order->id);
		//chưa xong phần history của view cv
		if(!$resume)
		{
			return Redirect::route('employers.search.basic');
		} else {
			$counte_cv=\ViewResume::whereNtvId($resume->ntv_id)->whereNtdId($employer)->whereCvId($id)->first();

			if ($counte_cv) {
				$counte_cv->counter=$counte_cv->counter+1;
				$counte_cv->save();
			}
			else
			{
				 $counte_cv= new \ViewResume;
				 $counte_cv->ntv_id=$resume->ntv_id;
				 $counte_cv->ntd_id=$employer;
				 $counte_cv->cv_id=$id;
				 $counte_cv->counter=1;
				 $counte_cv->save();
				
			}


			$resume->views += 1;
			$resume->timestamps = false;
			$resume->save();
			//chỗ này có 3 loại cv up và cv theo bước và cv apply chỉ có file_name
			if(@$resume->ntv->id) {
				if($resume->file_name)
				{
					$file = str_replace(['.doc', '.docx', '.jpg'], '.pdf', $resume->file_name);
					//var_dump($file );
					 
					$dir = Config::get('app.upload_path') . 'jobseekers/cv/' . $file;
					//var_dump($dir);
					//die();
					if(File::isFile($dir)) $pdf = true;
					else $pdf = false;
					return View::make('employers.search.resume_info_upload', compact('resume', 'pdf','history','check_order'));
				} else {
					return View::make('employers.search.resume_info', compact('resume','history','check_order'));
				}
			} else {
				$file = str_replace(['.doc', '.docx', '.jpg'], '.pdf', $resume->file_name);
				$dir = Config::get('app.upload_path') . 'jobseekers/cv/' . $file;
				if(File::isFile($dir)) $pdf = true;
				else $pdf = false;
				
				return View::make('employers.search.resume_info_nologin', compact('resume', 'pdf','history','check_order'));
			}
		}
	}
	public function getResumeIframe()
	{

		$order_inser=\Order::whereNtdId(Auth::id())->first();
	
		$ngayhomnay=strtotime(date('Y-m-d H:i:s'));
		if (Input::get('type')=='phu') {  // đầu tiên hiện cv phụ
			$file = str_replace(['.doc', '.docx', '.jpg'], '.pdf', Input::get('file'));
			$dir1 = Config::get('app.upload_path') . 'jobseekers/cv/' . $file;
			$dir = 'uploads/jobseekers/cv/' . $file;
			if(! File::isFile($dir1))
			{
				 return 'Không có file để tải';
				/*return View::make('employers.search.iframe', compact('file', 'dir'));*/
	          /*  return '<a href="{{ URL::route(\'employers.search.print_cv\', $resume->id) }}" class="btn btn-lg bg-orange">Tải CV</a>';*/
	        } else {
	        	return View::make('employers.search.iframe', compact('file', 'dir'));
	        }
		}
		if ($order_inser['remain'] > 0 && strtotime($order_inser['ended_date']) > $ngayhomnay) {
			# code...
			 
				$order_inser['remain']=$order_inser['remain']-1;
				if($order_inser['remain']<=0)
				$order_inser['remain']=0;
				
				$order_inser->save();
			 
			 
			$file = str_replace(['.doc', '.docx', '.jpg'], '.pdf', Input::get('file'));
			$dir1 = Config::get('app.upload_path') . 'jobseekers/cv/' . $file;
			$dir = 'uploads/jobseekers/cv/' . $file;
			if(! File::isFile($dir1))
			{
				 return 'Không có file để tải';
				/*return View::make('employers.search.iframe', compact('file', 'dir'));*/
	          /*  return '<a href="{{ URL::route(\'employers.search.print_cv\', $resume->id) }}" class="btn btn-lg bg-orange">Tải CV</a>';*/
	        } else {
	        	return View::make('employers.search.iframe', compact('file', 'dir'));
	        }
    	}
    	else 
    	{
    		$second_file_name	= Resume::whereFileName(Input::get('file'))->select('second_file_name')->first();
    		 
    		if($second_file_name['second_file_name']==null)
    		{
    			 return 'Không có file để tải';
    		} 
    		$file = str_replace(['.doc', '.docx', '.jpg'], '.pdf', $second_file_name['second_file_name']);
    		$dir1 = Config::get('app.upload_path') . 'jobseekers/cv/' . $second_file_name['second_file_name'];
			$dir = 'uploads/jobseekers/cv/' . $second_file_name['second_file_name'];
			if(! File::isFile($dir1))
			{
				//return View::make('employers.search.iframe', compact('file', 'dir'));
	            return 'Không có file để tải';
	        } else {
	        	return View::make('employers.search.iframe', compact('file', 'dir'));
	        }
    	}  
		
		
	}
	public function getInHoSo($cvId = false,$action)
	{
		$headers = array(
           'Content-Type: image/png',
           'Content-Type: image/jpeg',
           'Content-Type: image/gif',
           'Content-Type: application/vnd.ms-excel',
           'Content-Type: application/msword',
           'Content-Type: application/pdf',
           'Content-Type: application/x-rar-compressed',
           'Content-Type: application/zip',
           'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
           'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        	);
		$ngayhomnay=strtotime(date('Y-m-d H:i:s'));
		if($cvId)
		{
			$resume = Resume::where('id', $cvId)->first();
			if($action=="tai-phu")
			{
				if( ! $resume->second_file_name)
				{
					return Response::make('File not Found !', 404);
				} else {
					$path = Config::get('app.upload_path').'jobseekers/cv/' . $resume->second_file_name;
					$name = explode('.', $resume->second_file_name);
					$tieude_cv=str_replace(array('~','/','"','.','','%','!','@','#','$','^','&','*','(',')','{','}','\\',':','?','<','>','|'), '', $resume->tieude_cv);
					//return $path;
					if (\File::isFile($path)) {
						return Response::download($path, $tieude_cv.'.'.$name[1],$headers);
					} else {
						return Response::make('File not Found !', 404);
					}
				}


			}

			else
			{
				if( ! $resume->file_name)
				{
					 return Response::make('Không có file để tải !', 404);
				} else {
					$path = Config::get('app.upload_path').'jobseekers/cv/' . $resume->file_name;
					$name = explode('.', $resume->file_name);
					//return $path;
					$tieude_cv=str_replace(array('~','/','"','.','','%','!','@','#','$','^','&','*','(',')','{','}','\\',':','?','<','>','|'), '', $resume->tieude_cv);
					  
					if (\File::isFile($path)) {
						$order_inser=\Order::whereNtdId(Auth::id())->first();
						$order_inser['remain']=$order_inser['remain']-1;
						if($order_inser['remain']<0)
						$order_inser['remain']=0;
						
						$order_inser->save();

						if ($order_inser['remain']>-1 && strtotime($order_inser['ended_date']) > $ngayhomnay)
							return Response::download($path, $tieude_cv.'.'.$name[1]);
						else return Response::make('Không thể tải !', 404);
					} else {
						return Response::make('File not Found !', 404);
					}
				}
			}
		}
	}
	public function postAjax()
	{
		if(Input::get('action')=='showInfoNologin')
		{
			$ntvid=Input::get('ntvid');
			$ntv=\Application::whereId($ntvid)->first();
			if($ntv)
			return Response::json(['ntv'=>$ntv]);
		}

		if(Input::get('action')=='showInfo')
		{
			$ntvid=Input::get('ntvid');
			$ntv=\NTV::whereId($ntvid)->first();
			if($ntv)
			return Response::json(['ntv'=>$ntv]);
		}
		if(Input::get('action') == 'saveToFolder')
		{
			$data['ntd_id'] = Auth::id();
			$data['folder_id'] = Input::get('param');
			$data['cv_id'] = Input::get('cvid');
			$rs = RSFolder::firstOrCreate($data);
			if($rs) return Response::json(['has'=>true]);
			return Response::json(['has'=>false]);
		}
		if(Input::get('action') == 'createFolder')
		{
			$folder = EFolder::firstOrCreate(['ntd_id'=>Auth::id(), 'folder_name'=>Input::get('param')]);
			$data['ntd_id'] = Auth::id();
			$data['folder_id'] = $folder->id;
			$data['cv_id'] = Input::get('cvid');
			$rs = RSFolder::firstOrCreate($data);
			if($rs) return Response::json(['has'=>true]);
			return Response::json(['has'=>false]);
		}
		if(Input::get('action') == 'sendMail')
		{
			$data['ntd_id'] = Auth::id();
			$data['send_email'] = Input::get('send_email');
			$data['send_subject'] = Input::get('send_subject');
			$data['send_content'] = Input::get('send_content');
			$data['cv_id'] = Input::get('cv_id');
			$resume = Resume::where('id', Input::get('cv_id'))->first();
			//code cũ gửi nguyên cái file qua luôn
			/*if($resume->file_name!=null)
			{

				$file=public_path().'/uploads/jobseekers/cv/'.$resume->file_name;
				Mail::send('employers.search.mail_attact', array('send_email'=> Input::get('send_email'), 'send_content'=> Input::get('send_content'), 'ntd_email'=>Auth::getUser()->email, 'firstname'=>Input::get('send_email'), $resume->file_name), function($message) use($file){
		        $message->to(Input::get('send_email'), Input::get('send_email'))->subject('[VNJOBS.VN] ' . Input::get("send_subject"))->attach($file);
		    });
			}

			//return View::make('employers.search.mail', array('send_email'=> Input::get('send_email'), 'send_content'=> Input::get('send_content'), 'ntd_email'=>Auth::getUser()->email, 'firstname'=>Input::get('send_email'), 'resume'=> $resume));
			else{
			Mail::send('employers.search.mail', array('send_email'=> Input::get('send_email'), 'send_content'=> Input::get('send_content'), 'ntd_email'=>Auth::getUser()->email, 'firstname'=>Input::get('send_email'), 'resume'=> $resume), function($message){
		        $message->to(Input::get('send_email'), Input::get('send_email'))->subject('[VNJOBS.VN] ' . Input::get("send_subject"));
		    });}*/
			//code mới chỉ gửi cái link thôi
			Mail::send('employers.mail.mail_link_friend', array('send_email'=> Input::get('send_email'), 'send_content'=> Input::get('send_content'), 'ntd_email'=>Auth::getUser()->email, 'firstname'=>Input::get('send_email'), 'resume'=> $resume), function($message){
		        $message->to(Input::get('send_email'), Input::get('send_email'))->subject('[VNJOBS.VN] ' . Input::get("send_subject"));
		    });


			return Response::json(['has'=>true]);
			return Response::json(['has'=>false]);
		}
		if(Input::get('action') == 'saveStatus')
		{
			$rs = Application::where('id', Input::get('apid'))
			->whereHas('job', function($q) {
				$q->where('ntd_id', Auth::id());
			})
			->update(['status'=>Input::get('status', 1)]);
			if($rs) return Response::json(['has'=>true]);
			return Response::json(['has'=>false]);
		}
		if(Input::get('action') == 'sendLetter')
		{
			$letter = RespondLetter::find(Input::get('letter'));
			$apply = Application::where('id', Input::get('apid'))
			->whereHas('job', function($q) {
				$q->where('ntd_id', Auth::id());
			})
			->first();
			$content = str_replace(['[firstname]', '[lastname]', '[contact-name]'], [$apply->ntv->first_name, $apply->ntv->last_name, Auth::getUser()->full_name], $letter->content);
			$rs = VResponse::create([
				'ntv_id' => $apply->ntv_id,
				'ntd_id' => Auth::id(),
				'title' => $letter->subject,
				'content' => $content,
				'submited_date' => date('Y-m-d H:i:s'),
				'user_submit' => Auth::id(),
				]);
			if($rs) return Response::json(['has'=>true]);
			return Response::json(['has'=>false]);
		}
		if(Input::get('action') == 'saveStatusFolder')
		{
			$rs = RSFolder::where('id', Input::get('apid'))
			->where('ntd_id', Auth::id())
			->update(['status'=>Input::get('status', 1)]);
			if($rs) return Response::json(['has'=>true]);
			return Response::json(['has'=>false]);
		}
	}


	 

	public function getXemchitiet($id)
	{
		$order_inser=\Order::whereNtdId(Auth::id())->first();
		
		$resume = Resume::where('id', $id)->with('cvcategory')->with('location')->with('bangcap')->first();
		$ngayhomnay=strtotime(date('Y-m-d H:i:s'));
		 
		if ($order_inser['remain'] > 0 && strtotime($order_inser['ended_date']) > $ngayhomnay)
		{
			$check_ok=1;
			$order_inser['remain']=$order_inser['remain']-1;
			if($order_inser['remain']<0)
				$order_inser['remain']=0;
			$order_inser->save();
		}
		else $check_ok=0;

		return View::make('employers.search.content_cv',compact('resume','check_ok'));
	}

	 
}
