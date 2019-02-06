<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bfastmag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry rowItem animate animate-moveup animate-fadein' ); ?>>

	<div class="row">
	<div class="tp-post-thumbnail col-md-5">
	<?php 
		
		 		 bfastmag_content_footer();
		 	 
		 ?>
		<figure>
			<a href="<?php the_permalink(); ?>">
				<?php
 				$post_thumbnail_url = get_the_post_thumbnail($post->ID, 'bfastmag_blk_big_thumb' );
				$post_thumbnail = apply_filters( 'bfastmag_get_prev_img', $post_thumbnail_url );

				if ( ! empty( $post_thumbnail ) ) {
					echo $post_thumbnail;
				} else {
					echo '<img src="' . get_template_directory_uri() . '/assets/images/blog-default.jpg" />';
				}
				?>
			</a>
		</figure>
	</div><!-- End .tp-post-thumbnail -->

	<div class="bfast-content-li col-md-7">
	<?php
 		
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

<?php  if ( 'post' === get_post_type() ) { ?>
			  <div class="entry-meta">
 				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"> <?php the_author(); ?></a>
 			  	<span class="tp-post-item-date"> <?php echo get_the_date( ); ?></span>

			  </div> <!-- End .entry-meta -->
<?php } ?>

	<div class="entry-content">
		<?php
			$ismore = strpos( $post->post_content, '<!--more-->' );
		/* translators: About title of the post */
		if ( $ismore ) : the_content( sprintf( esc_html__( 'Read more %s ...','bfastmag' ), '<span class="screen-reader-text">' . esc_html__( 'about ', 'bfastmag' ) . get_the_title() . '</span>' ) );
			else : echo bfastmag_excerpt(25);
 			printf( '<div class="readmore"> <a href="%1s">%2s</a></div>',esc_url(get_the_permalink()), esc_html__( 'Continue Reading', 'bfastmag' ) )

			?> 
			<?php endif;
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bfastmag' ),
				'after'  => '</div>',
			) );
		?>
		</div><!-- .entry-content -->
	</div><!-- .bfast-content-li -->
	</div><!-- .row-->

	<span class="line-bottom"></span>
</article>