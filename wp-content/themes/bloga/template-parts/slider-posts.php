<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bfastmag
 */

 ?>
<article <?php post_class('entry tp-post-item tp-item-block rowItem animate animate-moveright animate-fadein'); ?>>
	<?php bfastmag_top_slider_posts_trigger(); ?>
	<div class="tp-post-thumbnail">
		<figure>
			<a href="<?php the_permalink(); ?>">
				<?php

				$thumb_id = get_post_thumbnail_id( $wp_query->ID );
				$thumb_meta = wp_get_attachment_metadata( $thumb_id );
				if ( ! empty( $thumb_id ) ) {
 						$thumb = wp_get_attachment_image_src( $thumb_id, 'bfastmag_blk_big_thumb_no_crop' );
						$url = $thumb['0'];
 					echo '<img class="owl-lazy" data-src="' . esc_url( $url ) . '" />';
				} else {
					echo '<img class="owl-lazy" data-src="' . get_template_directory_uri() . '/assets/images/default-image.jpg" />';
				}
				?>
			</a>
		</figure>
	</div><!-- End .tp-post-thumbnail -->

	<div class="tp-post-item-meta">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>', apply_filters( 'bfastmag_filter_article_title_on_slider_posts',true ) ); ?>
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"> <?php the_author(); ?></a>
		<span class="tp-post-item-date"> <?php echo get_the_date(  ); ?></span>
  	
	</div><!-- End .tp-post-item-meta -->
	<?php bfastmag_bottom_slider_posts_trigger(); ?>
</article>
