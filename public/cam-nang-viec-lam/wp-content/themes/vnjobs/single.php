<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vnjobs
 */

get_header(); ?>
	<div class="row main-content">
					<div class="primary">
						<h3 class="detail-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php 
					    				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
										$url = $thumb['0'];
										if($url != null){
											echo '<img src="'.$url.'" class="detail-image">';
										}else{
											echo '<img src="'.get_bloginfo("template_directory").'/assets/images/post-detail.jpg" class="detail-image">';
										}
									?>
					    <div class="clearfix"></div>
					    <div class="detail-left">
					    	<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
					    	<div class="center author-info">
					    		<h5 class="author-name"><?php echo get_the_author(); ?></h5>
					    		<div class="contributor">
					    			<div class="contributor-name">Tác giả</div>
					    			<!-- <div class="contributor-info">Digital Marketing, Web Designer, Developer, Author</div> -->
					    		</div>
					    	</div>
					    	<div class="clearfix"></div>
					    	<div class="author-lastest-post">
					    		<?php
									$post_id = get_the_ID();
								    $cat_ids = get_the_category($post_id);
								    $cat_id  = $cat_ids[0]->cat_ID;
								    //foreach($cats as $individual_cat){ $cat_ids[] = $individual_cat->cat_ID;}
									
								    $args=array(
										'category__in' => $cat_id,
										'post__not_in' => array($post_id),
										'posts_per_page'=>5,
										'ignore_sticky_posts'=>1,
								    );
									query_posts($args);
							    ?>
						 		 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
									<div class="author-post">
						    			<a href="{{ URL::route('hiring.detail', [$post->post_slug,$post->id]) }}">
						    				<?php
									        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
											$url = $thumb['0'];
											if($url != null){
												echo '<img src="'.$url.'">';
											}else{
												echo '<img src="'.get_bloginfo("template_directory").'/assets/images/author-post-default.jpg">';
											}
											?>
						    			</a>
						    			<h4 class="author-post-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
						    		</div>
								<?php endwhile; ?>
								<?php  else:  ?>
								<h5><?php echo __('There is no related posts.', 'theme'); ?></h5>
								<?php  endif; ?>
								<?php wp_reset_query(); ?>					    		
					    	</div>
					    </div>
					    <div class="detail-right">
					    	<div class="detail-meta">
					    		<div class="socials">
						    			<a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>&title=<?php the_title(); ?>" class="btn btn-default btn-facebook">
											<span class="fa fa-facebook"></span> <span class="total">0</span>
						    			</a><a target="_blank" href="https://twitter.com/share?url=<?php echo get_permalink(); ?>&via=TWITTER_HANDLE&text=<?php the_title(); ?>" class="btn btn-default btn-twitter">
											<span class="fa fa-twitter"></span> <span class="total">0</span>
						    			</a><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=" class="btn btn-default btn-linkedin">
											<span class="fa fa-linkedin"></span> <span class="total">0</span>
						    			</a><a target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="btn btn-default btn-plus">
											<span class="fa fa-plus"></span>
						    			</a>
						    		</div>
					    		<div class="connect pull-right">
					    			<a href="#comment-box" class="btn btn-default btn-comment">
										<span class="fa fa-comment"></span> <span class="total">0</span>
					    			</a><a href="#" class="btn btn-default btn-email">
										<span class="fa fa-envelope-o"></span>
					    			</a><a href="#" onclick="window.print(); return false;" class="btn btn-default btn-print">
										<span class="fa fa-print"></span>
					    			</a>
					    		</div>
					    	</div>
					    	<div class="clearfix"></div>
					    	<div class="detail-content">
					    		<div class="detail-date">
					    			<?php echo get_the_date('d-m-Y'); ?>
					    		</div>
					    		<div class="clearfix"></div>
					    		<div class="detail-info">
					    			<p>
					    				<?php the_content(); ?>
					    			</p>
					    			<div class="clearfix"></div>
					    			<button type="button" class="btn btn-primary btn-all-comment btn-block">
										<span class="fa fa-comment"></span>
										Xem các bình luận (<span class="total-comment">0</span>)
					    			</button>
					    		</div> <!-- end detail-info -->
					    		<div class="detail-meta">
						    		<div class="socials">
						    			<a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>&title=<?php the_title(); ?>" class="btn btn-default btn-facebook">
											<span class="fa fa-facebook"></span> <span class="total">0</span>
						    			</a><a target="_blank" href="https://twitter.com/share?url=<?php echo get_permalink(); ?>&via=TWITTER_HANDLE&text=<?php the_title(); ?>" class="btn btn-default btn-twitter">
											<span class="fa fa-twitter"></span> <span class="total">0</span>
						    			</a><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=" class="btn btn-default btn-linkedin">
											<span class="fa fa-linkedin"></span> <span class="total">0</span>
						    			</a><a target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="btn btn-default btn-plus">
											<span class="fa fa-plus"></span>
						    			</a>
						    		</div>
						    		<div class="connect pull-right">
						    			<a href="#comment-box" class="btn btn-default btn-comment">
											<span class="fa fa-comment"></span> <span class="total">0</span>
						    			</a><a href="#" class="btn btn-default btn-email">
											<span class="fa fa-envelope-o"></span>
						    			</a><a href="#" onclick="window.print(); return false;" class="btn btn-default btn-print">
											<span class="fa fa-print"></span>
						    			</a>
						    		</div>
					    		</div>
					    		<div class="comment" id="comment-box">
					    			<div id="fb-root"></div>
									<script>(function(d, s, id) {
									  var js, fjs = d.getElementsByTagName(s)[0];
									  if (d.getElementById(id)) return;
									  js = d.createElement(s); js.id = id;
									  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4";
									  fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));</script>
									<div class="fb-comments" data-href="<?php echo get_permalink(); ?>" data-width="100%" data-numposts="5"></div>
					    		</div>
					    	</div>
					    </div>
					</div> <!-- end primary -->
					<div class="sidebar">
						<div class="new-posts">
							<h4 class="new-title">TIN XEM NHIỀU NHẤT</h4>
							<div class="sidebar-newposts">
								 <?php echo popularPosts(10); ?>
							</div><!-- end new-posts -->
						</div> 

					</div>
					<div class="clearfix"></div>
					
					<div id="full-url" style="display:none;"><?php echo get_permalink(); ?></div>
				</div> <!-- end row main-content -->
<?php get_footer(); ?>