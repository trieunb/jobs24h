@extends('layouts.admin')
@section('title')Quản lý tin tức @stop
@section('page-header') Quản lý tin tức @stop
@section('content')
@include('includes.notifications')
	<div class="clearfix"></div>
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
				<th class="col-sm-2">Nội dung chính</th>
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
				<td><a href="{{URL::route('news.edit', array('id'=>$value->id))}}" target="_blank">{{$value->title}}</a></td>
				 
				<td>
					<?php
					// strip tags to avoid breaking any html
					$string = $value->content;
					$string = strip_tags($string);

					if (strlen($string) > 100) {
					    // truncate string
					    $stringCut = substr($string, 0, 100);

					    // make sure it ends in a word so assassinate doesn't become ass...
					    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
					}
					echo "<p>$string</p>";
					?>
				</td>
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