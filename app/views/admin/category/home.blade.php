@extends('layouts.admin')
@section('title')Quản lý ngành nghề @stop
@section('page-header') Quản lý ngành nghề @stop
@section('content')
@include('includes.notifications')
	<style type="text/css">
	.loading-icon {display: none; position: fixed; top: 45%; left: 50%; background: url(../assets/images/loading.gif) no-repeat; width: auto; height: 42px; padding-left: 47px; line-height: 42px; }
	.btn {border: 0;}
	</style>
	<div class="clearfix"></div>
	<p class="col-sm-5 row">
		<select name="" id="select_parent" class="form-control" required="required">
			@foreach($list_category as $value)
				<option value="{{$value['id']}}">{{$value['parent']}}</option>
			@endforeach
		</select>
	</p>
	<p class="col-sm-7">
		<a href="{{URL::route("admin.category.edit.get", $list_category[0]['id'])}}" class="btn btn-primary edit_parent">Chỉnh sửa</a>
		<a href="#" class="btn btn-danger delete_parent" id="{{$list_category[0]['id']}}">Xóa</a>
	</p>
	<div class="clearfix"></div>
	<table class="table table-hover table-bordered table-striped dataTable category">
		<thead>
			<tr>
				<th class="col-sm-5">Danh mục</th>
				<th class="col-sm-2">Số lượng hồ sơ</th>
				<th class="col-sm-2">Số lượng tin tuyển dụng</th>
				<th class="col-sm-2">#</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($sub_cate))
			@foreach($sub_cate as $key => $value)
			<tr>			
				<td>{{$value['name']}}</td>				
				<td><a href="{{URL::route("admin.category.resume.get", $value['id'])}}">{{$value['count_resume']}}</a></td>				
				<td><a href="{{URL::route("admin.category.job.get", $value['id'])}}">{{$value['count_job']}}</a></td>				
				<td>
					<a class="btn btn-xs btn-info" href="{{URL::route("admin.category.edit.get", $value['id'])}}" title="Edit"><i class="ace-icon fa fa-pencil bigger-120"></i></a> 
					<button class="btn btn-xs btn-danger delete" id="{{$value['id']}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
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
					<p>Khi bị xóa, tất cả <strong>"Tin tuyển dụng"</strong> và <strong>"Hồ sơ"</strong> liên quan đến Ngành nghề sẽ bị xóa. Bạn chắc chắn  việc này?</p>
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
			$('.edit_parent').attr('href', '{{URL::route("admin.category.edit.get")}}/'+id);
			$('.delete_parent').attr('id', id);
			url = '{{ URL::route("admin.category.home")}}';
			var html = '';
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'json',
				data: {parent_id: id},
			})
			.done(function(json) {
				$.each(json, function(index, val) {
				    html += '<tr><td>'+val.name+'</td><td><a href="{{URL::route("admin.category.resume.get")}}/'+val.id+'">'+val.count_resume+'</a></td><td><a href="{{URL::route("admin.category.job.get")}}/'+val.id+'">'+val.count_job+'</a></td><td><a class="btn btn-xs btn-info" href="{{URL::route("admin.category.edit.get")}}/'+val.id+'" title="Edit"><i class="ace-icon fa fa-pencil bigger-120"></i></a><button class="btn btn-xs btn-danger delete" id="'+val.id+'"><i class="ace-icon fa fa-trash-o bigger-120"></i></button></td></tr>';
				});
				$('.category tbody').html(html);
			})
			.fail(function(json) {
				$('.category tbody').text('');
			})
			
    	});

    	$(document).on('click', '.delete_parent, .delete', function(event) {
    		event.preventDefault();
    		$('#delete_cate').modal('show');
    		var id = $(this).attr('id');
    		$(document).on('click', '.del-cate ', function(event) {
    			$('#delete_cate').modal('hide');
    			$('.loading-icon').show();
    			$.ajax({
    				url: '{{URL::route("admin.category.delete")}}',
    				type: 'POST',
    				dataType: 'json',
    				data: {id: id},
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