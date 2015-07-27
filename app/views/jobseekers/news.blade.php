@extends('layouts.jobseeker')
@section('title') Tin tức @stop
@section('title_fb'){{$new->title}}@stop
@section('desc_fb'){{strip_tags($new->content)}}@stop
@if($new->thumbnail != '')
	@section('img_fb'){{URL::to("uploads/news/".$new->thumbnail."")}}@stop
@else
	@section('img_fb'){{URL::asset('assets/images/vnjobs_social.jpg')}}@stop
@endif
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
					</div>
					<div class="meta-jobs">
						<div class="single-post-meta">
							Đăng ngày: {{date('d-m-Y', strtotime($new->updated_at))}}
						</div> 
						<div class="pull-right">
							<div style="margin: 5px 10px 0px 0; float:left;">
								<div class="fb-like" data-href="{{URL::route('news.view', array($new->id))}}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true">
								</div>
							</div>
							<div style="margin: 5px 10px 0px 0; float:left;">
								<script src="https://apis.google.com/js/plusone.js"></script><g:plus action="share" annotation="bubble"></g:plus>
							</div>
						</div>
					</div>
					<div class="entry">
						{{nl2br($new->content)}}
					</div>
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
