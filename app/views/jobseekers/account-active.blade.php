@extends('layouts.jobseeker')
@section('title') Kích hoạt tài khoản @stop
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container">
	@include('includes.notifications')
	</section>
@stop