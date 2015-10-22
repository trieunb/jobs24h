<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title', isset($title) ?: 'Nhà tuyển dụng' ) - VnJobs</title>
		{{ HTML::style('assets/ntd/css/bootstrap343.min.css') }}
		{{ HTML::style('assets/font-awesome/4.3.0/css/font-awesome.min.css') }}
		{{ HTML::style('assets/ntd/css/style.css') }}
		{{ HTML::style('assets/ntd/css/media.css') }}
		@yield('style')
	</head>
	<body>
		<div class="wrapper">
			<div class="head-main">
				<div class="page">
					<header>
						<div class="container">
							<div class="col-xs-4">
								<a href="{{ URL::route('employers.launching') }}">
									<!-- {{ HTML::image('assets/ntd/images/logo.png') }} -->
									{{ HTML::image('assets/images/logo.png') }}
								</a>
							</div>
							<div class="col-xs-8">
								<div class="row">
									<div class="col-xs-12">
										<ul class="pull-right nav-menu">
											<li><a href="{{ URL::route('employers.orders.add') }}">SẢN PHẨM & DỊCH VỤ</a></li>
											<li><a href="{{ URL::route('employers.orders.add') }}">LIÊN HỆ NGAY</a></li>
											<li><a href="#">GIỚI THIỆU</a></li>
											<li class="active"><a target="_blank" href="{{ URL::route('jobseekers.home') }}">CHO NGƯỜI TÌM VIỆC</a></li>
										</ul>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<ul class="pull-right language">
											<li><a href="#" onclick="alert('Developing ...'); return false;">Tiếng Việt</a></li>
											<li><a href="#" onclick="alert('Developing ...'); return false;">English</a></li>
											<li><a href="#" onclick="alert('Developing ...'); return false;">日本語</a></li>
										</ul>
									</div>
								</div>
								
							</div>
						</div>
					</header>
					@include('includes.employers.menu')
					<div class="container">
						@yield('content')
					</div>
				</div>
			</div>
			<footer>
				<div id="above">
					<div class="footer-page">
						<div class="container">
							<div class="col-xs-12">
								<ul class="pull-right bottom-navigation">
									<li><a href="#">Giới Thiệu</a></li>
									<li><a href="#">Bảo Mật Thông Tin</a></li>
									<li><a href="#">Góc Báo Chí</a></li>
									<li><a href="#">Hỏi Đáp</a></li>
									<li><a href="#">Quy Định Sử Dụng</a></li>
									<li><a href="#">Tư Vấn Tuyển Dụng</a></li>
								</ul>
							</div>
							<div class="clearfix"></div>
							<div class="col-xs-12">
								<div class="text-center">
									<span>Kết nối với vnjobs.vn:</span>
								</div>
								<div class="clearfix"></div>
								<ul class="socials">
									<li><a href="https://plus.google.com/u/0/+VnjobsvnVieclamhot/posts" target="_blank">{{ HTML::image('assets/ntd/images/social-rss.png') }}</a></li>
									<li><a href="https://www.facebook.com/vnjobs.vn" target="_blank">{{ HTML::image('assets/ntd/images/social-facebook.png') }}</a></li>
									<li><a href="#" target="_blank">{{ HTML::image('assets/ntd/images/social-twitter.png') }}</a></li>
									<li><a href="#" target="_blank">{{ HTML::image('assets/ntd/images/social-dribbble.png') }}</a></li>
									<li><a href="#" target="_blank">{{ HTML::image('assets/ntd/images/social-pinterest.png') }}</a></li>
									<li><a href="#" target="_blank">{{ HTML::image('assets/ntd/images/social-linkedin.png') }}</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- https://www.facebook.com/vnjobs.vn
https://plus.google.com/u/0/+VnjobsvnVieclamhot/posts
http://vieclamhot.tumblr.com/
https://www.youtube.com/channel/UCDIqPT9Nmet6zy67RtUJNiA -->
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
		</div> <!-- end #wrapper -->
	</body>
	{{ HTML::script('assets/js/jquery.1.11.1.min.js') }}
	{{ HTML::script('assets/ntd/js/bootstrap.min.js') }}
	{{ HTML::script('assets/ntd/js/main.js') }}
	@yield('script')
</html>