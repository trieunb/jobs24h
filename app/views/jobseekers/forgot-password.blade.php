@extends('layouts.jobseeker')
@section('title') Quên mật khẩu - VnJobs @stop
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container">
		<div class="forgot-password push-top">
			<div class="col-sm-5">
				{{HTML::image('assets/images/quen-mat-khau.png')}}
			</div>
			<div class="col-sm-6 pull-right">
				<h2 class="text-orange">Quên mật khẩu</h2>
				@include('includes.notifications')
				<p class="text-gray-light">Vui lòng nhập email bạn đã đăng ký tài khoản trên VnJobs.vn
<br>Chúng tôi sẽ gửi email hướng dẫn bạn tạo mật khẩu mới</p>
				{{Form::open(array('route'=>array('forgot-password', null),'method'=>'POST'))}}
					<div class="form-group">
						<label for="input" class="control-label">Email truy cập<abbr>*</abbr></label>
						{{ Form::input('email', 'email',null, array('class'=>'form-control', 'id'=>'email') ) }}
						<div class="push-top">
							{{ Form::submit('Gửi', array('class'=>'btn bg-orange btn-lg')) }}
						</div>
					</div>
				{{Form::close()}}
				<div class="clearfix push-top"></div>
				<p>Nếu bạn cần trợ giúp, vui lòng <a href="#" class="decoration">xem hướng dẫn</a> hoặc <a href="#" class="decoration">liên hệ</a> với chúng tôi</p>
			</div>
		</div>
	</section>
@stop