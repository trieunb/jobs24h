@extends('layouts.employer')
@section('title') Chỉnh sửa thông tin người dùng @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.accounttask_navbar')
			</aside>

			<section id="content" class="pull-right right">
				<div class="boxed">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/icon-information-lg.png') }} Chỉnh sửa thông tin liên hệ</h2>
					</div>
					@include('includes.notifications')
					<div class="heading-title">
						<span>Thông tin liên hệ</span>
					</div>
					<form action="{{ URL::route('employers.account.userinformation') }}" method="POST" class="form-horizontal" role="form">
					
					<div class="form-group">
						<label for="input1" class="col-sm-2 control-label">Họ Tên:</label>
						<div class="col-sm-7">
							{{ Form::text('full_name', $user->full_name ) }}
						</div>
						<div class="col-sm-3 align-middle">
							Tối thiểu 3 ký tự
						</div>
					</div>
					<div class="form-group">
						<label for="input2" class="col-sm-2 control-label">Chức vụ:</label>
						<div class="col-sm-7">
							{{ Form::text('position', $user->position) }}
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-2 control-label">Email liên hệ:</label>
						<div class="col-sm-7">
							{{ Form::email('email', $user->email) }}
						</div>
					</div>
					<div class="heading-title">
						<span>Địa chỉ liên hệ</span>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-2 control-label">Địa chỉ:</label>
						<div class="col-sm-10">
							{{ Form::text('address', $user->address ) }}
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-2 control-label">Quốc gia:</label>
						<div class="col-sm-4">
							{{ Form::select('country_id', Country::lists('country_name', 'id'), $user->country_id) }}
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-2 control-label">Tỉnh/TP:</label>
						<div class="col-sm-4">
							{{ Form::select('province_id', Province::lists('province_name', 'id') , $user->province_id) }}
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-2 control-label">Điện thoại:</label>
						<div class="col-sm-3">
							{{ Form::text('phone_number', $user->phone_number) }}
						</div>
						<div class="col-sm-2 align-center ">
							ĐTDD
						</div>
						<div class="col-sm-3">
							{{ Form::text('tel', $user->tel) }}
						</div>
					</div>
					<div class="form-group">
						<label for="input" class="col-sm-2 control-label">Fax:</label>
						<div class="col-sm-3">
							{{ Form::text('fax', $user->fax) }}
						</div>
						<div class="col-sm-2 align-center ">
							Mã số thuế
						</div>
						<div class="col-sm-3">
							{{ Form::text('tax_number', $user->tax_number) }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<div class="checkbox">
								<label>
									{{ Form::hidden('subscribe', 0) }}
									{{ Form::checkbox('subscribe', 1, $user->subscribe) }}
									<strong>Nhận bản tin dành cho Nhà tuyển dụng và Thông báo ứng viên phù hợp</strong>
								</label>
							</div>
						Thông tin khuyến mãi dịch vụ, chương trình chăm sóc khách hàng... và thông báo có ứng viên phù hợp với yêu cầu công việc)
						</div>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-lg bg-orange">Lưu lại</button>	
					</div>
					
				
					{{ Form::close() }}
				</div>		
			</section>
@stop