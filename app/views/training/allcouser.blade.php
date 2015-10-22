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
		 					<div class="img1">	
		 					<?php preg_match('/<img[^>]+>/i',$tr['content'], $image); 
		 					 ?>
		 					 @if($tr['thumbnail']==null)
		 					 {{$image[0]}}
		 					 @else
		 					 {{HTML::image(URL::to('uploads/training/'.$tr['thumbnail'].''))}}
		 					 @endif
		 					</div>
		 					<?php 
		 					  
							    $str = trim(mb_strtolower($tr['title']));
							    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
							    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
							    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
							    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
							    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
							    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
							    $str = preg_replace('/(đ)/', 'd', $str);
							    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
							    $str = preg_replace('/([\s]+)/', '-', $str);
							     
							   
		 					  ?>
		 					<h2><a href="{{URL::route('trainings.detailcouser',array($tr['id']))}}/{{ $str}}">{{$tr['title']}}</a></h2>
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
			<style type="text/css">
			.img1 {
				    height: 200px;
				    overflow: hidden;
					}
</style>

@stop