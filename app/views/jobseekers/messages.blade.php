@extends('layouts.jobseeker')
@section('title') Quản lý tin nhắn @stop
@section('content')
	<div class="container">
			@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<div class="boxed">
			<div class="rows">
				<h3>Trang đang phát triển...Xin vui lòng quay lại sau.</h3>
				<!-- <div class="title-page">
					<h2>Thư mời phỏng vấn</h2>
				</div>
				<i class="fa fa-envelope-o fa-fw"></i>&nbsp;<a href="#" class="text-blue">(0) Lịch phỏng vấn</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-envelope-o fa-fw"></i>&nbsp;<a href="#">(0) Tất cả thư mời phỏng vấn (trong 6 tháng qua)</a> -->
			</div>
		</div>
		<div class="boxed">
			<div class="rows">
				@include('includes.jobseekers.widget.suggested-jobs')
			</div>
		</div>
	</section>
@stop

