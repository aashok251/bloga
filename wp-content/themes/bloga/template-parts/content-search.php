<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bfastmag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<div class="tp-post-thumbnail">
		<figure>
			<a href="<?php the_permalink(); ?>">
				<?php
				$bfastmag_thumbnail_id = get_post_thumbnail_id();
				if ( $bfastmag_thumbnail_id ) {
 							the_post_thumbnail( 'bfastmag_blog_post_no_crop' );

				} else {
					echo '<img src="' . get_template_directory_uri() . '/assets/images/blog-default.jpg" />';
				} ?>
			</a>
		</figure>
	</div><!-- End .tp-post-thumbnail -->
	<?php
			 if ( 'post' === get_post_type() ) {
			 		bfastmag_entry_date();
		 			bfastmag_content_footer();
			 }
					
 			 ?>
	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	<div class="entry-content">
		<?php
			echo bfastmag_excerpt(25);
			printf( '<div class="readmore"> <a href="%1s">%2s</a></div>',esc_url(get_the_permalink()), esc_html__( 'Continue Reading', 'bfastmag' ) )
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bfastmag' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	



</article>
