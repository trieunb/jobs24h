@extends('layouts.admin')
@section('title')Employers Manager @stop
@section('content')
	@include('includes.notifications')
	<div class="alert alert-block alert-warning">
		Quản lý dịch vụ cho nhà tuyển dụng có email : {{$ntd['email']}}
	</div>
	<div class="alert alert-block alert-default">
		 
		<div class="row">
			<div class="col-md-12">
				 
				<h3>1. Tìm kiếm hồ sơ <i class="fa fa-search"></i></h3>

			
				<table class="table table-hover table-bordered table-striped dataTable" id="table">
					<thead>
						<tr>
							 
							<th>Tên gói</th>
							<th>Số lượng hồ sơ còn có thể xem</th>
							<th>Ngày tạo</th>
							<th>Ngày hết hạn</th>
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
									{{$ntd->order->first()->remain}} hồ sơ
								@else
									Hết số lượng xem hồ sơ
								@endif
							</td>
							<td>
								Ngày {{date("d-m-Y H:i:s", strtotime($ntd->order->first()->created_date))}}
							</td>
							<td>
								Ngày {{date("d-m-Y H:i:s", strtotime($ntd->order->first()->ended_date))}}
								 
							</td>
							<td>
								<button class="btn btn-xs btn-primary" id="save_search"><i class="fa fa-pencil"></i> Cập nhật</button>
								<a class="btn btn-xs btn-danger" onclick="return confirm('Bạn có chắc muốn xóa dịch vụ này hay không ?')" title="Hủy dịch vụ" href="{{URL::route('admin.order.delete',array('cancel-search',$ntd->order->first()->id))}}" id=""><i class="fa fa-trash"></i></a>
							</td>
							</tr>
						@else
						<tr>
							<td>
								{{ Form::select('search_service',$package_view_cv->packages->lists('package_name','id'), array('id' => 'seCompanyID')) }}
							</td>
							<td>Chưa đăng ký dịch vụ</td>
							<td>Chưa đăng ký dịch vụ</td>
							<td>Chưa đăng ký dịch vụ</td>
							<td>
								<button class="btn btn-xs btn-primary" id="save_search"><i class="fa fa-save"></i> Đăng ký</button>

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
			<div class="col-md-6"><h2>2. Đăng tin tuyển dụng</h2></div>
			<div class="col-md-6">
				
			</div>
		</div>
		<div class="col-md-12">
			<p style="font-size: 12px;">- Các gói dịch vụ đã checked là những gói mà nhà tuyển dụng đã mua trước đó. 
			<br>- Nếu muốn cập nhật hoặc đăng ký gói dịch vụ nào thì bấm nút Save tương ứng với gói đó.
			<br>- Nếu muốn cập nhật hoặc đăng ký cho tất cả các gói đã được check thì chọn Lưu tất cả mục đã chọn</p>
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
					
					<th>Loại dịch vụ</th>
					<th>Số ngày còn lại</th>
					<th>Ngày tạo</th>
					<th>Ngày hết hạn</th> 
					<th>Thuộc dịch vụ</th>
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

							<?php $remain='<span style="color:#C6C6C6">Chưa kích hoạt</span>'; 
								  $created_date='<span style="color:#C6C6C6">Chưa kích hoạt</span>';
								  $ended_date ='<span style="color:#C6C6C6">Chưa kích hoạt</span>';
							?>
							@foreach($ntd->orderpostrec as $value1)

								@if($value1['epackage_id']==$value['id'])
									
										@if($value1['remain_date']>0)
										<?php $remain=$value1['remain_date'].' ngày'; ?>
										 
										@else
											<?php $remain = 'Hết Hạn';?>
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
								<a class="btn btn-xs btn-primary" title="Đăng ký/ cập nhật" href="{{URL::route('admin.order.update',array($ntd['id'],$value['id']))}}" id=""><i class="fa fa-save"></i></a>
								<a class="btn btn-xs btn-danger" onclick="return confirm('Bạn có chắc muốn xóa dịch vụ này hay không ?')" title="Hủy dịch vụ" href="{{URL::route('admin.order.delete',array($ntd['id'],$value['id']))}}" id=""><i class="fa fa-trash"></i></a>
							</td>

						</tr>
					@endforeach	
			</tbody>
			

		</table>

		</div>
		 <div class="col-md-12"><button style="margin-top: 22px;" class="btn btn-xs btn-primary" type="submit">Lưu đăng tin tuyển dụng (tất cả mục đã chọn)</button></div>
		{{Form::close() }}
	</div>
	</div>


<!-- 	<div class="clearfix"></div>
	<div class="row">
		
	
		<div class="col-md-12">
			<h2>1. Tìm kiếm hồ sơ</h2>
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
				<button class="btn-info full-right" id="save_search">Lưu tìm kiếm hồ sơ</button>
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
						alert("Đã lưu"); 
						 location.reload();
					} else {
						alert("Không thể lưu"); 
					}
					 
				}

	 		});
	 		 
	 		
	 	});


		</script>
	
@stop