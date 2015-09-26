@extends('layouts.admin')
@section('title')Employers Manager @stop
@section('content')
	@include('includes.notifications')
	 
	<div class="alert alert-block alert-success">
		Màn hình quản lý dịch vụ.
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12"><h2>1. Tìm kiếm hồ sơ và xác thực</h2></div>
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
					<th>Tên gói</th>
					<th>Tổng số ngày</th>
					<th>Tổng số Hồ sơ</th>
					<th>Giá</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				
					@foreach($package_view_cv as $value)
					<tr>
					<td style="text-align:center">
						<label class="pos-rel">
							<input value="{{$value['id']}}" type="checkbox" name="ck[]" class="ace" />
							<span class="lbl"></span>
						</label>
					</td>
					
					<td>{{$value['package_name']}}</td>
					<td>{{$value['total_date']}} ngày</td>
					<td>{{$value['total_resume']}} CV</td>
					<td>{{number_format($value['price'], 0,',' , '.' )}} vnd</td>
					<td>
						<a class="btn btn-xs btn-info" title="sửa" href="{{URL::to('admin/product/edit/search/'.$value['id'].'')}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
					 
						<a class="btn btn-xs btn-danger" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa dịch vụ này hay không ?')" href="{{URL::to('admin/product/delete/search/'.$value['id'].'')}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
					 
					</td>
					</tr>
					@endforeach	
			</tbody>
			 

		</table>
		 
		
		</div>
		
	</div>

	<div class="row">
		{{ Form::open(array('method'=>'POST', 'class'=>'form form-horizontal' ) ) }}
		<div class="col-md-12"><h2>2. Dịch vụ đăng tin tuyển dụng</h2></div>
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
					<th>Gói dịch vụ</th>
					<th>Tổng số ngày</th>
					<th>Giá</th>
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
					<td>{{$value['total_date']}} ngày</td>
					<td>{{number_format($value['price'], 0,',' , '.' )}} vnd</td>

					<td>{{$value['eservice']['service_name']}} </td>
					<td>
						<a class="btn btn-xs btn-info" title="sửa" href="{{URL::to('admin/product/edit/post/'.$value['id'].'')}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
					 
						<a class="btn btn-xs btn-danger" onclick="return confirm('Bạn có chắc muốn xóa dịch vụ này hay không ?')" title="Xóa" href="{{URL::to('admin/product/delete/post/'.$value['id'].'')}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
					 
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
	 

	 	 


		</script>
	
@stop