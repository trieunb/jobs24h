@extends('layouts.training')
@section('title') Khóa học Đào tạo - VnJobs @stop
@section('header')
@include('includes.trainings.header-chitiet')


@stop
@section('content')
			<div class="container">
				 

		 		 
		 	
		 		 
				<div class="main2">
		 			<h2>Tất cả các khóa học</h2>
		 			<h3>Một số khóa học mà chúng tôi sắp khai giảng. Đăng ký ngay để có nhiều kỹ năng cho mình nhé!</h3>
		 			<ul>

		 				@foreach($training as $tr)
		 				<li class="wow bounceInLeft" data-wow-duration="0.3s">
		 					<?php preg_match('/<img[^>]+>/i',$tr['content'], $image); 
		 					 ?>
		 					 @if($tr['thumbnail']==null)
		 					 {{$image[0]}}
		 					 @else
		 					 {{HTML::image(URL::to('uploads/training/'.$tr['thumbnail'].''))}}
		 					 @endif
		 					
		 					<h2><a href="{{URL::route('trainings.detailcouser',array($tr['id']))}}">{{$tr['title']}}</a></h2>
		 					<h3>Thời lượng : {{$tr['time_day']}} buổi <br> Học phí {{$tr['fee']}}</h3>

		 				</li>

		 				@endforeach
		 				
		 			</ul>
		 			 
		 		</div>
		 			

		 			<div class="clearfix"></div>
		 		</div>
		 		


		 	
		 	
		 		


		 		
		 		
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