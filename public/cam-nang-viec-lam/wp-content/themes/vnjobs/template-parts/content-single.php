<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vnjobs
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<section class="main-content container single-post">
		<section id="content" class="col-sm-9">

			<div class="boxed">
				<div class="details">
					<div class="top">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</div>
					<div class="meta-jobs">
						<div class="single-post-meta">
							Đăng ngày: <?php echo get_the_date('d-m-Y'); ?>
							<?php 
							$categories_list = get_the_category_list( esc_html__( ', ', 'vnjobs' ) );
							if ( $categories_list && vnjobs_categorized_blog() ) {
								printf( '<span class="cat-links">' . esc_html__( '- %1$s', 'vnjobs' ) . '</span>', $categories_list ); // WPCS: XSS OK.
							}

							?>
						</div> 
						<div class="pull-right">
							<div style="margin: 5px 10px 0px 0; float:left;">
								<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true">
								</div>
							</div>
							<div style="margin: 5px 10px 0px 0; float:left;">
								<script src="https://apis.google.com/js/plusone.js"></script><g:plus action="share" annotation="bubble"></g:plus>
							</div>
						</div>
					</div>
					<div class="entry">
						<?php the_content(); ?>
					</div>
					<div class="clearfix"></div>
					<?php if (wpba_attachments_exist()): ?>
						<strong><i>File đính kèm</i></strong>
						<?php echo do_shortcode('[wpba-attachment-list]'); ?>
					<?php endif ?>
					
				</div>
				<!--<footer class="entry-footer">
					<?php vnjobs_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div>
			
			<div class="boxed related-jobs">
				<div class="rows">
					<div class="title-page">
						<h2>Bài liên quan:</h2>
					</div>
					<ul class="arrow-square-orange">
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
							       	<li>
						                <h4><a itemprop="name" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						           	</li>
						<?php endwhile; ?>
						<?php  else:  ?>
						<h5><?php echo __('There is no related posts.', 'theme'); ?></h5>
						<?php  endif; ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
			</div>
		</section>
		<?php get_sidebar(); ?>
</article><!-- #post-## -->

