@extends('layouts.employer')
@section('title') Quản lý user @stop
@section('content')
	<section class="boxed-content-wrapper clearfix">
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Link không tồn tại, click vào <a href="{{URL::route('employers.forget')}}">đây</a> để thay đổi lại mật khẩu. 
	</div>
	</section>
@stop