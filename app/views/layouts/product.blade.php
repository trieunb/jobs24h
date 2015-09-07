<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title', isset($title) ?: 'Trang chủ' ) - Sản phẩm dịch vụ Vnjobs</title>
		{{ HTML::style('product-service/css/bootstrap.min.css') }}
		{{ HTML::style('assets/font-awesome/4.3.0/css/font-awesome.min.css') }}
		{{ HTML::style('product-service/css/style.css') }}
		{{ HTML::style('product-service/css/fonts.css') }}
		@yield('style')
	</head>
	<body>

		<div class="" id="wrap">
			<header>
				<div class="row top-info">
					<div class="container">
						<div class="col-sm-6 info-left">
							<ul>
								<li><a href=""><span class="fa fa-envelope-o"></span> sale@vnjobs.vn</a></li>
								<li><span class="fa fa-phone"></span> 04-3577-1608</li>
							</ul>
						</div>
						<div class="col-xs-6 info-right">
							<ul class="pull-right top-socials">
								<li><a href=""><span class="fa fa-twitter-square"></span></a></li>
								<li><a href="https://www.facebook.com/vnjobs.vn" target="_blank"><span class="fa fa-facebook-square"></span></a></li>
								<li><a href="https://plus.google.com/u/0/+VnjobsvnVieclamhot/posts" target="_blank"><span class="fa fa-google-plus-square"></span></a></li>
								<li><a href=""><span class="fa fa-linkedin-square"></span></a></li>
							</ul>
							<!-- https://www.facebook.com/vnjobs.vn
https://plus.google.com/u/0/+VnjobsvnVieclamhot/posts
http://vieclamhot.tumblr.com/
https://www.youtube.com/channel/UCDIqPT9Nmet6zy67RtUJNiA -->
						</div>
					</div>
				</div>
				<div id="nav">

					<nav class="navbar navbar-default" role="navigation">
						<!-- Brand and toggle get grouped for better mobile display -->
						
						<div class="container">
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse navbar-ex1-collapse">
								<ul class="nav navbar-nav navbar-left">
									<li class="">
										<a href="{{ URL::route('jobseekers.home') }}" class="logo">
											
											{{ HTML::image('assets/images/logo.png') }}
										</a>
									</li>
								</ul>
								<ul class="nav navbar-nav navbar-right">
									
									<li class="navigation">
										<a href="{{ URL::route('employers.launching') }}">Trang chủ</a>
									</li>
									<li class="navigation">
										<a href="{{ URL::route('product.home') }}" class="active">Sản phẩm và dịch vụ</a>
									</li>
									<li class="navigation">
										<a href="{{ URL::route('employers.jobs.index') }}">HR Central</a>
									</li>
									<li class="navigation last">
										<a href="{{ URL::route('hiring.home') }}">Cẩm nang việc làm</a>
									</li>
									<li class="pull-right">
										@if(Auth::check())
										<div class="user-avatar">
											{{ HTML::image('product-service/images/default-avatar.png') }}
										</div>
										<div class="user-name">
											Hi, {{ Auth::getUser()->full_name }}
										</div>
										@endif
									</li>
									

								</ul>
								
								
							</div><!-- /.navbar-collapse -->
						</div>
					</nav>
				</div> <!-- end #nav -->
			</header>
			<div class="clearfix"></div>
			@yield('primary')
			<div class="clearfix"></div>
			<footer>
				<div id="above">
					<div class="footer-top">
						<div class="row">
							<div class="container">
								<div class="col-sm-6 support">
									<span class="fa fa-arrow-circle-o-right"></span> 
									<span class="txt">Hỗ trợ ứng viên: (84.4) 3577-1608 </span>
									<span class="fa fa-phone"></span> 
									<span class="txt">Hotline: 1900 5858 53</span>
								</div>
								<div class="col-sm-6">
									<ul class="socials pull-right">
										<li>Kết nối với vnjobs: </li>
										<li><a href="https://www.facebook.com/vnjobs.vn" target="_blank">{{ HTML::image('ntd/assets/images/social-rss.png') }}</a></li>
										<li><a href="https://www.facebook.com/vnjobs.vn" target="_blank">{{ HTML::image('ntd/assets/images/social-facebook.png') }}</a></li>
										<li><a href="https://www.facebook.com/vnjobs.vn" target="_blank">{{ HTML::image('ntd/assets/images/social-twitter.png') }}</a></li>
										<li><a href="https://www.facebook.com/vnjobs.vn" target="_blank">{{ HTML::image('ntd/assets/images/social-dribbble.png') }}</a></li>
										<li><a href="https://www.facebook.com/vnjobs.vn" target="_blank">{{ HTML::image('ntd/assets/images/social-pinterest.png') }}</a></li>
										<li><a href="https://www.facebook.com/vnjobs.vn" target="_blank">{{ HTML::image('ntd/assets/images/social-linkedin.png') }}</a></li>
										
									</ul>
									<!-- https://www.facebook.com/vnjobs.vn
