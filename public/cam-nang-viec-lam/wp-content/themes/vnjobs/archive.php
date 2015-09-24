<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vnjobs
 */

get_header(); ?>

	<div class="row main-content">
					<div class="primary">

		<div class="news">
					    	<?php
					    	if(get_the_category()){ 
							$args = array( 'posts_per_page' => 5, 'offset'=> 0, 'category' => get_the_category()[0]->term_id);
							$myposts = get_posts( $args );
							foreach ( $myposts as $k => $post ) : 
							  setup_postdata( $post ); ?>
					    	<div class="post">
					    		<div class="post-left">
					    			<?php 
					    				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
										$url = $thumb['0'];
										if($url != null){
												echo '<img src="'.$url.'" class="thumbnail">';
											}else{
												echo '<img src="'.get_bloginfo("template_directory").'/assets/images/nha-tuyen-dung.jpg" class="thumbnail">';
											}
									?>
					    		</div>
					    		<div class="post-right">
					    			<h3 class="post-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p class="post-content">
										<?php echo mb_substr(get_the_excerpt(), 0,155)."..."; ?>
									</p>
					    			<div class="post-meta">
					    				<ul>
					    					<li>
					    						<?php echo get_avatar( get_the_author_meta( 'ID' ),48 ); ?>
						    					<span class="post-author"><?php echo get_the_author(); ?>  </span>
					    					</li>
					    					<li><span class="fa fa-clock-o"></span> <?php echo get_the_date('d-m-Y'); ?></li>
					    					<li><a href="<?php echo get_permalink(); ?>"><span class="fa fa-arrow-circle-right"></span> Xem thêm</a></li>
					    				</ul>
					    			</div>
					    		</div>
					    	</div><!-- end post -->
					    	<div class="clearfix"></div>
					    	<?php endforeach;
							wp_reset_postdata(); }
							else{ echo "<h3>Không tìm thấy bài viết.</h3>";}
								?>
					    					    		

					    </div>
					 </div>
					  <div class="sidebar">
							<div class="new-posts">
								<h4 class="new-title">TIN XEM NHIỀU NHẤT</h4>
								<div class="sidebar-newposts">
								 <?php
									query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=5');
									if (have_posts()) : while (have_posts()) : the_post(); ?>
									<div class="sidebar-post">
										<div class="thumbs-left">
										<?php 
						    				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
											$url = $thumb['0'];
											if($url != null){
													echo '<img src="'.$url.'">';
												}else{
													echo '<img src="'.get_bloginfo("template_directory").'/assets/images/nha-tuyen-dung.jpg" class="thumbnail">';
												}
										?>
										</div>
										<div class="desc-right">
											<h4 class="sidebar-posttitle">
										    	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
										    </h4>
										    <div class="sidebar-postcontent"><span><?php echo mb_substr(get_the_excerpt(), 0,50)."..."; ?></span></div>
									    </div>
								    </div>
									<?php
									endwhile; endif;
									wp_reset_query();
								?>
							</div><!-- end new-posts -->
						</div>
				<div class="clearfix"></div>
				</div> <!-- end row main-content -->
<?php get_footer(); ?>
