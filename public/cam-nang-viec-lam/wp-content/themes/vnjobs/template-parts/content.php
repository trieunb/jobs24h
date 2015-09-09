<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vnjobs
 */

?>
<div class="list_posts">
<div class="thumbs">
	<?php 
	if(get_the_post_thumbnail() != null){
		echo get_the_post_thumbnail(); 
	}else{
		echo '<img src="'.get_bloginfo("template_directory").'/images/photo_default.png">';
	}
	?>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="details">
					<header class="entry-header">
						<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

						<?php if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							Đăng ngày: <?php echo get_the_date('d-m-Y'); ?>
						</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->
					<div class="entry">
						<?php
							the_excerpt( sprintf(
								/* translators: %s: Name of current post. */
								wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'vnjobs' ), array( 'span' => array( 'class' => array() ) ) ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );
						?>

						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vnjobs' ),
								'after'  => '</div>',
							) );
						?>
					</div>
				</div>
</article>			
</div>				
