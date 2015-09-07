@extends('layouts.admin')
@section('title')Edit @stop
@section('page-header')Sửa thông tin Các dịch vụ @stop
@section('content')
	

	@if($package_view_cv!=null)
	{{ Form::open(array('method'=>'POST', 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
		
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Tên gói:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'package_name', $package_view_cv->package_name, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Tổng số ngày:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'total_date', $package_view_cv->total_date, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Tổng số hồ sơ được xem:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'total_resume', $package_view_cv->total_resume, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Giá:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'price', $package_view_cv->price, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Lưu thay đổi', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
	@endif

	@if($epackage!=null)
	{{ Form::open(array('method'=>'POST', 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
		
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Tên gói:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'package_name', $epackage->package_name, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Tổng số ngày:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'total_date', $epackage->total_date, array('class'=>'form-control') ) }}
			</div>
		</div>
		
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Giá:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'price', $epackage->price, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Lưu thay đổi', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
	@endif


@stop
