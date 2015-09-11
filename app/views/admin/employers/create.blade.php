@extends('layouts.admin')
@section('title')Add new Employer @stop
@section('page-header')Thêm mới nhà tuyển dụng @stop
@section('content')
	{{ Form::open(array('method'=>'POST', 'action'=> array('admin.employers.store'), 'class'=>'form form-horizontal' ) ) }}
		@include('includes.notifications')
		
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-6">
				{{ Form::input('email', 'email', null, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Mật khẩu:</label>
			<div class="col-sm-6">
				{{ Form::input('password', 'password', null, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>

		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Tên công ty:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'company_name', null, array('class'=>'form-control', 'required') ) }}
			</div>
		</div>

		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Quy mô công ty <span class="nomal-text">(số nhân viên)</span>:</label>
			<div class="col-sm-6">
				<?php  $quymo = [1=>'Ít hơn 10',
							2=>'10-24',
							3=>'25-99',
							4=>'100-499',
							5=>'500-999',
							6=>'1.000-4.999',
							7=>'5.000-9.999',
							8=>'10.000-19.999',
							9=>'20.000-49.999',
							10=>'Hơn 50.000']; ?>
			{{ Form::select('quymo', $quymo, 1, array('class'=>'form-control')) }}
				
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Sơ lược về công ty:</label>
			<div class="col-sm-6">
				{{ Form::textarea('soluoc', null, array('class'=>'form-control', 'rows'=>'5')) }}
				<span class="pull-right">Số kí tự đã gõ: 0 (Tối đa 10,000 kí tự)</span>
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Địa chỉ công ty:</label>
			<div class="col-sm-6">
				{{ Form::text('company_address', null, array('class'=>'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			<label for="inputFullname" class="col-sm-2 control-label">Họ tên người liên hệ:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'full_name', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Địa chỉ:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'address', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Vị trí:</label>
			<div class="col-sm-6">
				{{ Form::input('text', 'position', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Quốc gia:</label>
			<div class="col-sm-2">
				{{ Form::select('country_id', [1=>'Việt Nam'] , null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Tỉnh thành:</label>
			<div class="col-sm-2">
				{{ Form::select('province_id', Province::lists('province_name', 'id') , null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Điện thoại:</label>
			<div class="col-sm-2">
				{{ Form::input('text', 'phone_number', null, array('class'=>'form-control') ) }}
			</div>
		</div>
		<div class="form-group">
			<label for="input" class="col-sm-2 control-label">Trạng thái:</label>
			<div class="col-sm-2">
				{{ Form::select('is_active', [0=>'Không kích hoạt', 1=>'Kích hoạt'] , 1, array('class'=>'form-control') ) }}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				{{ Form::button('Thêm', array('type'=>'submit', 'class'=>'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop
