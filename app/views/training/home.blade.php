@extends('layouts.training')
@section('title') Trang chủ Đào tạo - VnJobs @stop
@section('header')
<header id="header">
		<div class="container">
			<div class="col-md-3 column logo">
			<a href="{{URL::to('/')}}">
			{{HTML::image('training/assets/img/logo.png')}}
			 
			</a>
			</div>
			<div class="col-md-9 column menu">


				<nav class="navbar navbar-default" role="navigation">
					 
					
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li>
								<a href="{{URL::route('cungunglaodong.home')}}">Cung ứng lao động</a>
							</li>
							 
							<li>
								<a href="{{URL::route('jobseekers.home')}}">Người tìm việc</a>
							</li>
							<li>
								<a href="{{URL::route('employers.launching')}}">Nhà tuyển dụng</a>
							</li>
							<li class="active1">
								<a href="{{URL::route('trainings.home')}}">Đào tạo</a>
							</li>
							 
						</ul>
						</div>
					
				</nav>
			</div>

			<div class="clearfix"></div>
			<div class="col-md-12">
				<div class="title">
					<h2>Hãy đăng ký những khóa học hấp dẫn</h2>
					<h3>Công ty chúng tôi thường xuyên mở các khóa học hấp dẫn để các bạn đăng ký và tham gia nâng cao kỹ năng cũng như nghiệp vụ của mình.</h3>
					<div class="row">
						<div class="col-md-12">
			                <a href=""><button class="btn more1">Xem thêm</button></a>
			                <a href=""><button class="btn more2">Đăng ký</button></a>
			            </div>
					</div>
				</div>
			</div>

		</div>
	</header>