https://plus.google.com/u/0/+VnjobsvnVieclamhot/posts
http://vieclamhot.tumblr.com/
https://www.youtube.com/channel/UCDIqPT9Nmet6zy67RtUJNiA -->
								</div>
							</div>
						</div>
					</div> <!-- /.footer-top -->
					<div class="footer-bottom">
						<div class="row">
							<div class="container">
								<div class="col-xs-3">
									<h4 class="footer-title">CHỨC NĂNG</h4>
									<ul class="list-style-icon">
										<li><a href="{{ URL::route('jobseekers.home') }}">Tài khoản</a></li>
										<li><a href="{{ URL::route('jobseekers.home') }}">Tạo hồ sơ</a></li>
										<li><a href="{{ URL::route('jobseekers.home') }}">Tạo thông báo việc làm</a></li>
										<li><a href="{{ URL::route('jobseekers.home') }}">Việc làm phù hợp với bạn</a></li>
										<li><a href="{{ URL::route('jobseekers.home') }}">Phản hồi từ nhà tuyển dụng</a></li>
										<li><a href="{{ URL::route('jobseekers.home') }}">Talent Community</a></li>
									</ul>
								</div> <!-- /.col-xs-3 -->
								<div class="col-xs-3">
									<h4 class="footer-title">Website đối tác</h4>
									<ul class="list-style-icon">
										<li><a href="http://vieclam.tuoitre.vn" target="_blank">Vieclam.Tuoitre.Vn</a></li>
										<li><a href="http://vieclam.tuoitre.vn" target="_blank">Affiliate Program</a></li>
										<li><a href="http://vieclam.tuoitre.vn" target="_blank">Vieclam.Tuoitre.Vn</a></li>
										<li><a href="http://vieclam.tuoitre.vn" target="_blank">Affiliate Program</a></li>
										<li><a href="http://vieclam.tuoitre.vn" target="_blank">Vieclam.Tuoitre.Vn</a></li>
										<li><a href="http://vieclam.tuoitre.vn" target="_blank">Affiliate Program</a></li>
									</ul>
								</div> <!-- /.col-xs-3 -->
								<div class="col-xs-3">
									<h4 class="footer-title">Ứng dụng di động</h4>
									<ul class="mobile-apps">
										<li><a href="">
											{{ HTML::image('assets/images/app_st.png') }}
										</a></li>
										<li><a href="">
											{{ HTML::image('assets/images/app_ad.png') }}
										</a></li>
										<li><a href="">
											{{ HTML::image('assets/images/wd_st.png') }}
										</a></li>
									</ul>
								</div> <!-- /.col-xs-3 -->
								<div class="col-xs-3">
									<h4 class="footer-title">Liên hệ</h4>
									<div class="footer-li li-address">
										Địa chỉ: Tầng 10, tòa nhà SUDICO, Mỹ Đình 1, Mễ Trì, Nam Từ Liêm, Hà Nội
									</div>
									<div class="footer-li li-email">
										Email: info@vnjobs.vn
									</div>
									<div class="footer-li li-phone">
										Điện thoại: 04-3577-1608
									</div>
									<div class="footer-li li-phone">
										Hotline: 1900 5858 53
									</div>
									
								</div> <!-- /.col-xs-3 -->
							</div>
						</div>
					</div> <!-- /.footer-bottom -->
				</div>
				<div class="clearfix"></div>
				<div id="below">
					<div class="">
						<div class="center">
							<span class="copyright">Copyright 2015 Công ty TNHH Minh Phuc (MP Telecom)</span>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- jQuery -->
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/custom.js"></script>
		{{ HTML::script('product-service/js/jquery-1.11.3.min.js') }}
		{{ HTML::script('product-service/js/bootstrap.min.js') }}
		{{ HTML::script('product-service/js/custom.js') }}
		
		@yield('script')
		
	</body>
</html>