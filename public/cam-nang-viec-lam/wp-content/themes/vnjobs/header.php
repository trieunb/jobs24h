<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vnjobs
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<title>Cẩm nang việc làm - VnJobs</title>	
		<?php wp_head(); ?>
	</head>
	<body>

		<div class="" id="wrap">
			<header>
				<div id="nav">
					<nav class="navbar navbar-default" role="navigation">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<a class="navbar-brand" href="<?php echo bloginfo('url') ;?>">
								<span class="fa fa-align-justify"></span>
							</a>
						</div>
					
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav navbar-left">
								<li class="">
									<a href="<?php echo vnjobs ;?>" class="logo">
										<img src="<?php echo get_bloginfo('template_directory');?>/assets/images/logo.png">
									</a>
								</li>
								<li class="navigation">
									<a href="<?php echo get_category_link(8); ?>">Quản lý con người</a>
								</li>
								<li class="navigation">
									<a href="<?php echo get_category_link(9); ?>">Bí quyết tìm việc</a>
								</li>
								<li class="navigation">
									<a href="<?php echo get_category_link(10); ?>">Xu hướng nhân lực</a>
								</li>
								<li class="navigation last">
									<a href="<?php echo get_category_link(11); ?>">Góc báo chí</a>
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
				

			