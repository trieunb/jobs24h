@extends('layouts.admin')
@section('title')Edit User {{ $user->username }} @stop
@section('content')
	<h3>Chỉnh sửa người dùng: </h3>
	<hr>
	{{ Form::open(array('method'=>'PUT', 'action'=> array('admin.users.update', $user->id), 'class'=>'form form-horizontal' ) ) }}
		<div class="form-group">
			<label for="inputUsername" class="col-sm-2 control-label">Username:</label>
			<div class="col-sm-10">
				{{ Form::input('text', 'username', $user->username, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-10">
				{{ Form::input('email', 'email', $user->email, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Fullname:</label>
			<div class="col-sm-10">
				{{ Form::input('text', 'first_name', $user->first_name, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputDob" class="col-sm-2 control-label">Ngày sinh:</label>
			<div class="col-sm-2">
				{{ Form::input('date', 'ngaysinh', $user->ngaysinh, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Địa chỉ:</label>
			<div class="col-sm-10">
				{{ Form::input('text', 'diachi', $user->diachi, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Tình trạng hôn nhân:</label>
			<div class="col-sm-10">
				{{ Form::input('text', 'tinhtranghonnhan', $user->tinhtranghonnhan, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Giới tính:</label>
			<div class="col-sm-10">
				{{ Form::input('text', 'gioitinh', $user->gioitinh, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-2 control-label">Giới tính:</label>
			<div class="col-sm-10">
				{{ Form::input('text', 'gioitinh', $user->gioitinh, array('class'=>'form-control') ) }}
			</div>
		</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
	{{ Form::close() }}
@stop