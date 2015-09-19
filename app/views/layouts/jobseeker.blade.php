<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title', isset($title) ?: Lang::get('jobseekers.home.title') ) - {{ Lang::get('jobseekers.home.slogan') }}</title>
		<meta name="Robots" content="INDEX, FOLLOW">
		<meta property="og:title" content="@yield('title_fb', isset($title_fb))"/>
		<meta property="og:image" content="@yield('img_fb', isset($img_fb))"/>
		<meta property="og:description" content="@yield('desc_fb', isset($desc_fb))"/>
		<meta property="og:url" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"/>
		<meta property="og:site_name" content="Vnjobs - Việc làm không giới hạn"/>
		<meta property="article:publisher" content="https://www.facebook.com/vnjobs.vn"/>
		<meta property="fb:app_id" content="1536226246625315"/>

		<!-- Bootstrap CSS -->
		{{ HTML::style('assets/css/bootstrap.min.css') }}
		{{ HTML::style('assets/font-awesome/4.2.0/css/font-awesome.min.css') }}
		{{ HTML::style('assets/css/jobseeker-style.css') }}
		{{ HTML::style('assets/css/media.css') }}
		{{ HTML::style('assets/plugins/jcarousel/css/jcarousel.responsive.css') }}
		{{ HTML::style('assets/css/bootstrap-datetimepicker.min.css') }}
		{{ HTML::style('//fonts.googleapis.com/css?family=Calligraffitti') }}
		<script>(function(d, s, id) {
	      var js, fjs = d.getElementsByTagName(s)[0];
	      if (d.getElementById(id)) return;
	      js = d.createElement(s); js.id = id;
	      js.src = "//connect.facebook.net/vn_VN/sdk.js#xfbml=1&version=v2.4&appId=1627071780874094";
	      fjs.parentNode.insertBefore(js, fjs);
	    }(document, 'script', 'facebook-jssdk'));</script>
	</head>
	<body>
		<header id="header">
			<div class="container clearfix">
				<div class="site-title">
					<a class="logo" href="{{ URL::route('jobseekers.home') }}">
						{{ HTML::image('assets/images/logo.png') }}
					</a>
				</div>
				<div class="header-right pull-right">
					<div class="list-link">
						@if($locale == 'vi')
							<span class="language"><a href="{{ URL::to('/en') }}" class="text-blue">English</a></span>
						@else
							<span class="language"><a href="{{ URL::to('/vi') }}" class="text-blue">Tiếng Việt</a></span>
						@endif
						<span class="envelope"><a href="{{URL::route('jobseekers.register-job-alert')}}" class="text-blue"><i class="fa fa-envelope"></i> Nhận việc làm mới</a></span>
						<span class="employer-site"><a href="{{ URL::route('employers.launching') }}"><i class="fa fa-caret-right"></i> Nhà tuyển dụng</a></span>
					</div>
					<ul class="menu pull-right">
						<div class="fb_plus">Kết bạn với Vnjobs.vn trên <div class="fb-like" data-href="https://www.facebook.com/vnjobs.vn" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div></div>
						<div class="google_plus"><script src="https://apis.google.com/js/plusone.js"></script>
