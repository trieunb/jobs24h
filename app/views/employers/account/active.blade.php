@extends('layouts.employer')
@section('title') Quản lý user @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
		<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Bạn đã kích hoạt thành công, vui lòng nhấn <a style="color: #FF6767;" href="{{URL::route('employers.login')}}">vào đây</a> để đăng nhập.		
	</div>
		
		 
	</section>
@stop