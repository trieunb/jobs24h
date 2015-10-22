@extends('layouts.training')
@section('title') Tài liệu - Đào tạo - VnJobs @stop
@section('header')
@include('includes.trainings.header-chitiet')


@stop
@section('content')
			<div class="container">
				 

		 		 
		 	
		 		 

		 		<div class="main3">
				 	<script>
					 	$('#myTabs a').click(function (e) 
					 	{
						e.preventDefault()
						$(this).tab('show')
						});
					</script>
		 			<div id="myTabs" role="tablist">
				      <div role="presentation" class="active"><a href="#home" class="btn tl1" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Tài liệu mới</a></div>
				      <div role="presentation"><a class="btn tl2" href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Tài liệu tải nhiều</a></div>
		
				    </div>
				    <div class="clearfix"></div>
		 			
		 			<h3>Một số khóa học mà chúng tôi sắp khai giảng. Đăng ký ngay để có nhiều kỹ năng cho mình nhé!</h3> 

		 			<div class="tab-content">
    					<div role="tabpanel" class="tab-pane active" id="home">
    					<ul>
    						@foreach($document[0] as $doc)
    						<?php $create=explode(" ", $doc['created_at']);
    						$date= date("d-m-Y", strtotime($create[0]));
    						 $str1 = trim(mb_strtolower($doc['title']));
							    $str1 = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str1);
							    $str1 = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str1);
							    $str1 = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str1);
							    $str1 = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str1);
							    $str1 = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str1);
							    $str1 = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str1);
							    $str1 = preg_replace('/(đ)/', 'd', $str1);
							    $str1 = preg_replace('/[^a-z0-9-\s]/', '', $str1);
							    $str1 = preg_replace('/([\s]+)/', '-', $str1);
    						?>
			 				<li class='wow bounceInUp'>
			 					<div class="date-book">{{$date}}</div>
			 					{{HTML::image(URL::to('uploads/training/'.$doc['thumbnail'].''))}}
			 					 
			 					<h2>{{$doc['title']}}</h2>
			 					<span>By {{$doc['author']}}</span>
			 					<div class="cleafix"></div>
			 					<div class="col-md-6">
				 					<p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : {{$doc['view']}}</p>
				 					<p><i class="glyphicon glyphicon-save"></i> Download : {{$doc['download']}}</p>
			 					</div>
			 					<div class="col-md-6">
			 						<a href="{{URL::route('trainings.detaildoc',array($doc['id']))}}/{{$str1}}"><button class="btn btn-default more-book">Xem thêm</button></a>
			 					</div>
			 				</li>
			 				@endforeach
			 				 
		 				</ul>	
    											
    					</div>
    					<div role="tabpanel" class="tab-pane" id="profile">
    					<ul>
    						@foreach($document[1] as $doc)
    						<?php $create=explode(" ", $doc['created_at']);
    						$date= date("d-m-Y", strtotime($create[0]));
    						 $str1 = trim(mb_strtolower($doc['title']));
							    $str1 = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str1);
							    $str1 = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str1);
							    $str1 = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str1);
							    $str1 = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str1);
							    $str1 = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str1);
							    $str1 = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str1);
							    $str1 = preg_replace('/(đ)/', 'd', $str1);
							    $str1 = preg_replace('/[^a-z0-9-\s]/', '', $str1);
							    $str1 = preg_replace('/([\s]+)/', '-', $str1);
    						?>
			 				<li class='wow bounceInDown'>
			 					<div class="date-book">{{$date}}</div>
			 					{{HTML::image(URL::to('uploads/training/'.$doc['thumbnail'].''))}}
			 					 
			 					<h2>{{$doc['title']}}</h2>
			 					<span>By {{$doc['author']}}</span>
			 					<div class="clearfix"></div>
			 					<div class="col-md-6">
				 					<p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : {{$doc['view']}}</p>
				 					<p><i class="glyphicon glyphicon-save"></i> Download : {{$doc['download']}}</p>
			 					</div>
			 					<div class="col-md-6">
			 						<a href="{{URL::route('trainings.detaildoc',array($doc['id']))}}/{{$str1}}"><div class="btn btn-default more-book">Xem thêm</div></a>
			 					</div>
			 				</li>
			 				@endforeach
			 				 
		 				</ul>	
    					</div>
     
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
			  $(document).ready(function($) {

			 	$('#profile-tab').click(function(event) {
			 		 $('#profile-tab').removeClass("btn tl2").addClass("btn tl1");
			 		 $('#home-tab').removeClass("btn tl1").addClass("btn tl2");
			 	});
			 	$('#home-tab').click(function(event) {
			 		 $('#profile-tab').removeClass("btn tl1").addClass("btn tl2");
			 		 $('#home-tab').removeClass("btn tl2").addClass("btn tl1");
			 	});


			 });
			</script>

@stop