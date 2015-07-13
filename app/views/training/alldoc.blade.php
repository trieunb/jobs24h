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
    						?>
			 				<li class='wow bounceInUp'>
			 					<div class="date-book">{{$date}}</div>
			 					{{HTML::image('uploads/training/'.$doc['thumbnail'])}}
			 					 
			 					<h2>{{$doc['title']}}</h2>
			 					<span>By {{$doc['author']}}</span>
			 					<p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : {{$doc['view']}}</p>
			 					<p><i class="glyphicon glyphicon-save"></i> Download : {{$doc['download']}}</p>
			 					<a href="{{URL::route('trainings.detaildoc',array($doc['id']))}}"><button class="btn btn-default more-book">Xem thêm</button></a>
			 				</li>
			 				@endforeach
			 				 
		 				</ul>	
    											
    					</div>
    					<div role="tabpanel" class="tab-pane" id="profile">
    					<ul>
    						@foreach($document[1] as $doc)
    						<?php $create=explode(" ", $doc['created_at']);
    						$date= date("d-m-Y", strtotime($create[0]));
    						?>
			 				<li class='wow bounceInDown'>
			 					<div class="date-book">{{$date}}</div>
			 					{{HTML::image($doc['thumbnail'])}}
			 					 
			 					<h2>{{$doc['title']}}</h2>
			 					<span>By {{$doc['author']}}</span>
			 					<p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : {{$doc['view']}}</p>
			 					<p><i class="glyphicon glyphicon-save"></i> Download : {{$doc['download']}}</p>
			 					<a href="{{URL::route('trainings.detaildoc',array($doc['id']))}}"><div class="btn btn-default more-book">Xem thêm</div></a>
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
			</script>

@stop