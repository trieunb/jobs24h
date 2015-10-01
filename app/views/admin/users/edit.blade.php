@extends('layouts.admin')
@section('title')Edit User {{ $user->username }} @stop
@section('page-header')Chỉnh sửa quản trị @stop
@section('content')
	{{ Form::open(array('method'=>'PUT', 'action'=> array('admin.users.update', $user->id), 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
		@if($user->id == AdminAuth::getUser()->id)
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			Đây là bạn, hãy cẩn thận trong việc chỉnh sửa chức năng, điều này có thể làm bạn mất quyền quản trị admin
		</div>
		@endif
		<div class="form-group">
			<label for="inputUsername" class="col-sm-2 control-label">Username:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'username', $user->username, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-6">
				{{ Form::input('email', 'email', $user->email, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Mật khẩu:</label>
			<div class="col-sm-6">
				{{ Form::input('password', 'password', null, array('class'=>'form-control') ) }}
			</div>
			<small><i>Để trống là không sửa</i></small>
		</div>
		<hr>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Chức năng:</label>
			<div class="col-sm-6">
			<?php $upermission = json_decode($user->permissions, true);if(!$upermission) $upermission = [];
			?>
				@foreach(Config::get('custom_admin_group.permission') as $key=>$val )
				<div class="checkbox">
					<label>
						<input id="{{$key}}" type="checkbox" name="permission[]" @if(in_array($key, $upermission))checked="checked"@endif value="{{ $key }}">
						{{ $val }}
						@if($key=="ntv_full")
							( <span style="color:red;font-size: 12px;"> Còn tổng cộng {{$total_ntv_not_share}} NTV chưa được chia </span>)
							<a target="_blank" href="{{URL::route('admin.employers.index')}}?Search={{$user->username}}"><p style="font-size: 12px;font-style: italic;">User này đang quản lý <span style="color:red">{{$total_ntv_share}}</span> Người Tìm Việc</p></a>							<div class="ntv_full"></div>
						@endif
						@if($key=="ntd_full")
						
						(<span style="color:red;font-size: 12px;"> Còn tổng cộng {{$total_ntd_not_share}} NTD chưa được chia</span>)
						<a target="_blank" href="{{URL::route('admin.employers.index')}}?Search={{$user->username}}"><p style="font-size: 12px;font-style: italic;">User này đang quản lý <span style="color:red;">{{$total_ntd_share}}</span> Nhà Tuyển Dụng</p>	</a>
							<div class="ntd_full"></div>
						@endif
					</label>
				</div>
				@endforeach
			</div>
			
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
			</div>
		</div>
	{{ Form::close() }}
	{{ Form::open(array("method"=>"delete", "route"=>array("admin.users.destroy",$user->id) )) }}
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<button class="btn btn-danger" onclick="return confirm(\'Bạn có muốn xóa user này ?\');" type="submit" title="Delete"><i class="glyphicon glyphicon-remove"></i> Xóa User</button>
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