@extends('layouts.admin')
@section('title')Quản lý địa điểm @stop
@section('page-header') Quản lý địa điểm @stop
@section('content')
@include('includes.notifications')
	<style type="text/css">
	.loading-icon {display: none; position: fixed; top: 45%; left: 50%; background: url(../assets/images/loading.gif) no-repeat; width: auto; height: 42px; padding-left: 47px; line-height: 42px; }
	.btn {border: 0;}
	</style>
	<div class="clearfix"></div>
	
	<p class="col-sm-5 row">
		<select name="" id="select_parent" class="form-control" required="required">
			@foreach($list_province as $value)
				<option value="{{$value['id']}}">{{$value['parent']}}</option>
			@endforeach
		</select>
	</p>
	<p class="col-sm-7">
		<a href="{{URL::route("admin.province.edit.get", $list_province[0]['id']), 'country'}}" class="btn btn-primary edit_parent">Chỉnh sửa</a>
		<a href="#" class="btn btn-danger delete_parent" id="{{$list_province[0]['id']}}" type="country">Xóa</a>
	</p>
	<div class="clearfix"></div>
	<table class="table table-hover table-bordered table-striped dataTable province">
		<thead>
			<tr>
				<th class="col-sm-5">Danh mục</th>
				<th class="col-sm-2">Số lượng hồ sơ</th>
				<th class="col-sm-2">Số lượng tin tuyển dụng</th>
				<th class="col-sm-2">#</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($provinces))
			@foreach($provinces as $key => $value)
			<tr>			
				<td>{{$value['name']}}</td>				
				<td><a href="{{URL::route("admin.province.resume.get", $value['id'])}}">{{$value['count_resume']}}</a></td>				
				<td><a href="{{URL::route("admin.province.job.get", $value['id'])}}">{{$value['count_job']}}</a></td>				
				<td>
					<a class="btn btn-xs btn-info" href="{{URL::route("admin.province.edit.get", $value['id'])}}" title="Edit"><i class="ace-icon fa fa-pencil bigger-120"></i></a> 
					<button class="btn btn-xs btn-danger delete" id="{{$value['id']}}" type="province"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
				</td>				
			</tr>
			@endforeach	
			@endif
		</tbody>
	</table>
	<div class="modal fade delete_rs" id="delete_cate">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p>Khi bị xóa, tất cả <strong>"Tin tuyển dụng"</strong> và <strong>"Hồ sơ"</strong> liên quan đến Địa điểm sẽ bị xóa. Bạn chắc chắn  việc này?</p>
				</div>
				<div class="modal-footer">
					{{Form::button('Hủy', array('class'=>'btn btn-default', 'data-dismiss'=>'modal'))}}
					{{Form::button('Xóa', array('class'=>'del-cate btn bg-orange'))}}
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal --> 
	<div class="loading-icon"></div>
@stop

@section('style')
	{{ HTML::style('assets/css/dataTables.bootstrap.css') }}
@stop

@section('script')
	{{ HTML::script('assets/js/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/js/jquery.dataTables.bootstrap.min.js') }}
	<script>
	$(document).ready(function() {
    	$('#table').dataTable();
    	$('#select_parent').change(function(event) {
    		event.preventDefault();
			var id = $(this).val();
			$('.edit_parent').attr('href', '{{URL::route("admin.province.edit.get")}}/'+id+'country');
			$('.delete_parent').attr('id', id);
			url = '{{ URL::route("admin.province.home")}}';
			var html = '';
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'json',
				data: {country_id: id},
			})
			.done(function(json) {
				$.each(json, function(index, val) {
				    html += '<tr><td>'+val.name+'</td><td><a href="{{URL::route("admin.province.resume.get")}}/'+val.id+'">'+val.count_resume+'</a></td><td><a href="{{URL::route("admin.province.job.get")}}/'+val.id+'">'+val.count_job+'</a></td><td><a class="btn btn-xs btn-info" href="{{URL::route("admin.province.edit.get")}}/'+val.id+'" title="Edit"><i class="ace-icon fa fa-pencil bigger-120"></i></a><button class="btn btn-xs btn-danger delete" id="'+val.id+'" type="province"><i class="ace-icon fa fa-trash-o bigger-120"></i></button></td></tr>';
				});
				$('.province tbody').html(html);
			})
			.fail(function(json) {
				$('.province tbody').text('');
			})
			
    	});

    	$(document).on('click', '.delete_parent, .delete', function(event) {
    		event.preventDefault();
    		$('#delete_cate').modal('show');
    		var id = $(this).attr('id');
    		var type = $(this).attr('type');
    		$(document).on('click', '.del-cate ', function(event) {
    			$('.loading-icon').show();
    			$('#delete_cate').modal('hide');
    			$.ajax({
    				url: '{{URL::route("admin.province.delete")}}',
    				type: 'POST',
    				dataType: 'json',
    				data: {id: id, type : type},
    			})
    			.done(function(json) {
    				$('.loading-icon').hide();
    				location.reload();
    			})
    			.fail(function(json) {
    				console.log("error");
    				$('.loading-icon').hide();
    			})
    		});
    	});
	});
	
	</script>
@stop