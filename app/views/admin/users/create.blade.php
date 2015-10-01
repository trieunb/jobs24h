@extends('layouts.admin')
@section('title')Add new Administrator @stop
@section('page-header')Thêm mới quản trị viên @stop


@section('content')
	{{ Form::open(array('method'=>'POST', 'action'=> array('admin.users.store'), 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
		<div class="form-group">
			<label for="inputUsername" class="col-sm-2 control-label">Username:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'username', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-6">
				{{ Form::input('email', 'email', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Mật khẩu:</label>
			<div class="col-sm-6">
				{{ Form::input('password', 'password', null, array('class'=>'form-control') ) }}
			</div>
			
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Chức năng:</label>
			<div class="col-sm-6">
			<?php
			?>
				@foreach(Config::get('custom_admin_group.permission') as $key=>$val )
				<div class="checkbox">
					<label>
						<input type="checkbox" name="permission[]" id="{{ $key }}" value="{{ $key }}">
						{{ $val }}
						@if($key=="ntv_full")
							
							( <span style="color:red;font-size: 12px;"> Còn tổng cộng {{$total_ntv_not_share}} NTV chưa được chia </span>)
							<div class="ntv_full"></div>
						@endif
						@if($key=="ntd_full")
						(<span style="color:red;font-size: 12px;"> Còn tổng cộng {{$total_ntd_not_share}} NTD chưa được chia</span>)
							<div class="ntd_full"></div>
						@endif

						 
					</label>
				</div>
				@endforeach
			</div>
			
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Thêm</button>
			</div>
		</div>
	{{ Form::close() }}

	{{ HTML::script('training/assets/js/jquery.min.js') }}
	 
	<script type="text/javascript">
	$(document).ready(function()
	{
	 
	 	$('#ntv_full').change(function(e)
	 	{
			if ($('#ntv_full').is(":checked"))
				{
				   $('.ntv_full').append('<input type="number" name="num_ntv"><p style="font-size: 12px;font-style: italic;">Nhập số người tìm việc mà bạn muốn chia cho user này</p>')
				}
			else
				$('.ntv_full').empty();
	 	});

	 	$('#ntd_full').change(function(e)
	 	{
			if ($('#ntd_full').is(":checked"))
				{
				   $('.ntd_full').append('<input type="number" name="num_ntd"><p style="font-size: 12px;font-style: italic;">Nhập số nhà tuyển dụng mà bạn muốn chia cho user này</p>')
				}
			else
				$('.ntd_full').empty();
	 	});

	 	
	});
	</script>
@stop