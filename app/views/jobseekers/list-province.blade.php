@extends('layouts.jobseeker')
@section('title') Địa điểm hấp dẫn @stop
@section('content')
	@include('includes.jobseekers.search')
	<section class="main-content container">
		<section id="content" class="col-sm-9">
			<div class="boxed list-province">
				<div class="header-title">
					<h2>Việc làm theo Địa điểm</h2>
				</div>
					<ul class="arrow-square-orange">
					@foreach ($widget_province_hot as $key => $province)
						<li class="col-sm-4"><p><a href="{{URL::route('jobseekers.search-job', array('province[]'=>$province->id))}}">{{$province->province_name}} <span class="text-orange">({{$province->mtprovince->count()}})</span></a></p></li>
					@endforeach
					</ul>
			</div>
		</section>
		<aside id="sidebar" class="col-sm-3 pull-right">
			@include('includes.jobseekers.widget.categories-hot')
			@include('includes.jobseekers.widget.browse-jobs-by-level')
			@include('includes.jobseekers.widget.browse-jobs-by-object')	
		</aside>
	</section>
@stop
