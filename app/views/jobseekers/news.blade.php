@extends('layouts.jobseeker')
@section('title') Tin tức @stop
@section('content')
	<div class="container">
		@include('includes.jobseekers.breadcrumb')
	</div>
	<section class="main-content container single-post">
		<section id="content" class="col-sm-9">
			@if(count($new))
			<div class="boxed">
				<div class="details">
					<div class="top">
						<h1>{{$new->title}}</h1>	
						<p>Đăng ngày: {{date('d/m/Y', strtotime($new->updated_at))}}</p>
					</div>
					{{$new->content}}
				</div>
			</div>
			@else
			<div class="boxed">
				<div class="details">
					<div class="top">
						<h1>Bài viết không tồn tại</h1>	
					</div>
				</div>
			</div>
			@endif
			<div class="boxed related-jobs">
				<div class="rows">
				<div class="title-page">
					<h2>Bài liên quan:</h2>
				</div>
				<ul class="arrow-square-orange">
					@if(count($related))
						@foreach($related as $val)
						<li><a href="{{URL::route('news.view', array($val->id))}}">{{$val->title}}</a></li>
						@endforeach
					@endif
					</ul>
				</div>
			</div>
		</section>
		<aside id="sidebar" class="col-sm-3 pull-right">
				@include('includes.jobseekers.widget.right-suggested-jobs')
		</aside>

	</section>
@stop
