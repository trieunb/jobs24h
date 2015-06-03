@extends('layouts.employer')
@section('title') Bảng giá dịch vụ @stop
@section('content')
<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.order_navbar')
			</aside>
			
			<section id="content" class="pull-right right">
				<div class="box">
				<div class="heading-image">
					<h2 class="text-blue">{{ HTML::image('assets/ntd/images/cart-lg.png') }}Liên hệ mua dịch vụ</h2>
				</div>
				<div class="service-price">
					<form action="" method="POST" class="form-horizontal" role="form">
						@include('includes.notifications')
						<div class="form-group">
							<label for="inputFull_name" class="col-sm-2 control-label">Họ tên:</label>
							<div class="col-sm-10">
								{{ Form::text('full_name', null, ['required']) }}
							</div>
						</div>
						<div class="form-group">
							<label for="inputPhone" class="col-sm-2 control-label">Điện thoại:</label>
							<div class="col-sm-10">
								{{ Form::text('phone', null, ['required']) }}
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-sm-2 control-label">Email:</label>
							<div class="col-sm-10">
								{{ Form::text('email', null, ['required']) }}
							</div>
						</div>
						<div class="form-group">
							<label for="inputCompany_name" class="col-sm-2 control-label">Tên công ty:</label>
							<div class="col-sm-10">
								{{ Form::text('company', null, ['required']) }}
							</div>
						</div>
						<div class="form-group">
							<label for="inputAddress" class="col-sm-2 control-label">Địa chỉ:</label>
							<div class="col-sm-10">
								{{ Form::select('province_id', Province::lists('province_name', 'id') ) }}
							</div>
						</div>
						<div class="form-group">
							<label for="inputSan_pham" class="col-sm-2 control-label">Sản phẩm:</label>
							<div class="col-sm-10">
								{{ Form::select('service_id', $services, $service_id ) }}
							</div>
						</div>
						<div class="form-group">
							<label for="textareaNoi_dung" class="col-sm-2 control-label">Nội dung:</label>
							<div class="col-sm-10">
								{{ Form::textarea('content', null, ['rows'=>'10']) }}
								
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-primary">Gửi đi</button>
								<button type="reset" id="reset" class="btn btn-danger">Làm lại</button>
							</div>
						</div>
						</form>	
				</div>
				</div>
			</section>
		</div>
	</section>
@stop
