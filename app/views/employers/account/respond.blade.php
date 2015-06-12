@extends('layouts.employer')
@section('title') Thư phản hồi ứng viên @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="container">
			<aside id="sidebar" class="col-sm-3">
				@include('includes.employers.accounttask_navbar')
			</aside>

			<section id="content" class="pull-right right">
				<div class="boxed">
					<div class="heading-image">
						<h2 class="text-blue">{{ HTML::image('assets/ntd/images/icon-logs-lg.png') }} Danh sách thư thông báo đã tạo</h2>
					</div>
					<div class="filter">
						<label>Quý khách tạo và sử dụng email mẫu để tiết kiệm thời gian liên lạc với ứng viên!
						</label>
					</div>
					
					
				</div>		
			</section>
@stop