@extends('layouts.jobseeker')
@section('content')
	<section class="main-content container">
		<div class="reset-password push-top">
			<h2>Tạo mật khẩu mới</h2>
			@include('includes.notifications')
			{{Form::open(array('route'=>array('jobseekers.reset-password', $email, $code), 'class'=>'form-horizontal','method'=>'POST'))}}
				<div class="form-group">
					<label for="input" class="col-sm-2 control-label">Mật khẩu mới<abbr>*</abbr></label>
					<div class="col-sm-4">
						{{ Form::input('password', 'password',null, array('class'=>'form-control', 'id'=>'password') ) }}
					</div>
				</div>
				<div class="form-group">
					<label for="input" class="col-sm-2 control-label">Nhập lại mật khẩu<abbr>*</abbr></label>
					<div class="col-sm-4">
						{{ Form::input('password', 'password_confirmation',null, array('class'=>'form-control', 'id'=>'password_confirmation') ) }}
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-7">
							{{ Form::submit('Lưu', array('class'=>'btn bg-orange')) }}
					</div>
				</div>
			{{Form::close()}}
		</div>
	</section>
@stop