@extends('layouts.admin')
@section('title')Employers Manager @stop
@section('content')
	@include('includes.notifications')
	<div class="alert alert-block alert-warning">
		Quáº£n lÃ½ dá»‹ch vá»¥ cho nhÃ  tuyá»ƒn dá»¥ng cÃ³ email : {{$ntd['email']}}
	</div>
	<div class="alert alert-block alert-default">
		 
		<div class="row">
			<div class="col-md-12">
				 
				<h3>1. TÃ¬m kiáº¿m há»“ sÆ¡ <i class="fa fa-search"></i></h3>

			
				<table class="table table-hover table-bordered table-striped dataTable" id="table">
					<thead>
						<tr>
							 
							<th>TÃªn gÃ³i</th>
							<th>Sá»‘ lÆ°á»£ng há»“ sÆ¡ cÃ²n cÃ³ thá»ƒ xem</th>
							<th>NgÃ y táº¡o</th>
							<th>NgÃ y háº¿t háº¡n</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						
						@if($ntd->order->first()!=null)
							<tr>
							<td>
								{{ Form::select('search_service',$package_view_cv->packages->lists('package_name','id'), $ntd->order->first()->package_id, array('id' => 'seCompanyID')) }}
							</td>
							<td>
								@if($ntd->order->first()->remain>0)
									{{$ntd->order->first()->remain}} há»“ sÆ¡
								@else
									Háº¿t sá»‘ lÆ°á»£ng xem há»“ sÆ¡
								@endif
							</td>
							<td>
								NgÃ y {{date("d-m-Y H:i:s", strtotime($ntd->order->first()->created_date))}}
							</td>
							<td>
								NgÃ y {{date("d-m-Y H:i:s", strtotime($ntd->order->first()->ended_date))}}
								 
							</td>
							<td>
								<button class="btn btn-xs btn-primary" id="save_search"><i class="fa fa-pencil"></i> Cáº­p nháº­t</button>
								<a class="btn btn-xs btn-danger" onclick="return confirm('Báº¡n cÃ³ cháº¯c muá»‘n xÃ³a dá»‹ch vá»¥ nÃ y hay khÃ´ng ?')" title="Há»§y dá»‹ch vá»¥" href="{{URL::route('admin.order.delete',array('cancel-search',$ntd->order->first()->id))}}" id=""><i class="fa fa-trash"></i></a>
							</td>
							</tr>
						@else
						<tr>
							<td>
								{{ Form::select('search_service',$package_view_cv->packages->lists('package_name','id'), array('id' => 'seCompanyID')) }}
							</td>
							<td>ChÆ°a Ä‘Äƒng kÃ½ dá»‹ch vá»¥</td>
							<td>ChÆ°a Ä‘Äƒng kÃ½ dá»‹ch vá»¥</td>
							<td>ChÆ°a Ä‘Äƒng kÃ½ dá»‹ch vá»¥</td>
							<td>
								<button class="btn btn-xs btn-primary" id="save_search"><i class="fa fa-save"></i> ÄÄƒng kÃ½</button>

							</td>
						</tr>
						@endif	 
					</tbody>
				</table>
			</div>
			<div class="clearfix"></div>
	<div class="row">
		{{ Form::open(array('method'=>'POST', 'class'=>'form form-horizontal' ) ) }}
		<div class="col-md-12">	
			<div class="col-md-6"><h2>2. ÄÄƒng tin tuyá»ƒn dá»¥ng</h2></div>
			<div class="col-md-6">
				
			</div>
		</div>
		<div class="col-md-12">
			<p style="font-size: 12px;">- CÃ¡c gÃ³i dá»‹ch vá»¥ Ä‘Ã£ checked lÃ  nhá»¯ng gÃ³i mÃ  nhÃ  tuyá»ƒn dá»¥ng Ä‘Ã£ mua trÆ°á»›c Ä‘Ã³. 
			<br>- Náº¿u muá»‘n cáº­p nháº­t hoáº·c Ä‘Äƒng kÃ½ gÃ³i dá»‹ch vá»¥ nÃ o thÃ¬ báº¥m nÃºt Save tÆ°Æ¡ng á»©ng vá»›i gÃ³i Ä‘Ã³.
			<br>- Náº¿u muá»‘n cáº­p nháº­t hoáº·c Ä‘Äƒng kÃ½ cho táº¥t cáº£ cÃ¡c gÃ³i Ä‘Ã£ Ä‘Æ°á»£c check thÃ¬ chá»n LÆ°u táº¥t cáº£ má»¥c Ä‘Ã£ chá»n</p>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-12">
		<table class="table table-hover table-bordered table-striped dataTable" id="table">
			<thead>
				<tr>
					<th class="center">
						<label class="pos-rel">
							<input type="checkbox" class="ace" />
							<span class="lbl"></span>
						</label>
					</th>
					
					<th>Loáº¡i dá»‹ch vá»¥</th>
					<th>Sá»‘ ngÃ y cÃ²n láº¡i</th>
					<th>NgÃ y táº¡o</th>
					<th>NgÃ y háº¿t háº¡n</th> 
					<th>Thuá»™c dá»‹ch vá»¥</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				
					@foreach($epackage as $value)
						<tr>
							<td style="text-align:center">
								<label class="pos-rel">
								{{ Form::checkbox('ck[]', $value['id'],in_array( $value['id'],$ntd->orderpostrec->lists('epackage_id')),array('class'=>'ace') ) }}
									
									<span class="lbl"></span>
								</label>
							</td>
							
							<td>{{$value['package_name']}}</td>

							<?php $remain='<span style="color:#C6C6C6">ChÆ°a kÃ­ch hoáº¡t</span>'; 
								  $created_date='<span style="color:#C6C6C6">ChÆ°a kÃ­ch hoáº¡t</span>';
								  $ended_date ='<span style="color:#C6C6C6">ChÆ°a kÃ­ch hoáº¡t</span>';
							?>
							@foreach($ntd->orderpostrec as $value1)

								@if($value1['epackage_id']==$value['id'])
									
										@if($value1['remain_date']>0)
										<?php $remain=$value1['remain_date'].' ngÃ y'; ?>
										 
										@else
											<?php $remain = 'Háº¿t Háº¡n';?>
										@endif
										<?php $created_date=date("d-m-Y H:i:s", strtotime($value1['created_date'])) ?>
										
										<?php $ended_date=date("d-m-Y H:i:s", strtotime($value1['ended_date'])) ?> 
								
								@endif
							@endforeach
								<td>{{$remain}}</td>
								<td>{{$created_date}}</td>
								<td>{{$ended_date}}</td>
							<td>{{$value['eservice']['service_name']}}</td>
							<td>
								<a class="btn btn-xs btn-primary" title="ÄÄƒng kÃ½/ cáº­p nháº­t" href="{{URL::route('admin.order.update',array($ntd['id'],$value['id']))}}" id=""><i class="fa fa-save"></i></a>
								<a class="btn btn-xs btn-danger" onclick="return confirm('Báº¡n cÃ³ cháº¯c muá»‘n xÃ³a dá»‹ch vá»¥ nÃ y hay khÃ´ng ?')" title="Há»§y dá»‹ch vá»¥" href="{{URL::route('admin.order.delete',array($ntd['id'],$value['id']))}}" id=""><i class="fa fa-trash"></i></a>
							</td>

						</tr>
					@endforeach	
			</tbody>
			

		</table>

		</div>
		 <div class="col-md-12"><button style="margin-top: 22px;" class="btn btn-xs btn-primary" type="submit">LÆ°u Ä‘Äƒng tin tuyá»ƒn dá»¥ng (táº¥t cáº£ má»¥c Ä‘Ã£ chá»n)</button></div>
		{{Form::close() }}
	</div>
	</div>


