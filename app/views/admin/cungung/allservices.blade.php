@extends('layouts.admin')
@section('title')Danh sách dịch vụ @stop
@section('page-header') Các dịch vụ trong Cung ứng dịch vụ @stop
@section('content')
@include('includes.notifications')
	<div class="clearfix"></div>
	<table class="table table-hover table-bordered table-striped dataTable" id="table">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>ID</th>
				<th>Tiêu đề</th>
				<th>banner</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			
				@foreach($data as $value)
				<tr>
				<td>
					<label class="pos-rel">
						<input type="checkbox" name="ck" class="ace" />
						<span class="lbl"></span>
					</label>
				</td>
				<td>{{$value['id']}}</td>				
				<td>{{$value['name']}}</td>
				 
				 
				<td><a href="{{$value['banner']}}"  target="blank">{{HTML::image($value['banner'],$value['title'],array('style'=>'width:100px'))}}</a></td>
				 
				  
				<td>
					<a class="btn btn-xs btn-info" title="sửa" href="{{URL::to('admin/cungunglaodong/edit-services/'.$value['id'].'')}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
					<div style="padding:10px"></div>
					 <a class="btn btn-xs btn-danger" title="Xóa" href="{{URL::to('admin/cungunglaodong/delete-services/'.$value['id'].'')}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
					 <div style="padding:10px"></div>
					  <a class="btn btn-xs btn-default" title="Xem tất cả bài đăng của dịch vụ này" href="{{URL::to('admin/cungunglaodong/view-post-services/'.$value['id'].'')}}"><i style="color:white" class="menu-icon fa fa-eye pink"></i></a>
				</td>
				</tr>
				@endforeach	
			
		</tbody>
	</table>
	<a href="{{URL::to('admin/cungunglaodong/add-services')}}" class="btn">Thêm Dịch Vụ</a>

	 
@stop

@section('style')
	{{ HTML::style('assets/css/dataTables.bootstrap.css') }}
@stop

@section('script')
	{{ HTML::script('assets/js/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/js/jquery.dataTables.bootstrap.min.js') }}
	 <script>$(document).ready(function() {
    $('#table').dataTable();
	} );</script>
@stop