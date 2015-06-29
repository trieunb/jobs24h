@extends('layouts.training')
@section('title') Tin tức - Đào tạo - VnJobs @stop
@section('header')
@include('includes.trainings.header-chitiet')


@stop
@section('content')
			<div class="container">
				 

		 		 
		 	
		 		 
				<div class="main2">
		 			<h2>Tin tức</h2>
		 			
		 			<ul>

		 				@foreach($post as $tr)

		 				<li class="wow bounceInLeft" data-wow-duration="0.3s">
		 					<?php preg_match('/<img[^>]+>/i',$tr['content'], $image); 
		 					 ?>
		 					 @if($tr['thumbnail']==null)
		 					 {{$image[0]}}
		 					 @else
		 					 {{HTML::image($tr['thumbnail'])}}
		 					 @endif
		 					
		 					<?php $create=explode(" ", $tr['created_at']);
              			 		$date= date("d-m-Y", strtotime($create[0]));
              				?>

		 					
		 					<h2><a href="{{URL::route('trainings.detailpost',array($tr['id']))}}">{{$tr['title']}}</a></h2>
		 					 
		 					<h3>{{$date}}</h3>
						 
		 				</li>

		 				@endforeach
		 				
		 			</ul>
		 			 <div class="clearfix"></div>
		 		</div>
		 			
				
		 			
		 		</div>
		 		


		 	
		 	
		 		


		 		
		 		
		 	 
		 	<script>
		 	$(function () {
  			$('[data-toggle="tooltip"]').tooltip()
			})
			</script>
			<script>
			 new WOW().init();
			</script>

@stop