<!-- 	<div class="clearfix"></div>
	<div class="row">
		
	
		<div class="col-md-12">
			<h2>1. TÃ¬m kiáº¿m há»“ sÆ¡</h2>
		</div>
		<div class="col-md-12">
			@foreach($package_view_cv->packages as $value)
				<div class="col-md-2">
					<label class="radio-inline" for="{{$value['package_name']}}">
						<input type="radio" id="{{$value['package_name']}}" name="search_service" value="{{$value['id']}}" />{{$value['package_name']}}
					
					</label>
				</div>
			@endforeach
			<div class="col-md-2">
				<button class="btn-info full-right" id="save_search">LÆ°u tÃ¬m kiáº¿m há»“ sÆ¡</button>
			</div>
		</div>
		
	</div> -->

@stop

@section('style')
	{{ HTML::style('assets/css/dataTables.bootstrap.css') }}
@stop

@section('script')
	 <script>
	 $(document).ready(function() {
	    
		 
	  var active_class = 'success';
		$('#table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

		$('#table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
		 

		});
	 

	 	$('#save_search').click(function(event) {
	 		var ntd_id	=	{{$ntd['id']}};
	 		var id = $('select[name=search_service]').val();
	 		$.ajax({
	 			url: '{{URL::route("admin.order.saveSearchService")}}',
	 			type: 'POST',
	 			dataType: 'json',
	 			data: {ntd_id:ntd_id,id: id},
	 			success: function(json)
				{
					if(json.has)
					{
						alert("ÄÃ£ lÆ°u"); 
						 location.reload();
					} else {
						alert("KhÃ´ng thá»ƒ lÆ°u"); 
					}
					 
				}

	 		});
	 		 
	 		
	 	});


		</script>
	
@stop