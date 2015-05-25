@extends('layouts.jobseeker')
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<?php var_dump($slug);?>
	<section class="main-content container login-form">
	<div class="col-sm-5">
		<h2 class="push-bottom">Đăng nhập để xem chi tiết...</h2>
		<p><strong><i class="fa fa-home"></i> Truy cập hàng ngàn công việc</strong></p>
		<p class="push-bottom">Xem trên 3.000 việc làm mới hàng tháng và nộp hồ sơ trực tuyến ngay !</p>
		<p><strong><i class="fa fa-envelope"></i> Việc tìm bạn</strong></p>
		<p class="push-bottom">Tạo Thông Báo Việc Làm để nhận được nhiều việc làm phù hợp bằng email</p>
		<p><strong><i class="fa fa-support"></i> Tư vấn nghề nghiệp</strong></p>
		<p class="push-bottom">Trang Quản Lý Nghề Nghiệp sẽ giúp bạn viết hồ sơ xin việc và phỏng vấn thành công.</p>
	</div>
	<div class="col-sm-6 pull-right">
		<h2 class="text-orange">Đăng Nhập</h2>
		<p><span class="fa-stack fa-sm">
	        <i class="fa fa-circle fa-stack-2x text-blue"></i>
	        <i class="fa fa-user fa-stack-1x text-white"></i>
	    </span><strong class="h2">Người tìm việc</strong></p>
	    @include('includes.notifications')
	    {{ Form::open( array('route'=>array('jobseekers.login'), 'class'=>'form', 'method'=>'POST') ) }}
	    	<div class="form-group">
	    		<label for="">Email<abbr>(*)</abbr></label>
	    		{{Form::input('email','email',null, array('class'=>'form-control', 'id'=>'email', 'required'))}}
	    	</div>
	    	<div class="form-group">
	    		<label for="">Mật khẩu<abbr>(*)</abbr></label>
	    		{{Form::input('password','password',null, array('class'=>'form-control', 'id'=>'password', 'required'))}}
	    	</div>
	    	<div class="form-group push-bottom">
		   	{{Form::submit('Đăng nhập', array('class'=>'btn btn-lg bg-orange'))}}
		   	<i class="fa fa-arrow-circle-o-right fa-1x"></i> <a href="{{URL::route('forgot-password')}}" class="text-blue italic">Quên mật khẩu</a>
		   	</div>
	    {{ Form::close() }}
	    <p  class="push-top"> <a href="{{URL::route('jobseekers.register')}}" class="btn btn-lg bg-gray-light">Đăng ký ngay</a></p>
	</div>
</section>

@stop