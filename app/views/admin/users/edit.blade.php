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
						<input type="checkbox" name="permission[]" @if(in_array($key, $upermission))checked="checked"@endif value="{{ $key }}">
						{{ $val }}
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
@stop