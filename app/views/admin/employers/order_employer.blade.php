@extends('layouts.admin')
@section('title')Employers Manager @stop
@section('content')
<?php $now=date('d-m-Y H:i:s'); ?>
	<div class="alert alert-block alert-default">
		<div class="row">
			 
			<div class="alert alert-block alert-warning">
			Quản lý Dịch vụ Nhà Tuyển Dụng: {{$ntd->email}}<br>
			Số điện thoại : {{$ntd->phone_number}}
			<br>
			Tên Công Ty: {{$ntd->company->company_name}}<br>
			
		</div>
	</div>

	@include('includes.notifications')

			<div class="col-md-12">
				
				<h3>1. Tìm kiếm hồ sơ <i class="fa fa-search"></i></h3>

			
				<table class="table table-hover table-bordered table-striped dataTable" id="table">
					<thead>
						<tr>
							 
							<th>Tên gói</th>
							<th>Số lượng hồ sơ còn có thể xem</th>
							<th>Ngày tạo</th>
							<th>Ngày hết hạn</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						@if($ntd->order->count()>0)
							<tr>
							<td>
								{{ Form::select('search_service',$package_view_cv, $ntd->order->first()->package_id, array('id' => 'seCompanyID')) }}
							</td>
							@if($ntd->order->first()->package_id!=0)
								<td>

									@if($ntd->order->first()->remain>0)
										{{$ntd->order->first()->remain}} hồ sơ
									@else
										Hết lượt xem hồ sơ
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
									<a class="btn btn-xs btn-danger" onclick="return confirm('Bạn có chắc muốn xóa')" title="Xóa dịch vụ" href="{{URL::route('admin.order.delete',array('cancel-search',$ntd->order->first()->id))}}" id=""><i class="fa fa-trash"></i></a>
								</td>
							
							@else
								 
								<td><span style="color:#C6C6C6">Chưa kích hoạt</span></td>
								<td><span style="color:#C6C6C6">Chưa kích hoạt</span></td>
								<td><span style="color:#C6C6C6">Chưa kích hoạt</span></td>
								<td>
									<button class="btn btn-xs btn-primary" id="save_search"><i class="fa fa-save"></i> Cập nhật</button>

								</td>
							@endif
							</tr>
						@else
						<tr>
							<td>
								{{ Form::select('search_service',$package_view_cv, array('id' => 'seCompanyID')) }}
							</td>
							<td><span style="color:#C6C6C6">Chưa kích hoạt</span></td>
							<td><span style="color:#C6C6C6">Chưa kích hoạt</span></td>
							<td><span style="color:#C6C6C6">Chưa kích hoạt</span></td>
							<td>
								<button class="btn btn-xs btn-primary" id="save_search"><i class="fa fa-save"></i> Cập nhật</button>

							</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>


		<div class="clearfix"></div>
		<div class="col-md-12">
		<h3>2. Xác thực nhà tuyển dụng <i class="fa fa-thumbs-o-up"></i></h3>

		<table class="table table-hover table-bordered table-striped dataTable" id="table">
			<thead>
				<tr>
					 
					
					<th>Tên gói</th>
					<th>Ngày tạo</th>
					<th>Ngày hết hạn</th>
					<th>Hành động</th>
				</tr>
			</thead>
			<tbody>
			    <tr>
					<td>{{ Form::select('xacthuc_service',$package_xacthuc, array('id' => 'seCompanyID')) }}</td>

					<?php 
						  $created_date='<span style="color:#C6C6C6">Chưa kích hoạt</span>';
						  $ended_date ='<span style="color:#C6C6C6">Chưa kích hoạt</span>';
					?>
						@if($ntd->order->count()>0)
							@if($ntd->order->first()->is_xacthuc!=0)
								<td>
									Ngày {{date("d-m-Y H:i:s", strtotime($ntd->order->first()->start_date_xacthuc))}}
								</td>
								<td>
									Ngày {{date("d-m-Y H:i:s", strtotime($ntd->order->first()->end_date_xacthuc))}}
									 
								</td>
							@else
								 
								<td>{{$created_date}}</td>
								<td>{{$ended_date}}</td>
							@endif
						@else
								<td>{{$created_date}}</td>
								<td>{{$ended_date}}</td>
						@endif
					<td>

						<button class="btn btn-xs btn-primary" id="save_xacthuc"><i class="fa fa-pencil"></i> Cập nhật</button>
							@if($ntd->order->count()>0)
							@if($ntd->order->first()->is_xacthuc!=0)
								<a class="btn btn-xs btn-danger" onclick="return confirm('Bạn có chắc muốn xóa')" title="Xóa dịch vụ" href="{{URL::route('admin.order.delete',array('cancel-xacthuc',$ntd->order->first()->id))}}" id=""><i class="fa fa-trash"></i></a>
							@endif
							@endif

					</td>

				</tr>
					 	
			</tbody>
			

		</table>

		</div>
		 
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
					 


			$('#save_search').click(function(event) {
		 		var ntd_id	=	{{$ntd['id']}};
		 		var id = $('select[name=search_service]').val();
		 		var action='search';
		 		$.ajax({
		 			url: '{{URL::route("admin.order.saveSearchService")}}',
		 			type: 'POST',
		 			dataType: 'json',
		 			data: {ntd_id:ntd_id,id: id,action:action},
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

		 	$('#save_xacthuc').click(function(event) {
		 		var ntd_id	=	{{$ntd['id']}};
		 		var id = $('select[name=xacthuc_service]').val();
		 		var action='xacthuc';
		 		$.ajax({
		 			url: '{{URL::route("admin.order.saveSearchService")}}',
		 			type: 'POST',
		 			dataType: 'json',
		 			data: {ntd_id:ntd_id,id: id,action:action},
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


	});
	</script>
@stop