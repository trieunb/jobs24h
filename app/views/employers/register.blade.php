@extends('layouts.employer')
@section('title') Đăng Kí @stop
@section('content')
	<div class="col-xs-12 main-content register-form">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="heading-title">
										<span>Đăng ký</span>
										<span class="pull-right content-required"><span class="text-required">*</span> Thông tin bắt buộc</span>
									</div>

								</div>
								<div class="panel-body">
								   <div class="col-xs-12 form-input">
								   		{{ Form::open(array('method'=>'POST', 'route'=>'employers.register', 'class'=>'form-horizontal')) }}
								   			<h3 class="form-legend">Thông tin đăng nhập</h3>
								   			@include('includes.notifications')
								   			<div class="form-group">
								   				<label for="inputEmail" class="col-sm-4 control-label"><span class="text-required">*</span> Email đăng nhập:</label>
								   				<div class="col-sm-8">
								   					{{ Form::email('email', null, array('class'=>'form-control', 'required') ) }}
								   				</div>
								   			</div>
								   			<div class="form-group">
								   				<label for="inputEmail" class="col-sm-4 control-label"><span class="text-required">*</span> Xác nhận Email:</label>
								   				<div class="col-sm-8">
								   					{{ Form::email('email_confirmation', null, array('class'=>'form-control', 'required') ) }}
								   				</div>
								   			</div>
								   			<div class="form-group">
								   				<label for="input" class="col-sm-4 control-label"><span class="text-required">*</span> Mật khẩu:</label>
								   				<div class="col-sm-8">
								   					{{ Form::password('password', array('class'=>'form-control', 'required') ) }}
								   					<span class="pull-right">4-12 kí tự</span>
								   				</div>
								   			</div>
								   			
								   			<div class="form-group">
								   				<label for="input" class="col-sm-4 control-label"><span class="text-required">*</span> Xác nhận mật khẩu:</label>
								   				<div class="col-sm-8">
								   					{{ Form::password('password_confirmation', array('class'=>'form-control', 'required') ) }}
								   				</div>
								   			</div>
											
											<h3 class="form-legend">Thông tin đăng ký</h3>

								   			<div class="form-group">
								   				<label for="input" class="col-sm-4 control-label"><span class="text-required">*</span> Tên công ty:</label>
								   				<div class="col-sm-8">
								   					{{ Form::text('company_name', null, array('class'=>'form-control', 'required') ) }}
								   				</div>
								   			</div>
								   			<div class="form-group">
								   				<label for="input" class="col-sm-4 control-label">Quy mô công ty <span class="nomal-text">(số nhân viên)</span>:</label>
								   				<div class="col-sm-8">
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
								   				<label for="input" class="col-sm-4 control-label">Sơ lược về công ty:</label>
								   				<div class="col-sm-8">
								   					{{ Form::textarea('soluoc', null, array('class'=>'form-control', 'rows'=>'5')) }}
								   					<span class="pull-right">Số kí tự đã gõ: 0 (Tối đa 10,000 kí tự)</span>
								   				</div>
								   			</div>
								   			<div class="form-group">
								   				<label for="input" class="col-sm-4 control-label">Địa chỉ công ty:</label>
								   				<div class="col-sm-8">
								   					{{ Form::text('company_address', null, array('class'=>'form-control')) }}
								   				</div>
								   			</div>
								   			<div class="form-group">
								   				<label for="input" class="col-sm-4 control-label">Tên người liên hệ:</label>
								   				<div class="col-sm-8">
								   					{{ Form::text('contact_name', null, array('class'=>'form-control')) }}
								   				</div>
								   			</div>
											<div class="form-group">
								   				<div class="checkbox">
								   					{{ Form::checkbox('dieukhoan', 1, 1, array('id'=>'checkbox1', 'class'=>'vnjob-checkbox')) }}
								   					
								   					<label for="checkbox1">
								   						<span></span>
								   						<i class="text-required">*</i> Tôi đã đọc và đồng ý với các <a href="#">Quy định bảo mật</a> và <a href="#">Quy định sử dụng</a>
								   					</label>
								   				</div>
								   			</div>

								   			<div class="clearfix"></div>
								   			<div class="">
								   				{{ Form::button('ĐĂNG KÝ NGAY', array('type'=>'submit', 'class'=>'btn btn-register btn-block btn-primary')) }}
								   			</div>
								   		
								   			
								   		{{ Form::close() }}
								   </div>
								</div>
							</div>
						</div>
@stop

@section('style')
	{{ HTML::style('assets/ntd/css/register.css') }}
@stop