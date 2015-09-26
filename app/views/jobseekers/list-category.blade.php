@extends('layouts.jobseeker')
@section('title') Ngành nghề hấp dẫn @stop
@section('content')
	@include('includes.jobseekers.search')
	<section class="main-content container">
		<section id="content" class="col-sm-9">
			<div class="boxed list-category">
				<div class="header-title">
					<h2>Việc làm theo ngành nghề</h2>
				</div>
				@if(count($list_category))
					<div class="col-sm-4">
					@foreach ($list_category as $key => $cate)
						@if($key < 4)
						<div class="groupJob">
						<h3 class="text-blue">{{$cate['parent']}}</h3>
						@foreach ($cate['child'] as $id => $cate_child)
							<?php 
								$count = CVCategory::where('cat_id', '=',$cate_child->id)->where('job_id', '>',0 )->whereHas('job', function ($q1) {
									$q1->where('is_display', 1)/*->where('hannop', '>=' , date('Y-m-d'))*/->where('status',1);
								})->count(); 
							?>
							<p class="text-orange"><i class="fa fa-square"></i><a href="{{URL::route('jobseekers.get-category', array('id'=>$cate_child->id))}}">{{$cate_child->cat_name}} <span class="text-orange">({{$count}})</span></a></p>
						@endforeach	
						</div>
						@endif
					@endforeach
					</div>
					<div class="col-sm-4">
					@foreach ($list_category as $key => $cate)
						@if($key > 4 && $key < 10)
						<div class="groupJob">
						<h3 class="text-blue">{{$cate['parent']}}</h3>
						@foreach ($cate['child'] as $id => $cate_child)
							<?php 
								$count = CVCategory::where('cat_id', '=',$cate_child->id)->where('job_id', '>',0 )->whereHas('job', function ($q1) {
									$q1->where('is_display', 1)/*->where('hannop', '>=' , date('Y-m-d'))*/->where('status',1);
								})->count(); 
							?>
							<p class="text-orange"><i class="fa fa-square"></i><a href="{{URL::route('jobseekers.get-category', array('id'=>$cate_child->id))}}">{{$cate_child->cat_name}} <span class="text-orange">({{$count}})</span></a></p>
						@endforeach	
						</div>
						@endif
					@endforeach
					</div>
					<div class="col-sm-4">
					@foreach ($list_category as $key => $cate)
						@if($key > 10 && $key < 15)
						<div class="groupJob">
						<h3 class="text-blue">{{$cate['parent']}}</h3>
						@foreach ($cate['child'] as $id => $cate_child)
							<?php 
								$count = CVCategory::where('cat_id', '=',$cate_child->id)->where('job_id', '>',0 )->whereHas('job', function ($q1) {
									$q1->where('is_display', 1)/*->where('hannop', '>=' , date('Y-m-d'))*/->where('status',1);
								})->count(); 
							?>
							<p class="text-orange"><i class="fa fa-square"></i><a href="{{URL::route('jobseekers.get-category', array('id'=>$cate_child->id))}}">{{$cate_child->cat_name}} <span class="text-orange">({{$count}})</span></a></p>
						@endforeach	
						</div>
						@endif
					@endforeach
					</div>
				@endif
			</div>
		</section>
		<aside id="sidebar" class="col-sm-3 pull-right">
			@include('includes.jobseekers.widget.categories-hot')
			@include('includes.jobseekers.widget.browse-jobs-by-level')
			@include('includes.jobseekers.widget.browse-jobs-by-object')	
		</aside>
	</section>
@stop
