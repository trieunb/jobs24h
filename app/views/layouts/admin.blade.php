<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>@yield('title', isset($title) ?: 'Dashboard') - Admin VnJobs</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
	<!-- FONTAWESOME ICONS STYLES-->
	<link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
	<!--CUSTOM STYLES-->
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
	  <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	@yield('style')
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				{{ HTML::link(URL::route('admin.dashboard'), 'Dashboard', array('class'=>'navbar-brand')) }}
			</div>
			<div class="notifications-wrapper">
				<ul class="nav">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user-plus"></i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="{{ URL::route('admin.profile') }}"><i class="fa fa-user-plus"></i> My Profile</a>
							</li>
							<li class="divider"></li>
							<li><a href="{{ URL::route('admin.logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<!-- /. NAV TOP  -->
		<nav  class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li>
						<div class="user-img-div">
							<img src="{{ asset('assets/img/user.jpg') }}" class="img-circle" />

						   
						</div>

					</li>
					 <li>
						<a  href="#"> <strong> {{ $user->username }} </strong></a>
					</li>
					
					<li>
						<a class="{{ HTML::active(['admin', 'active']) }}"  href="{{ URL::to('/admin') }}"><i class="fa fa-dashboard "></i>Dashboard</a>
					</li>
					<li>
						<a href="{{ URL::to('/admin/general') }}" class="{{ HTML::active(['admin.general.*', 'active-menu']) }}"><i class="fa fa-venus "></i>Quản lý chung </a>
					</li>
					
					<li>
						<a href="{{ URL::to('/admin/users') }}" class="{{ HTML::active(['admin.users*', 'active-menu']) }}"><i class="fa fa-venus "></i>Quản trị viên </a>
						
					</li>
					<li>
						<a href="{{ URL::to('/admin/jobseekers') }}" class="{{ HTML::active(['admin.jobseekers.*', 'active-menu']) }}"><i class="fa fa-venus "></i>Người tìm việc </a>
						
					</li>

					<li>
						<a href="{{ URL::to('/admin/resumes') }}" class="{{ HTML::active(['admin.resumes.*', 'active-menu']) }}"><i class="fa fa-cogs "></i>Hồ sơ CV</a>
					</li>

					<li>
						<a href="{{ URL::to('/admin/employers') }}" class="{{ HTML::active(['admin.employeers.*', 'active-menu']) }}"><i class="fa fa-venus "></i>Nhà tuyển dụng </a>
					</li>


				   
					<!--<li>
						<a href="#"><i class="fa fa-sitemap "></i>Multilevel Link <span class="fa arrow"></span></a>
						 <ul class="nav nav-second-level">
							<li>
								<a href="#"><i class="fa fa-cogs "></i>Second  Link</a>
							</li>
							 <li>
								<a href="#"><i class="fa fa-bullhorn "></i>Second Link</a>
							</li>
							<li>
								<a href="#">Second Level<span class="fa arrow"></span></a>
								<ul class="nav nav-third-level">
									<li>
										<a href="#">Third  Link</a>
									</li>
									<li>
										<a href="#">Third Link</a>
									</li>

								</ul>

							</li>
						</ul>
					</li>-->
				   
				</ul>
			</div>

		</nav>
		<!-- /. SIDEBAR MENU (navbar-side) -->
		<div id="page-wrapper" class="page-wrapper-cls">
			<div id="page-inner">
				
			@yield('content')

			</div><!-- /. PAGE WRAPPER  -->
		</div><!-- /. PAGE WRAPPER  -->
		</div><!-- /. WRAPPER  -->
	
	<footer >
	   
	</footer>
	<!-- /. FOOTER  -->
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="{{ asset('assets/js/jquery-1.11.1.js') }}"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="{{ asset('assets/js/jquery.metisMenu.js') }}"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="{{ asset('assets/js/custom.js') }}"></script>
	@yield('script')

</body>
</html>
