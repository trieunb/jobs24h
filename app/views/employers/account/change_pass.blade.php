@extends('layouts.employer')
@section('title') Đổi mật khẩu @stop
@section('content')
	<section class="main-content">
		<div class="panel panel-default panel-sm">
			<div class="panel-heading">
			<div class="heading-form">
				<h2>Thay đổi mật khẩu</h2>
				<span class="pull-right">(<span class="text-red">*</span>) Thông tin bắt buộc</span>
			</div>
			</div>
			<div class="panel-body">
				<form action="" method="POST" role="form" class="form-horizontal">
					@include('includes.notifications')
					<div class="form-group">
						<label for="input" class="col-sm-4 control-label">Email truy cập hiện tại:</label>
						<div class="col-sm-7">
							<label class="control-label">{{ $user->email }}</label>
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-4 control-label"><abbr>*</abbr>Nhập mật khẩu hiện tại:</label>
						<div class="col-sm-7">
							{{ Form::password('oldpass', ['class'=>'form-control', 'required']) }}
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-4 control-label"><abbr>*</abbr>Nhập mật khẩu mới:</label>
						<div class="col-sm-7">
							{{ Form::password('password', ['class'=>'form-control', 'required']) }}
						</div>
						<div class="col-sm-1">
							<abbr class="question" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom"><i class="fa fa-question "></i></abbr>
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-4 control-label"><abbr>*</abbr>Nhập lại khẩu mới:</label>
						<div class="col-sm-7">
							{{ Form::password('password_confirmation', ['class'=>'form-control', 'required']) }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">
							{{ HTML::image(Captcha::img(), 'Captcha', ['class'=>'captcha', 'title'=>'Click để lấy chuỗi mới']) }}
						</div>
					</div>
					<div class="form-group">
						
						<label for="input" class="col-sm-4 control-label"><abbr>*</abbr>Mã bảo vệ:</label>
						<div class="col-sm-7">
							{{ Form::text('captcha') }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">
							<button type="submit" class="btn btn-lg bg-blue">LƯU</button>
							<button type="button" id="btn-huy" class="btn btn-lg bg-blue">HỦY</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
@stop
@section('style')
	<style type="text/css">
	.captcha:hover {
		cursor: pointer;
	}
	</style>
@stop
@section('script')
	<script type="text/javascript">
	$('#btn-huy').click(function(event) {
		$('input').each(function(index, el) {
			$(this).val('');
		});
	});
	$('.captcha').click(function(event) {
		$(this).attr({
			src: '{{ URL::to('captcha') }}?t='+Math.random()
		});
	});
	</script>
@stop