@extends('layouts.employer')
@section('title') Đăng nhập @stop
@section('content')
	<div class="col-xs-12 main-content login-form">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="heading-title">
										<span>Đăng nhập</span>
									</div>
								</div>
								<div class="panel-body">
								   <div class="col-xs-7 col-xs-offset-5 form-input">
								   		{{ Form::open(array('method'=>'POST', 'route'=>'employers.login')) }}
								   			
								   			<h3 class="form-legend">Tìm kiếm và tuyển dụng nhân tài 
								   			<br>cho doanh nghiệp bạn ngay bây giờ</h3>
								   			@include('includes.notifications')
								   			<div class="form-group">
								   				<label for="">Tên truy cập/Địa chỉ Email</label>
								   				{{ Form::text('email', null, array('class'=>'form-control') ) }}
								   			</div>
								   			<div class="form-group">
								   				<label for="">Mật khẩu</label>
								   				{{ Form::password('password', array('class'=>'form-control') ) }}
								   			</div>
								   			<div class="form-group pull-right">
								   				<div class="">
								   					{{ HTML::link(URL::route('employers.register'), 'Bạn chưa có tài khoản ?') }} / {{ HTML::link('#', 'Quên mật khẩu ?') }}
								   				</div>
								   			</div>
								   			<div class="clearfix"></div>
								   			<div class="form-group pull-right">
								   				{{ Form::button('Đăng nhập', array('type'=>'submit', 'class'=>'btn btn-primary btn-login' )) }}
							
								   			</div>
								   		{{ Form::close() }}
								   </div>
								</div>
							</div>
						</div>
@stop

@section('style')
	{{ HTML::style('assets/ntd/css/login.css') }}
@stop