<g:plus action="share" annotation="bubble"></g:plus><script src="https://apis.google.com/js/platform.js" async defer></script><g:follow href="https://plus.google.com/u/0/+VnjobsvnVieclamhot/auto" rel="author"></g:follow></div>
						<?php $user = Sentry::getUser();?>
						@if(Sentry::check())
								<nav class="ntv-menu navbar-right">
									@include('includes.jobseekers.menu-ntv')
								</nav>
								<a href="{{URL::route('jobseekers.edit-basic-info')}}" class="text-blue pull-right">
									@if($user->avatar != null)
									<img src="{{URL::to("uploads/jobseekers/avatar/".$user->avatar."")}}" class="avatar">
									@else
									{{ HTML::image('assets/images/logo.png', null, array("class"=>"avatar")) }}
									@endif
									<strong><em>Chào, {{$user->first_name}} {{$user->last_name}}</em></strong>
								</a>
						@else
							<li><a href="{{ URL::route('jobseekers.login') }}">Đăng nhập</a></li>
							<li><a href="{{ URL::route('jobseekers.register') }}">Đăng ký</a></li>
						@endif
					</ul>
				</div>
			</div>
			<nav id="navigation" class="bg-blue">
				<span class="show-menu"><i class="fa fa-list"></i> MENU</span>
				<ul class="main-menu container">
					<li><a href="{{ URL::route('jobseekers.home') }}">Trang chủ</a></li>
					<li><a href="{{ URL::route('jobseekers.home') }}">Người tìm việc</a></li>
					<li><a href="{{ URL::route('employers.launching') }}">Nhà tuyển dụng</a></li>
					<li><a href="{{ URL::route('cungunglaodong.home') }}">Cung ứng lao động</a></li>
					<li><a href="{{ URL::route('trainings.home') }}">Đào tạo</a></li>
					<li><ul class="nav navbar-nav navbar-right">
						{{Form::open(array('route'=>array('jobseekers.search-job'), 'class'=>'navbar-form navbar-right relative', 'method'=>'GET', 'role'=> 'search'))}}
							<div class="form-group">
								{{Form::input('text','keyword', null, array('class'=>'form-control simple-search', 'placeholder'=>'Tìm việc làm...'))}}
							</div>
							<button type="submit" class="btn btn-search">
								{{ HTML::image('assets/images/btn_search.png') }}
							</button>
						{{Form::close()}}
					</ul></li>
				</ul>
			</nav>
		</header>
		<section class="boxed-content-wrapper clearfix">
		@yield('content')
		
		</section><!-- boxed-content-wrapper -->
		<footer class="bg-dark">
			<div class="bg-blue">
				<div class="support-social container">
					<div class="col-sm-6">
						<span class="support"><i class="fa fa-arrow-circle-o-right fa-2x"></i> Hỗ trợ ứng viên: (84.4) 3577-1608</span>
						<span class="hotline"><i class="fa fa-phone"></i> Hotline 1900 5858 53</span>
					</div>
					<div class="col-sm-6 pull-right">
						<div class="social">
							<span>Kết nối với vnjobs.vn</span>
							<a href="#" class="rss" target="_blank" title="Rss"></a>
							<a href="https://www.facebook.com/vnjobs.vn" class="facebook" target="_blank" title="Facebook"></a>
	                        <a href="#" class="twitter" target="_blank" title="Twitter"></a>
	                        <a href="#" class="linkedin" target="_blank" title="Linkedin"></a>
	                        <a href="#" class="pinterest" target="_blank" title="Pinterest"></a>
	                        <a href="#" class="dribble" target="_blank" title="Dribble"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="footer container">
				<div class="col-sm-3">
					<h3>Chức năng</h3>
					<ul class="arrow-right-dark">
						<li><a href="{{URL::route('jobseekers.edit-basic-info')}}">Tài Khoản</a></li>
						<li><a href="{{URL::route('jobseekers.my-resume')}}">Tạo/Đăng Hồ Sơ</a></li>
						<li><a href="{{URL::route('jobseekers.notification-jobs')}}">Tạo Thông Báo Việc Làm</a></li>
						<li><a href="{{URL::route('jobseekers.my-job')}}">Việc Làm Phù Hợp Với Bạn</a></li>
						<li><a href="{{URL::route('jobseekers.respond-from-employment')}}">Phản Hồi Từ Nhà Tuyển Dụng</a></li>
						<li><a href="#">Talent Community</a></li>
					</ul>
				</div>
				<div class="col-sm-3">
					<h3>Liên kết hữu ích</h3>
					<ul class="arrow-right-dark">
						<li><a href="http://vieclam.tuoitre.vn/" target="_blank">Vieclam.Tuoitre.Vn</a></li>
						<li><a href="#" target="_blank">Affiliate Program</a></li>
						<li><a href="#" target="_blank">Vieclam.Tuoitre.Vn</a></li>
						<li><a href="#" target="_blank">Affiliate Program</a></li>
						<li><a href="http://vieclam.tuoitre.vn/" target="_blank">Vieclam.Tuoitre.Vn</a></li>
						<li><a href="#" target="_blank">Affiliate Program</a></li>
					</ul>
				</div>
				<div class="col-sm-3">
					<h3>Ứng dụng di động</h3>
					<ul>
						<li><a href="#">{{ HTML::image('assets/images/app_ad.png') }}</a></li>
						<li><a href="#">{{ HTML::image('assets/images/app_st.png') }}</a></li>
						<li><a href="#">{{ HTML::image('assets/images/wd_st.png') }}</a></li>
					</ul>
				</div>
				<div class="col-sm-3">
					<h3>Liên Hệ</h3>
					<p><i class="fa fa-map-marker"></i>&nbsp; Địa chỉ: Tầng 10, Tòa nhà SUDICO, Mỹ Đình 1, Mễ Trì, Nam Từ Liên, Hà Nội</p>
					<p><i class="fa fa-envelope"></i>&nbsp; Email: <a href="mailto:info@vnjobs.vn">info@vnjobs.vn</a></p>
					<p><i class="fa fa-phone"></i>&nbsp; Điện thoại: 04-3577-1608</p>
					<p><i class="fa fa-phone"></i>&nbsp; Hotline: 1900 5858 53</p>
				</div>
			</div>
			<div class="clearfix"></div>
			<p class="copy-right">Copyright 2015 Công ty TNHH Minh Phúc - MPTelecom</p>
		</footer>
		<div class="loading-icon"></div>
		<span id="top-link-block" class="hidden">
		    <a href="#top" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
		        <i class="fa fa-arrow-circle-up"></i>
		    </a>
		</span><!-- /top-link-block -->
		<?php
		$cookie_name = "popup";
		$cookie_value = "popup_content";
		setcookie($cookie_name, $cookie_value, 0);
		if(!isset($_COOKIE[$cookie_name])) {
		?>
		<div id="fadein"></div>
		<div id="popup"><div class="content"><a href="{{URL::route('employers.register')}}">{{ HTML::image('assets/images/pop_up.png') }}</a><a href="#" class="close"><i class="fa fa-times"></i>   Đóng</a></div></div>
		<?php }?>
		<!-- jQuery -->
		{{ HTML::script('assets/js/jquery.1.11.1.min.js') }}
		{{ HTML::script('assets/js/jquery-ui.min.js') }}
		{{ HTML::script('assets/js/bootstrap.min.js') }}
		{{ HTML::script('assets/plugins/select/js/select2.full.min.js') }}
		{{ HTML::script('assets/plugins/jcarousel/js/jquery.jcarousel.min.js') }}
		{{ HTML::script('assets/js/moment.js') }}
		{{ HTML::script('assets/js/bootstrap-datetimepicker.min.js') }}
		{{ HTML::script('assets/js/jquery.floatingFixed.js') }}
		{{ HTML::script('assets/js/jquery.formatcurrency.js') }}
		{{ HTML::script('assets/js/main.js') }}
		@yield('scripts')
	</body>
</html>