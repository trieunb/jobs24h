@extends('layouts.employer')
@section('title') Chỉnh sửa thư trả lời tự động @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.accounttask_navbar')
			</aside>

			<section id="content" class="pull-right right">
				<div class="boxed">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/icon-logs-lg.png') }} Chỉnh sửa mới thư </h2>
					</div>
					<form action="" method="POST" class="form-horizontal" role="form">
					@include('includes.notifications')
						<div class="form-group">
							<label for="inputSubject" class="col-sm-2 control-label">Tiêu đề thư:</label>
							<div class="col-sm-10">
								{{ Form::text('subject', $letter->subject, ['required']) }}
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Nội dung:</label>
							<div class="col-sm-10">
								<div class="row">
									<div class="col-xs-4">
										<select name="" id="select-append" class="form-control">
											<option value="0">Chọn</option>
											<option value="[firstname]">[firstname]</option>
											<option value="[lastname]">[lastname]</option>
											<option value="[contact-name]">[contact-name]</option>
										</select>
									</div>
									<div class="col-xs-8">
										<div class="align-middle">Trường thông minh</div>
									</div>
								</div>
								
								{{ Form::textarea('content', $letter->content, ['required', 'id'=>'letter-content']) }}
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Loại:</label>
							<div class="col-sm-2">
								{{ Form::select('type', [1=>'Cá nhân', 2=>'Dùng chung'], $letter->type) }}
							</div>
						</div>
					
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-lg bg-orange">Lưu thay đổi</button>
							</div>
						</div>
					</form>
					
				</div>		
			</section>
@stop

@section('script')
	<script>
		$('#select-append').change(function(event) {
			var txt = $(this).val();
			$('#letter-content').val($('#letter-content').val() + txt);
			$(this).val(0);
			$('#letter-content').focus();
		});
	</script>
@stop