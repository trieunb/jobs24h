@extends('layouts.training')
@section('title') Trang chủ Đào tạo - VnJobs @stop
@section('header')
<header id="header">
		<div class="container">
			<div class="col-md-3 column logo">
			<a href="#">
			{{HTML::image('training/assets/img/logo.png')}}
			 

			</a>
			</div>
			<div class="col-md-9 column menu">


				<nav class="navbar navbar-default" role="navigation">
					 
					
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="">
								<a href="#">Cung ứng lao động</a>
							</li>
							 
							<li class="">
								<a href="#">Người tìm việc</a>
							</li>
							<li class="">
								<a href="#">Nhà tuyển dụng</a>
							</li>
							<li class="active1">
								<a href="#">Đào tạo</a>
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
						<div class="col-md-4"></div>
						<div class="col-md-2">
							<button class="btn more1">See more</button>
						</div>
						<div class="col-md-2">
							<button class="btn more2">See more</button>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>

		</div>
	</header>

@stop
@section('content')
			<div class="container">
				<div class="main1">		 	
		 			<div class="col-md-6 main1_image">
		 				{{HTML::image('training/assets/img/content.png')}}
		 			</div>
		 			<div class="col-md-6">
		 				<div class="main1_text">
		 					<h2>Nhóm chương trình đào tạo</h2>
		 					<h3>Thăng tiến trong sự nghiệp luôn là khát vọng và mục tiêu lớn của hầu hết giới trẻ hiện nay. Để thực hiện được điều này các bạn cần hiểu rõ qui trình cơ bản trong nắm bắt công việc. </h3>
		 					<button class="btn more3">Xem chi tiết</button>
		 				</div>
		 			</div>
		 		</div>

		 		<div class="clearfix"></div>
		 	
		 		<div class="main2">
		 			<h2>Sắp khai giảng</h2>
		 			<h3>Một số khóa học mà chúng tôi sắp khai giảng. Đăng ký ngay để có nhiều kỹ năng cho mình nhé!</h3>
		 			<ul>
		 				<li>
		 					{{HTML::image('training/assets/img/study1.jpg')}}
		 					<h2>Tiếng anh giao tiếp thương mại</h2>
		 					<h3>Thời lượng : 20 buổi <br> Học phí 2.000.000 đ đến 2.500.000 đ</h3>
		 				</li>
		 				<li>
		 					{{HTML::image('training/assets/img/study2.jpg')}}
		 					<h2>Tiếng anh giao tiếp thương mại</h2>
		 					<h3>Thời lượng : 20 buổi <br> Học phí 2.000.000 đ đến 2.500.000 đ</h3>
		 				</li>
		 				<li>
		 					{{HTML::image('training/assets/img/study3.jpg')}}
		 					<h2>Tiếng anh giao tiếp thương mại</h2>
		 					<h3>Thời lượng : 20 buổi <br> Học phí 2.000.000 đ đến 2.500.000 đ</h3>
		 				</li>
		 				<li>
		 					{{HTML::image('training/assets/img/study4.jpg')}}
		 					<h2>Tiếng anh giao tiếp thương mại</h2>
		 					<h3>Thời lượng : 20 buổi <br> Học phí 2.000.000 đ đến 2.500.000 đ</h3>
		 				</li>
		 				<li>
		 					{{HTML::image('training/assets/img/study2.jpg')}}
		 					<h2>Tiếng anh giao tiếp thương mại</h2>
		 					<h3>Thời lượng : 20 buổi <br> Học phí 2.000.000 đ đến 2.500.000 đ</h3>
		 				</li>
		 				<li>
		 					{{HTML::image('training/assets/img/study2.jpg')}}
		 					<h2>Tiếng anh giao tiếp thương mại</h2>
		 					<h3>Thời lượng : 20 buổi <br> Học phí 2.000.000 đ đến 2.500.000 đ</h3>
		 				</li>
		 			</ul>
		 			<button class="btn more3">Xem tất cả</button>
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
			 				<li>
			 					<div class="date-book">December 5 2014</div>
			 					{{HTML::image('training/assets/img/sach.jpg')}}
			 					 
			 					<h2>Tôi thấy hoa vàng trên cỏ xanh</h2>
			 					<span>By Nguyễn nhật ánh</span>
			 					<p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : 23</p>
			 					<p><i class="glyphicon glyphicon-save"></i> Download : 9</p>
			 					<div class="more-book">Xem thêm</div>
			 				</li>
			 				<li>
			 					<div class="date-book">December 5 2014</div>
			 					{{HTML::image('training/assets/img/sach.jpg')}}
			 					<h2>Tôi thấy hoa vàng trên cỏ xanh</h2>
			 					<span>By Nguyễn nhật ánh</span>
			 					<p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : 23</p>
			 					<p><i class="glyphicon glyphicon-save"></i> Download : 9</p>
			 					<div class="more-book">Xem thêm</div>
			 				</li>
			 				<li>
			 					<div class="date-book">December 5 2014</div>
			 					{{HTML::image('training/assets/img/sach.jpg')}}
			 					<h2>Tôi thấy hoa vàng trên cỏ xanh</h2>
			 					<span>By Nguyễn nhật ánh</span>
			 					<p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : 23</p>
			 					<p><i class="glyphicon glyphicon-save"></i> Download : 9</p>
			 					<div class="more-book">Xem thêm</div>
			 				</li>
			 				<li>
			 					<div class="date-book">December 5 2014</div>
			 					{{HTML::image('training/assets/img/sach.jpg')}}
			 					<h2>Tôi thấy hoa vàng trên cỏ xanh</h2>
			 					<span>By Nguyễn nhật ánh</span>
			 					<p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : 23</p>
			 					<p><i class="glyphicon glyphicon-save"></i> Download : 9</p>
			 					<div class="more-book">Xem thêm</div>
			 				</li>
			 				<li>
			 					<div class="date-book">December 5 2014</div>
			 					{{HTML::image('training/assets/img/sach.jpg')}}
			 					<h2>Tôi thấy hoa vàng trên cỏ xanh</h2>
			 					<span>By Nguyễn nhật ánh</span>
			 					<p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : 23</p>
			 					<p><i class="glyphicon glyphicon-save"></i> Download : 9</p>
			 					<div class="more-book">Xem thêm</div>
			 				</li>
			 				<li>
			 					<div class="date-book">December 5 2014</div>
			 					{{HTML::image('training/assets/img/sach.jpg')}}
			 					<h2>Tôi thấy hoa vàng trên cỏ xanh</h2>
			 					<span>By Nguyễn nhật ánh</span>
			 					<p><i class="glyphicon glyphicon-eye-open"></i> Lượt xem : 23</p>
			 					<p><i class="glyphicon glyphicon-save"></i> Download : 9</p>
			 					<div class="more-book">Xem thêm</div>
			 				</li>
		 				</ul>	
    											
    					</div>
    					<div role="tabpanel" class="tab-pane" id="profile">
    					</div>
     
  					</div>
		 			

		 			<div class="clearfix"></div>
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
					    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					  </ol>

					  <!-- Wrapper for slides -->
					  <div class="carousel-inner nx" role="listbox">
					    <div class="item active">
					       
					      <div class="carousel-caption">
					        <ul>
					        	<li>
					        		<div class="col-md-4 image-nx">
					        		{{HTML::image('training/assets/img/images.jpg')}}
					        			 
					        			<p>Tiếng anh giao tiếp thương mại</p>
					        		</div>
					        		<div class="col-md-8 text-nx">
					        			<h2>Phạm Nguyễn Vân</h2>
					        			<p>Mình đã có thời gian rất tuyệt ở lớp tiếng anh giao tiếp, học mà chơi chơi mà học. Hi vọng sẽ có nhiều khóa học bổ ích hơn nữa</p>
					        		</div>
					        	</li>
					        	<li>
					        		<div class="col-md-4 image-nx">
					        			{{HTML::image('training/assets/img/images.jpg')}}
					        			<p>Tiếng anh giao tiếp thương mại</p>
					        		</div>
					        		<div class="col-md-8 text-nx">
					        			<h2>Phạm Nguyễn Vân</h2>
					        			<p>Mình đã có thời gian rất tuyệt ở lớp tiếng anh giao tiếp, học mà chơi chơi mà học. Hi vọng sẽ có nhiều khóa học bổ ích hơn nữa</p>
					        		</div>
					        	</li>
					        	<li>
					        		<div class="col-md-4 image-nx">
					        			{{HTML::image('training/assets/img/images.jpg')}}
					        			<p>Tiếng anh giao tiếp thương mại</p>
					        		</div>
					        		<div class="col-md-8 text-nx">
					        			<h2>Phạm Nguyễn Vân</h2>
					        			<p>Mình đã có thời gian rất tuyệt ở lớp tiếng anh giao tiếp, học mà chơi chơi mà học. Hi vọng sẽ có nhiều khóa học bổ ích hơn nữa</p>
					        		</div>
					        	</li>
					        </ul>
					      </div>
					    </div>

					     <div class="item">
					       
					      <div class="carousel-caption">
					        <ul>
					        	<li>
					        		<div class="col-md-4 image-nx">
					        			{{HTML::image('training/assets/img/images.jpg')}}
					        			<p>Tiếng anh giao tiếp thương mại</p>
					        		</div>
					        		<div class="col-md-8 text-nx">
					        			<h2>Phạm Nguyễn Vân</h2>
					        			<p>Mình đã có thời gian rất tuyệt ở lớp tiếng anh giao tiếp, học mà chơi chơi mà học. Hi vọng sẽ có nhiều khóa học bổ ích hơn nữa</p>
					        		</div>
					        	</li>
					        	<li>
					        		<div class="col-md-4 image-nx">
					        			{{HTML::image('training/assets/img/images.jpg')}}
					        			<p>Tiếng anh giao tiếp thương mại</p>
					        		</div>
					        		<div class="col-md-8 text-nx">
					        			<h2>Phạm Nguyễn Vân</h2>
					        			<p>Mình đã có thời gian rất tuyệt ở lớp tiếng anh giao tiếp, học mà chơi chơi mà học. Hi vọng sẽ có nhiều khóa học bổ ích hơn nữa</p>
					        		</div>
					        	</li>
					        	<li>
					        		<div class="col-md-4 image-nx">
					        			{{HTML::image('training/assets/img/images.jpg')}}
					        			<p>Tiếng anh giao tiếp thương mại</p>
					        		</div>
					        		<div class="col-md-8 text-nx">
					        			<h2>Phạm Nguyễn Vân</h2>
					        			<p>Mình đã có thời gian rất tuyệt ở lớp tiếng anh giao tiếp, học mà chơi chơi mà học. Hi vọng sẽ có nhiều khóa học bổ ích hơn nữa</p>
					        		</div>
					        	</li>
					        </ul>
					      </div>
					    </div>

					     
					  </div>

					  <!-- Controls -->
					   
					</div>

		 		</div>
		 	
		 		<div class="clearfix"></div>


				<div class="main5">
		 			<h2>Giảng viên tiêu biểu</h2>
		 			<h3>Một số hình ảnh của học viện và giảng viên được chúng tôi lưu trữ lại</h3>

					<ul>
					        	<li>
					        		 <div class="image">{{HTML::image('training/assets/img/images.jpg')}}</div>
					        		 <div class="linkgv">
					        		 	<a href=""><i class="fa fa-facebook"></i></a>
					        		 	<a href=""><i class="fa fa-twitter"></i></a>
					        		 	<a href=""><i class="fa fa-linkedin"></i></a>
					        		 	<a href=""><i class="fa fa-skype"></i></a>
					        		 </div>
					        		 <p>Nguyễn Thu Vân</p>
					        	</li>
					        	<li>
					        		 <div class="image">{{HTML::image('training/assets/img/images.jpg')}}</div>
					        		 <div class="linkgv">
					        		 	<a href=""><i class="fa fa-facebook"></i></a>
					        		 	<a href=""><i class="fa fa-twitter"></i></a>
					        		 	<a href=""><i class="fa fa-linkedin"></i></a>
					        		 	<a href=""><i class="fa fa-skype"></i></a>
					        		 </div>
					        		 <p>Nguyễn Thu Vân</p>
					        	</li>
					        	<li>
					        		 <div class="image">{{HTML::image('training/assets/img/images.jpg')}}</div>
					        		 <div class="linkgv">
					        		 	<a href=""><i class="fa fa-facebook"></i></a>
					        		 	<a href=""><i class="fa fa-twitter"></i></a>
					        		 	<a href=""><i class="fa fa-linkedin"></i></a>
					        		 	<a href=""><i class="fa fa-skype"></i></a>
					        		 </div>
					        		 <p>Nguyễn Thu Vân</p>
					        	</li>
					        	<li>
					        		 <div class="image">{{HTML::image('training/assets/img/images.jpg')}}</div>
					        		 <div class="linkgv">
					        		 	<a href=""><i class="fa fa-facebook"></i></a>
					        		 	<a href=""><i class="fa fa-twitter"></i></a>
					        		 	<a href=""><i class="fa fa-linkedin"></i></a>
					        		 	<a href=""><i class="fa fa-skype"></i></a>
					        		 </div>
					        		 <p>Nguyễn Thu Vân</p>
					        	</li>
					        	 
					</ul>

				</div>
		 		<div class="clearfix"></div>
		 		<div class="main6">
		 			<h2>Học viên tiêu biểu</h2>
		 			<h3>Một số hình ảnh của học viện và giảng viên được chúng tôi lưu trữ lại</h3>

					<ul>
					        	<li>
					        		{{HTML::image('training/assets/img/hocvien.jpg')}}
 					        		 <p>Nguyễn Thu Vân</p>
					        	</li>
					        	<li>
					        		 {{HTML::image('training/assets/img/hocvien.jpg')}}
					        		 <p>Nguyễn Thu Vân</p>
					        	</li>
					        	<li>
					        		 {{HTML::image('training/assets/img/hocvien.jpg')}}
					        		 <p>Nguyễn Thu Vân</p>
					        	</li>
					        	<li>
					        		 {{HTML::image('training/assets/img/hocvien.jpg')}}
					        		 <p>Nguyễn Thu Vân</p>
					        	</li>
					        	<li>
					        		 {{HTML::image('training/assets/img/hocvien.jpg')}}
					        		 <p>Nguyễn Thu Vân</p>
					        	</li>
					        	<li>
					        		 {{HTML::image('training/assets/img/hocvien.jpg')}}
					        		 <p>Nguyễn Thu Vân</p>
					        	</li>
					        	<li>
					        		 {{HTML::image('training/assets/img/hocvien.jpg')}}
					        		 <p>Nguyễn Thu Vân</p>
					        	</li>
					        	<li>
					        		 {{HTML::image('training/assets/img/hocvien.jpg')}}
					        		 <p>Nguyễn Thu Vân</p>
					        	</li>
					        	 
					</ul>
				</div>
		 	</div>
		 	</div>

@stop