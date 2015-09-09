<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vnjobs
 */

?>
	</div>
			<div class="clearfix"></div>
			<footer>
				<div id="above">
					<div class="footer-page">
						<div class="container">
							<div class="col-xs-12">
								<ul class="pull-right bottom-navigation">
									<li><a href="<?php echo get_bloginfo('url'); ?>">Trang chủ</a></li>
									<li><a href="<?php echo get_category_link(8); ?>">Quản lý con người</a></li>
									<li><a href="<?php echo get_category_link(9); ?>">Bí quyết tìm việc</a></li>
									<li><a href="<?php echo get_category_link(10); ?>">Xu hướng nhân lực</a></li>
									<li><a href="<?php echo get_category_link(11); ?>">Góc báo chí</a></li>
								</ul>
							</div>
							<div class="clearfix"></div>
							<div class="col-xs-12">
								<div class="text-center">
									<span>Kết nối với vnjobs.vn:</span>
								</div>
								<div class="clearfix"></div>
								<ul class="socials">
									<li><a href="#"><img src="<?php echo get_bloginfo('template_directory');?>/assets/images/social/rss.png"></a></li>
									<li><a href="https://www.facebook.com/vnjobs.vn" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/assets/images/social/facebook.png"></a></li>
									<li><a href="#"><img src="<?php echo get_bloginfo('template_directory');?>/assets/images/social/twitter.png"></a></li>
									<li><a href="#"><img src="<?php echo get_bloginfo('template_directory');?>/assets/images/social/dribble.png"></a></li>
									<li><a href="#"><img src="<?php echo get_bloginfo('template_directory');?>/assets/images/social/pinterest.png"></a></li>
									<li><a href="#"><img src="<?php echo get_bloginfo('template_directory');?>/assets/images/social/linkedin.png"></a></li>
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
		<?php wp_footer(); ?>
	</body>
</html>