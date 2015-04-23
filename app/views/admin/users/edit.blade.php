@extends('layouts.admin')
@section('title')Edit User {{ $user->username }} @stop
@section('content')
	<h3>Chỉnh sửa quản trị: </h3>
	<hr>
	{{ Form::open(array('method'=>'PUT', 'action'=> array('admin.users.update', $user->id), 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
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
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
			</div>
		</div>
	{{ Form::close() }}
@stop