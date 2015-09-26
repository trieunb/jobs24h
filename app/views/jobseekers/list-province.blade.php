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
						<?php 
								$count = WorkLocation::where('province_id', '=',$province->id)->where('job_id', '>',0 )->whereHas('job', function ($q1) {
									$q1->where('is_display', 1)/*->where('hannop', '>=' , date('Y-m-d'))*/->where('status',1);
								})->count(); 
							?>
						<li class="col-sm-4"><p><a href="{{URL::route('jobseekers.search-job', array('province[]'=>$province->id))}}">{{$province->province_name}} <span class="text-orange">({{$count}})</span></a></p></li>
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
