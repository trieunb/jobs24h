<?php $ver = '1.0' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title>@yield('title', isset($title) ?: 'Dashboard') - Admin VnJobs</title>
	<!-- BOOTSTRAP STYLES-->
	{{ HTML::style('assets/css/bootstrap.min.css?v='.$ver) }}
	<!-- FONTAWESOME ICONS STYLES-->
	{{ HTML::style('assets/font-awesome/4.2.0/css/font-awesome.min.css?v='.$ver) }}
	<!--CUSTOM STYLES-->
	{{ HTML::style('//fonts.googleapis.com/css?family=Open+Sans:400,300?v='.$ver) }}
	{{ HTML::style('assets/css/ace.min.css?v='.$ver) }}
	{{ HTML::script('assets/js/ace-extra.min.js?v='.$ver) }}
	<!--[if lte IE 9]>
		{{ HTML::style('assets/css/ace-part2.min.css') }}
		<![endif]-->

		<!--[if lte IE 9]>
		{{ HTML::style('assets/css/ace-ie.min.css') }}
		<![endif]-->


	@yield('style')
</head>
<body class="no-skin">
	@include('includes.admin.navbar')
		<div class="main-container" id="main-container">
			
			@include('includes.admin.sidebar')

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								@yield('content')
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Vnjobs</span>
							MinhPhuc Co.,Ltd &copy; 2015
						</span>

						<!-- <span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span> -->
					</div>
				</div>
			</div>
		</div><!-- /.main-container -->

	<!-- JQUERY SCRIPTS -->
	{{ HTML::script('assets/js/jquery-1.11.1.js?v='.$ver) }}
	{{ HTML::script('assets/js/bootstrap.js?v='.$ver) }}

	{{ HTML::script('assets/js/jquery-ui.custom.min.js?v='.$ver) }}
	{{ HTML::script('assets/js/jquery.ui.touch-punch.min.js?v='.$ver) }}
	{{ HTML::script('assets/js/jquery.easypiechart.min.js?v='.$ver) }}
	{{ HTML::script('assets/js/jquery.sparkline.min.js?v='.$ver) }}
	{{ HTML::script('assets/js/jquery.flot.min.js?v='.$ver) }}
	{{ HTML::script('assets/js/jquery.flot.pie.min.js?v='.$ver) }}
	{{ HTML::script('assets/js/jquery.flot.resize.min.js?v='.$ver) }}

	<!-- ace scripts -->
	{{ HTML::script('assets/js/ace-elements.min.js?v='.$ver) }}
	{{ HTML::script('assets/js/ace.min.js?v='.$ver) }}
	@yield('script')
	
</body>
</html>
