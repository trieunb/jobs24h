<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vnjobs
 */

get_header(); ?>

	<div class="row main-content">
					<div class="primary">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
    
					      <!-- Wrapper for slides -->
					      <div class="carousel-inner">
					      	<?php
							global $post;
							$args = array( 'posts_per_page' => 5, 'categories' => array(2,3,4) );
							$myposts = get_posts( $args );
							foreach ( $myposts as $k => $post ) : 
							  setup_postdata( $post ); ?>
								<div class="item <?php if($k==1){ echo 'active';} ?>">
									<?php 
					    				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
										$url = $thumb['0'];
										if($url != null){
											echo '<img src="'.$url.'">';
										}else{
											echo '<img src="'.get_bloginfo("template_directory").'/assets/images/slide1.jpg">';
										}
									?>
						           <div class="carousel-caption ">
						            <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
						            <p>
										<?php echo limit_words(get_the_excerpt(), '33')."..."; ?>
									
									</p>
						          </div>
						        </div><!-- End Item -->
							<?php endforeach;
							wp_reset_postdata(); ?>
					      </div><!-- End Carousel Inner -->


					    <ul class="list-group col-sm-4">
					    	<h3 class="slide-title"><a href="<?php echo get_category_link(3); ?>">NGƯỜI TÌM VIỆC</a></h3>
						    <?php
							$args = array( 'posts_per_page' => 5,'categories' => array(2,3,4) );
							$myposts = get_posts( $args );
							foreach ( $myposts as $k => $post ) : 
							  setup_postdata( $post ); ?>
								<li data-target="#myCarousel" data-slide-to="<?php echo $k; ?>" class="list-group-item <?php if($k==1) echo 'active'; ?>">
							    	<?php the_title( '<h4>', '</h4>' ); ?>
							    </li>
							<?php endforeach;
							wp_reset_postdata(); ?>
					     
					    </ul>

					      <!-- Controls -->
					      <div class="carousel-controls">
					          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					            <span class="glyphicon glyphicon-chevron-left"></span>
					          </a>
					          <a class="right carousel-control" href="#myCarousel" data-slide="next">
					            <span class="glyphicon glyphicon-chevron-right"></span>
					          </a>
					      </div>

					    </div><!-- End Carousel -->
					    <div class="clearfix"></div>
					    <div class="news">
					    	<?php
							$args = array( 'posts_per_page' => 4, 'offset'=> 0, 'categories' => array(2,3,4) );
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
										<?php echo mb_substr(get_the_excerpt(), 0,150)."..."; ?>
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
							wp_reset_postdata(); ?>
					    					    	

					    </div>
					</div> <!-- end primary -->
					<div class="sidebar">
						<div class="banner-ads">
							<img src="<?php echo get_bloginfo('template_directory');?>/assets/images/sidebar-ads.jpg">
						</div>
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

					</div>
					<div class="clearfix"></div>
					<hr class="big-sep">
					<div class="employer">
						<h3 class="e-title"><a href="<?php echo get_category_link(4); ?>">NHÀ TUYỂN DỤNG</a></h3>
						<div class="col-xs-6 e-main">
							<?php
							$args = array( 'posts_per_page' => 1, 'offset'=> 0, 'category' => 4 );
							$myposts = get_posts( $args );
							foreach ( $myposts as $k => $post ) : 
							  setup_postdata( $post ); ?>
								<?php
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
								$url = $thumb['0'];
								if($url != null){
										echo '<div class="img_290"><img src="'.$url.'" ></div>';
									}else{
										echo '<div class="img_290"><img src="'.get_bloginfo("template_directory").'/assets/images/nha-tuyen-dung.jpg" class="full-image"></div>';
									}
								?>
							
								<h3 class="e-slide-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p>
									<?php echo mb_substr(get_the_excerpt(), 0,150)."..."; ?>
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
							<?php endforeach;
							wp_reset_postdata(); ?>


						</div>

						<div class="col-xs-6 e-post">
							<div class="row">
								<?php
								$args = array( 'posts_per_page' => 4, 'offset'=> 1, 'category' => 4 );
								$myposts = get_posts( $args );
								foreach ( $myposts as $k => $post ) : 
								  setup_postdata( $post ); ?>
									<?php
										$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
										$url = $thumb['0'];
									?>
									<div class="col-xs-6">
										
										<?php 
											if($url != null){
												echo '<div class="img_ntd"><img src="'.$url.'" class="full-image esubpost"></div>';
											}else{
												echo '<div class="img_ntd"><img src="'.get_bloginfo("template_directory").'/assets/images/nha-tuyen-dung.jpg" class="full-image esubpost"></div>';
											}
										?>
										<h4 class="e-post-title"><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
										<p>
											<?php echo limit_words(get_the_excerpt(), '8')."..."; ?>
										</p>
										</div>


								<?php endforeach;
								wp_reset_postdata(); ?>
							</div>
						</div>
					</div> <!-- end employer -->
					<div class="clearfix"></div>
					<hr class="big-sep">
					<div class="employer">
						<h3 class="e-title"><a href="<?php echo get_category_link(11); ?>">GÓC BÁO CHÍ VnJobs</a></h3>
						<div class="col-xs-12 news-main">
							<div class="row">
								<div class="col-xs-8 news-post">
									<?php
									$args = array( 'posts_per_page' => 1, 'offset'=> 0, 'category' => 11 );
									$myposts = get_posts( $args );
									foreach ( $myposts as $k => $post ) : 
									  setup_postdata( $post ); ?>
										<?php
											$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
											$url = $thumb['0'];
										?>
										<div class="row">
											<div class="col-xs-5">
											<?php 
												if($url != null){
													echo '<img src="'.$url.'" class="news-thumbnail">';
												}else{
													echo '<img src="'.get_bloginfo("template_directory").'/assets/images/nha-tuyen-dung.jpg" class="news-thumbnail">';
												}
											?>
											</div>
											<div class="col-xs-7 news-postinfo">
											<h3 class="news-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
											<p>
												<?php echo limit_words(get_the_excerpt(), '20'); ?>
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
							    			</div> <!-- end post-meta -->
										</div> <!-- end col-xs-7 -->
									</div>
									<?php endforeach;
									wp_reset_postdata(); ?>

								</div>
								<div class="col-xs-4 news-related">
									<?php
									$args = array( 'posts_per_page' => 3, 'offset'=> 1, 'category' => 11 );
									$myposts = get_posts( $args );
									foreach ( $myposts as $k => $post ) : 
									  setup_postdata( $post ); ?>
										<div class="news-related-post">
											<h4 class="related-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
										</div>
									<?php endforeach;
									wp_reset_postdata(); ?>
								</div>
							</div>

						</div> <!-- end news-main -->
						
					</div> <!-- end employer -->
					
				</div> <!-- end row main-content -->
<?php get_footer(); ?>