@stop
@section('content')
			<div class="container">
				<div class="main1">		 	
		 			<div class="col-md-6 main1_image wow bounceInLeft" data-wow-duration="0.3s">
		 				{{HTML::image('training/assets/img/content.png')}}
		 			</div>
		 			<div class="col-md-6">
		 				<div class="main1_text wow bounceInRight" data-wow-duration="0.3s">
		 					<h2>Nhóm chương trình đào tạo</h2>
		 					<h3>Thăng tiến trong sự nghiệp luôn là khát vọng và mục tiêu lớn của hầu hết giới trẻ hiện nay. Để thực hiện được điều này các bạn cần hiểu rõ qui trình cơ bản trong nắm bắt công việc. </h3>
		 					<a href="{{URL::route('trainings.allcouser')}}"><button class="btn more3">Xem chi tiết</button></a>
		 				</div>
		 			</div>
		 		</div>

		 		<div class="clearfix"></div>
		 	
		 		<div class="main2">
		 			<h2>Sắp khai giảng</h2>
		 			<h3>Một số khóa học mà chúng tôi sắp khai giảng. Đăng ký ngay để có nhiều kỹ năng cho mình nhé!</h3>
		 			<ul>

		 				@foreach($training as $tr)
		 				<li class="wow bounceInLeft" data-wow-duration="0.3s">
		 					<?php preg_match('/<img[^>]+>/i',$tr['content'], $image); 
		 					preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $tr['content'], $matches);

		 					 ?>
		 					 @if($tr['thumbnail']==null)
		 					 	@if($matches[1])
								<img src="{{ $matches[1] }}" style="width: 188px; height: 210px">
		 					 	@endif
		 					 
		 					 @else
		 					 {{HTML::image(URL::to('uploads/training'.$tr['thumbnail'].''))}}
		 					 @endif
		 					
		 					<h2><a href="{{URL::route('trainings.detailcouser',array($tr['id']))}}">{{$tr['title']}}</a></h2>
		 					<h3>Thời lượng : {{$tr['time_day']}} buổi <br> Học phí {{$tr['fee']}}</h3>

		 				</li>

		 				@endforeach
		 				
		 			</ul>
		 			<div class="clearfix"></div>
		 		<a href="{{URL::route('trainings.allcouser')}}"><button class="btn more3">Xem tất cả</button></a>	
		 		</div>
		 		<div class="clearfix"></div>

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
			 					<!-- <div class="date-book">{{$date}}</div> -->
			 					{{HTML::image(URL::to('uploads/training/'.$doc['thumbnail'].''))}}
			 					 
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
			 					{{HTML::image(URL::to('uploads/training/'.$doc['thumbnail'].''))}}
			 					 
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
		 				<a href="{{URL::route('trainings.alldoc')}}"><button class="btn more3">Xem tất cả</button></a>	
    						 	
		 		</div>
		 		<div class="clearfix"></div>


		 		<div class="main4">
		 			<h2>Cảm nhận</h2>
		 			<h3>Một số cảm nhận mà các bạn đã trải qua các khóa học của chúng tôi</h3>

		 			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
					    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
 					  </ol>

					  <!-- Wrapper for slides -->
					  <div class="carousel-inner nx" role="listbox">
					   

					    <div class="item active">
					      
					      
					      <div class="carousel-caption">
					        <ul>
					        @foreach($people[2] as $index=>$hvcu)
					        	 @if ($index < 3 )
					        	<li>
					        		<div class="col-md-4 image-nx">
					        		{{HTML::image(URL::to('uploads/training/'.$hvcu['thumbnail'].''))}}
					        			 
					        			<p>{{$hvcu['worked']}}</p>
					        		</div>
					        		<div class="col-md-8 text-nx">
					        			<h2>{{$hvcu['name']}}</h2>
					        			<h2>{{$hvcu['couser']}}</h2>
					        			<p data-toggle="tooltip" data-placement="top" title="{{$hvcu['feeling']}}">{{str_limit($hvcu['feeling'], $limit = 100, $end = '...')}}
					        			</p>
					        		</div>
					        	</li>
					        	@endif
					         @endforeach	
					        	 
					        </ul>
					      </div>
					       
					    </div>
					     
					     <div class="item">
					       
					      <div class="carousel-caption">
					        <ul>
					        @foreach($people[2] as $index=>$hvcu)
					         @if ($index > 2 && $index < 5)
					        	<li>




					        		<div class="col-md-4 image-nx">
					        		{{HTML::image(URL::to('uploads/training/'.$hvcu['thumbnail'].''))}}
					        			 
					        			<p>{{$hvcu['worked']}}</p>
					        		</div>
					        		<div class="col-md-8 text-nx">
					        			<h2>{{$hvcu['name']}}</h2>
					        			<h2>{{$hvcu['couser']}}</h2>
					        			<p data-toggle="tooltip" data-placement="top" title="{{$hvcu['feeling']}}">{{str_limit($hvcu['feeling'], $limit = 100, $end = '...')}}
					        			</p>
					        		</div>
					        	</li>
					        @endif
					        @endforeach	
					        	 
					        </ul>
					      </div>
					    </div>
					     
					   
					     
					  </div>

					  <!-- Controls -->
					   
					</div>

		 		</div>
		 	
		 		<div class="clearfix"></div>


				<div class="main5" id="hvtb">
		 			<h2>Giảng viên tiêu biểu</h2>
		 			<h3>Một số hình ảnh của học viện và giảng viên được chúng tôi lưu trữ lại</h3>

					<ul>
							@foreach($people[0] as $gv)
					        	<li>





					        		 <div class="image11">
					        		 	{{HTML::image(URL::to('uploads/training/'.$gv['thumbnail'].''))}}
						        		 
					        		 </div>
					        		 
					        		 <p>{{$gv['name']}}</p>
					        	</li>
					        @endforeach
					        	 
					        	 
					        	 
					        	 
					</ul>

				</div>
		 		<div class="clearfix"></div>
		 		<div class="main6">
		 			<h2>Học viên tiêu biểu</h2>
		 			<h3>Một số hình ảnh của học viện và giảng viên được chúng tôi lưu trữ lại</h3>

					<ul>
								@foreach($people[1] as $hvtb)
					        	<li>
					        		{{HTML::image(URL::to('uploads/training/'.$hvtb['thumbnail'].''))}}
					        	 
 					        		 <p>{{$hvtb['name']}}</p>
					        	</li>
					        	@endforeach
					        	 
					        	 
					</ul>
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