@extends('layouts.admin')
@section('title')Quản lý tin tức người tìm việc @stop
@section('page-header') Quản lý tin tức người tìm việc, cẩm nang người tìm việc, cẩm nang nhà tuyển dụng trong phần Người Tìm Việc
@stop
@section('content')
@include('includes.notifications')
	<div class="clearfix"></div>
	<div class="infobox infobox-green">
		<div class="infobox-icon">
			<i class="ace-icon fa fa-newspaper-o"></i>
		</div>

		<div class="infobox-data">
			<span class="infobox-data-number">Có {{ $total_news_ntv }}</span>
			<div class="infobox-content">Tin tức người tìm việc</div>
		</div>

		<!-- <div class="stat stat-success">8%</div> -->
	</div>

	<div class="infobox infobox-blue">
		<div class="infobox-icon">
			<i class="ace-icon fa fa-mortar-board"></i>
		</div>

		<div class="infobox-data">
			<span class="infobox-data-number">Có {{ $total_cn_ntv }}</span>
			<div class="infobox-content">Cẩm nang NTV</div>
		</div>

		<!-- <div class="badge badge-success">
			+32%
			<i class="ace-icon fa fa-arrow-up"></i>
		</div> -->
	</div>

	<div class="infobox infobox-pink">
		<div class="infobox-icon">
			<i class="ace-icon fa fa-mortar-board"></i>
		</div>

		<div class="infobox-data">
			<span class="infobox-data-number">Có {{ $total_cn_ntd }}</span>
			<div class="infobox-content">Cẩm nang NTD</div>
		</div>
		<!-- <div class="stat stat-important">4%</div> -->
	</div>




	{{ Form::open( array('route'=>array('news.post-delete'), 'class'=>'form-horizontal', 'method'=>'POST') ) }}
	<table class="table table-hover table-bordered table-striped dataTable" id="table">
		<thead>
			<tr>
				<th>
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>ID</th>
				<th class="col-sm-5">Tiêu đề</th>
				<th class="col-sm-2">Chuyên mục</th>
				<th class="col-sm-2">#</th>
			</tr>
		</thead>
		<tbody>
			
				@foreach($list_news as $value)
				<tr>
				<td>
					<label class="pos-rel">
						{{Form::checkbox('id[]', $value->id, null, array('class'=>'ace'))}}
						<span class="lbl"></span>
					</label>
				</td>
				<td>{{$value->id}}</td>				
				<td><a href="{{URL::action('News@getIndex',$value->id)}}" target="_blank">{{$value->title}}</a></td>
				<td>{{$value->trainingCat->name}}</td>
				<td>
					<a class="btn btn-xs btn-info" title="sửa" href="{{URL::route('news.edit', array('id'=>$value->id))}}"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
					<a class="btn btn-xs btn-danger" title="Xóa" href="{{URL::route('news.delete', array('id'=>$value->id))}}"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
				</td>
				</tr>
				@endforeach	
			
		</tbody>
	</table>
	<a href="{{URL::route('news.add')}}" class="btn btn-primary">Đăng Tin mới</a>
	{{Form::submit('Xóa tất cả mục đã chọn', array('class'=>'btn'))}}
	{{Form::close()}}
	 
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

	});
	</script>
@stop