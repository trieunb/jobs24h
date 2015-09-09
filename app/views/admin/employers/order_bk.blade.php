@extends('layouts.admin')
@section('title')Employers Manager @stop
@section('content')
	@include('includes.notifications')
	<div class="alert alert-block alert-warning">
		Quản lý dịch vụ cho nhà tuyển dụng có email : {{$ntd['email']}}
	</div>
	<div class="alert alert-block alert-warning">
		 
		<div class="row">
			<div class="col-md-12">
				<h2>Đã đăng ký</h2>
				<h3>1. Tìm kiếm hồ sơ <i class="fa fa-search"></i></h3>

			
				<table class="table table-hover table-bordered table-striped dataTable" id="table">
					<thead>
						<tr>
							 
							<th>Tên gói</th>
							<th>Số lượng hồ sơ còn có thể xem</th>
							<th>Ngày tạo</th>
							<th>Ngày hết hạn</th>
						</tr>
					</thead>
					<tbody>
						
							@foreach($ntd->order as $value)
							<tr>
							<td>
								
								{{$value['package_name']}}
								
							</td>
							<td>
								@if($value['remain']>0)
									{{$value['remain']}} hồ sơ
								@else
									Hết số lượng xem hồ sơ
								@endif
							</td>
							<td>
								Ngày {{date("d-m-Y H:i:s", strtotime($value['created_date']))}}
							</td>
							<td>
								Ngày {{date("d-m-Y H:i:s", strtotime($value['ended_date']))}}
								 
							</td>

							</tr>
							@endforeach	
					</tbody>
				</table>
			</div>
			<div class="col-md-12">
				<h3>2. Đăng tin tuyển dụng <i class="fa fa-database"></i></h3>
				<table class="table table-hover table-bordered table-striped dataTable" id="table">
					<thead>
						<tr>
							 
							<th>Tên gói</th>
							<th>Số ngày còn lại</th>
							<th>Ngày tạo</th>
							<th>Ngày hết hạn</th>
						</tr>
					</thead>
					<tbody>
						
							@foreach($ntd->orderpostrec as $value)
							<tr>
							<td>{{$value['epackage_name']}}</td>
							<td>
								@if($value['remain_date']>0)
								{{$value['remain_date']}} ngày
								@else
									Hết Hạn
								@endif
							</td>
							<td>
								 
								Ngày {{date("d-m-Y H:i:s", strtotime($value['created_date']))}}

							</td>
							<td>
							Ngày {{date("d-m-Y H:i:s", strtotime($value['ended_date']))}}
								 
							</td>

							</tr>
							@endforeach	
					</tbody>
				</table>
			</div>
		</div>
	</div>


	<div class="clearfix"></div>
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
		
	</div>
	<div class="clearfix"></div>
	<div class="row">
		{{ Form::open(array('method'=>'POST', 'class'=>'form form-horizontal' ) ) }}
		<div class="col-md-12">	
			<div class="col-md-6"><h2>2. Đăng tin tuyển dụng</h2></div>
			<div class="col-md-6">
				<button style="margin-top: 22px;float: right;" class="btn-info" type="submit">Lưu đăng tin tuyển dụng</button>
			</div>
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
					 
					<th>Thuộc dịch vụ</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				
					@foreach($epackage as $value)
					<tr>
					<td style="text-align:center">
						<label class="pos-rel">
							<input value="{{$value['id']}}" type="checkbox" name="ck[]" class="ace" />
							<span class="lbl"></span>
						</label>
					</td>
					
					<td>{{$value['package_name']}}</td>
					<td>{{$value['eservice']['service_name']}}</td>
					<td>
					</td>
					</tr>
					@endforeach	
			</tbody>
			

		</table>
		</div>
		 
		{{Form::close() }}
	</div>
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
	 		var id = $('input[name=search_service]:checked').val();
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