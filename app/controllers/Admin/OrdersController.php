<?php
Class OrdersController extends \BaseController
{
	function getIndex($id)
	{
		 

		$ntd=NTD::whereId($id)->with('order')->with('orderpostrec')->first();
		 
		$epackage=EPackage::with('eservice')->get();
		$package_view_cv=EServices::whereId(4)->with('packages')->first();
		return View::make('admin.employers.order',compact('ntd','epackage','package_view_cv'));
	}


	function postIndex($id)
	{
		if (Input::get('ck')) {
			foreach (Input::get('ck') as $key => $value) {
				$insert_order=null;
				 $epackage=EPackage::whereId($value)->first();
				 $insert_order=OrderPostRec::whereNtdId($id)->whereEpackageId($value)->first();

				 if ($insert_order) {
					$remain			=	$insert_order->remain_date;
					$total 			=	$remain + $epackage['total_date'];
					$insert_order->eservice_id =	$epackage['service_id'];
					$insert_order->epackage_id	= 	$value;
					$insert_order->epackage_name =	$epackage['package_name'];
					$insert_order->total_date 		=	$epackage['total_date'];
					$insert_order->remain_date		=	$total;
					$insert_order->created_date	=	date('Y-m-d H:i:s');
					$insert_order->ended_date	=	date('Y-m-d H:i:s',strtotime ( ''.$epackage['total_date'].' day' ,  strtotime($insert_order['ended_date']) ) ) ;

					$insert_order->save();

					 
				}

				else 
				{

					$insert_order=OrderPostRec::create(
					array(
						'ntd_id'=>$id,
						'eservice_id'=>$epackage['service_id'],
						'epackage_id'=>$value,
						'epackage_name'=>$epackage['package_name'],
						'total_date'=>$epackage['total_date'],
						'remain_date'=>$epackage['total_date'],
						'created_date'=>date('Y-m-d H:i:s'),
						'ended_date'=>date('Y-m-d H:i:s',strtotime ( ''.$epackage['total_date'].' day' , strtotime (date('Y-m-d H:i:s') ) )) ,
						)
					);	
					 

				}

			}
			return Redirect::back()->with('success','Đã lưu thành công');
		}
		else
			return Redirect::back()->with('success','Đã lưu thành công');
	}



	function postSaveSearchService()
	{

		if(Request::ajax())
		{

			$ntd_id=Input::get('ntd_id');

			if (Input::get('id')) {
				$package=Package::whereId(Input::get('id'))->first();
				$insert_order = Order::whereNtdId($ntd_id)->first();
				 
				if ($insert_order) {
					$remain			=	$insert_order->remain;
					$total 			=	$remain + $package['total_resume'];
					$insert_order->package_id	= 	Input::get('id');
					$insert_order->package_name =	$package['package_name'];
					$insert_order->total 		=	$package['total_resume'];
					$insert_order->remain		=	$total;
					if($insert_order->ended_date	<	date('Y-m-d H:i:s'))
						$insert_order->ended_date	=	date('Y-m-d H:i:s',strtotime ( ''.$package['total_date'].' day' , strtotime (date('Y-m-d H:i:s')) ) ) ;
					else	
						$insert_order->ended_date	=	date('Y-m-d H:i:s',strtotime ( ''.$package['total_date'].' day' , strtotime ($insert_order['ended_date'] ) )) ;

					$insert_order->save();

					return Response::json(['has'=>true]); 
				}

				else 
				{

					$insert_order=Order::create(
					array(
						'ntd_id'=>$ntd_id,
						'package_id'=>Input::get('id'),
						'package_name'=>$package['package_name'],
						'total'=>$package['total_resume'],
						'remain'=>$package['total_resume'],
						'created_date'=>date('Y-m-d H:i:s'),
						'ended_date'=>date('Y-m-d H:i:s',strtotime ( ''.$package['total_date'].' day' , strtotime (date('Y-m-d H:i:s') ) )) ,

							

						)
					);	
					return Response::json(['has'=>true]);

				}
			}
		}
		else return Response::json(['has'=>true]);
			
	}
} 
?>