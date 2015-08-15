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
						<input type="checkbox" name="permission[]" value="{{ $key }}">
						{{ $val }}
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
@stop