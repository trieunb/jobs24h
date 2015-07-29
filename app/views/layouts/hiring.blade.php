<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title', isset($title) ?: 'Cẩm nang việc làm' ) - VnJobs</title>
		{{ HTML::style('hiringsite/css/bootstrap.min.css') }}
		{{ HTML::style('assets/font-awesome/4.3.0/css/font-awesome.min.css') }}
		{{ HTML::style('hiringsite/css/style.css') }}
		{{ HTML::style('hiringsite/css/fonts.css') }}
		{{ HTML::style('hiringsite/css/slide.css') }}
		
		@yield('style')
	</head>
	<body>

		<div class="" id="wrap">
			<header>
				<div id="nav">
					<nav class="navbar navbar-default" role="navigation">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<a class="navbar-brand" href="{{ URL::route('hiring.home') }}">
								<span class="fa fa-align-justify"></span>
							</a>
						</div>
					
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav navbar-left">
								<li class="">
									<a href="{{ URL::route('jobseekers.home') }}" class="logo">
										{{ HTML::image('hiringsite/images/logo.png') }}
									</a>
								</li>
								<li class="navigation">
									<a href="{{ URL::route('hiring.category', 4) }}">Quản lý con người</a>
								</li>
								<li class="navigation">
									<a href="{{ URL::route('hiring.category', 5) }}">Bí quyết tìm việc</a>
								</li>
								<li class="navigation">
									<a href="{{ URL::route('hiring.category', 6) }}">Xu hướng nhân lực</a>
								</li>
								<li class="navigation last">
									<a href="{{ URL::route('hiring.category', 7) }}">Góc báo chí</a>
								</li>
								<li>
								<!-- https://www.facebook.com/vnjobs.vn
https://plus.google.com/u/0/+VnjobsvnVieclamhot/posts
http://vieclamhot.tumblr.com/
https://www.youtube.com/channel/UCDIqPT9Nmet6zy67RtUJNiA -->
									<ul class="socials">
										<li><a href="https://www.facebook.com/vnjobs.vn" target="_blank"><span class="fa fa-facebook"></span></a></li>
										<li><a ><span class="fa fa-twitter"></span></a></li>
										<li><a ><span class="fa fa-linkedin"></span></a></li>
										<li><a href="https://www.youtube.com/channel/UCDIqPT9Nmet6zy67RtUJNiA" target="_blank"><span class="fa fa-youtube"></span></a></li>
									</ul>
								</li>
								<li class="search-icon">
									<a href=""><span class="fa fa-search"></span></a>
								</li>

							</ul>
							
							
						</div><!-- /.navbar-collapse -->
					</nav>
				</div>
			</header>
			<div class="clearfix"></div>
			<div class="container">
				@yield('primary')

			</div>
			<div class="clearfix"></div>
			<footer>
				<div id="above">
					<div class="footer-page">
						<div class="container">
							<div class="col-xs-12">
								<ul class="pull-right bottom-navigation">
									<li><a href="{{ URL::route('hiring.home') }}">Trang chủ</a></li>
									<li><a href="{{ URL::route('hiring.category', 4) }}">Quản lý con người</a></li>
									<li><a href="{{ URL::route('hiring.category', 5) }}">Bí quyết tìm việc</a></li>
									<li><a href="{{ URL::route('hiring.category', 6) }}">Xu hướng nhân lực</a></li>
									<li><a href="{{ URL::route('hiring.category', 7) }}">Góc báo chí</a></li>
									
								</ul>
							</div>
							<div class="clearfix"></div>
							<div class="col-xs-12">
								<div class="text-center">
									<span>Kết nối với vnjobs.vn:</span>
								</div>
								<div class="clearfix"></div>
								<ul class="socials">
									<li><a href="#">{{ HTML::image('ntd/assets/images/social-rss.png') }}</a></li>
									<li><a href="https://www.facebook.com/vnjobs.vn" target="_blank">{{ HTML::image('ntd/assets/images/social-facebook.png') }}</a></li>
									<li><a href="#">{{ HTML::image('ntd/assets/images/social-twitter.png') }}</a></li>
									<li><a href="#">{{ HTML::image('ntd/assets/images/social-dribbble.png') }}</a></li>
									<li><a href="#">{{ HTML::image('ntd/assets/images/social-pinterest.png') }}</a></li>
									<li><a href="#">{{ HTML::image('ntd/assets/images/social-linkedin.png') }}</a></li>
								</ul>
							</div>
						</div>
					</div>
					
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

	{{ HTML::script('assets/js/jquery.1.11.1.min.js') }}
	{{ HTML::script('hiringsite/js/bootstrap.min.js') }}
	{{ HTML::script('hiringsite/js/custom.js') }}
	
	@yield('script')
	</body>
</html>