@extends('layouts.jobseeker')
@section('title') Ngành nghề hấp dẫn - VnJobs @stop
@section('content')
	@include('includes.jobseekers.search')
	<section class="main-content container">
		<section id="content" class="col-sm-9">
			<div class="boxed list-category">
				<div class="header-title">
					<h2>Việc làm theo ngành nghề</h2>
				</div>
				@if(count($list_category))
					@foreach ($list_category as $key => $cate)
						<div class="col-sm-4">
						<h3 class="text-blue">{{$key}}</h3>
						@foreach ($cate as $id => $child)
							<p class="text-orange"><i class="fa fa-square"></i><a href="{{URL::route('jobseekers.get-category', array('id'=>$child->id))}}">{{$child->cat_name}} <span class="text-orange">({{$child->mtcategory->count()}})</span></a></p>@endforeach	
						</div>
					@endforeach
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
