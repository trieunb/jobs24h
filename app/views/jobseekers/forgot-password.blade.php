@extends('layouts.jobseeker')
@section('content')
	<section class="main-content container">
		<div class="forgot-password push-top">
			<h2>Quên mật khẩu</h2>
			@include('includes.notifications')
			<p class="text-gray-light">Vui lòng nhập email bạn đã đăng ký.<br>Chúng tôi sẽ gửi cho bạn các hướng dẫn về cách làm thế nào để thiết lập lại mật khẩu của bạn</p>
			{{Form::open(array('route'=>array('forgot-password', null), 'class'=>'form-horizontal','method'=>'POST'))}}
				<div class="form-group">
					<label for="input" class="col-sm-1 control-label">Email<abbr>*</abbr></label>
					<div class="col-sm-4">
						{{ Form::input('email', 'email',null, array('class'=>'form-control', 'id'=>'email') ) }}
					</div>
					<div class="col-sm-2">
						{{ Form::submit('Gởi', array('class'=>'btn bg-orange')) }}
					</div>
				</div>
			{{Form::close()}}
		</div>
	</section>
@stop