@extends('layouts.admin')
@section('title')Edit Employer #{{ $employer->id }} @stop
@section('page-header')Sửa thông tin nhà tuyển dụng @stop
@section('content')
	{{ Form::open(array('method'=>'POST', 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
		
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-6">
				{{ Form::input('email', 'email', $employer->email, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Mật khẩu:</label>
			<div class="col-sm-6">
				{{ Form::input('password', 'password', null, array('class'=>'form-control') ) }}
			</div>
			<div class="col-sm-4">
				<i>Để trống là không sửa</i>
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Họ tên:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'full_name', $employer->full_name, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Địa chỉ:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'address', $employer->address, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Vị trí:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'position', $employer->position, array('class'=>'form-control') ) }}
			</div>
		</div>
		
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Quốc gia:</label>
			<div class="col-sm-2">
				{{ Form::select('country_id', [1=>'Việt Nam'] , $employer->country_id, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tỉnh thành:</label>
			<div class="col-sm-2">
				{{ Form::select('province_id', Province::lists('province_name', 'id') , $employer->province_id, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Điện thoại:</label>
			<div class="col-sm-2">
				{{ Form::input('text', 'phone_number', $employer->phone_number, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Trạng thái:</label>
			<div class="col-sm-2">
				{{ Form::select('is_active', [0=>'Không kích hoạt', 1=>'Kích hoạt'] , $employer->is_active, array('class'=>'form-control') ) }}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Lưu thay đổi', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop
