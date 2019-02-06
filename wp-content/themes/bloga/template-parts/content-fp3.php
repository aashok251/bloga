<?php
/**
 * Template for displaying bfastmag frontpage section.
 *
 * @package WordPress
 * @subpackage bfastmag
 */

$wp_query = new WP_Query(
	array(
		  'posts_per_page'        => $bfastmag_block_max_posts,
		  'order'                 => 'DESC',
		  'post_status'           => 'publish',
		  'ignore_sticky_posts'   => true,
		  'no_found_rows'       => true,
		  'category_name'         => ( ! empty( $bfastmag_block_category ) && $bfastmag_block_category != 'all' ? $bfastmag_block_category : ''),
	  )
);
 if ( $wp_query->have_posts() ) : ?>
	<div class="post-section bfastmag-fp-s1">

	<div class="owl-carousel bfastmag-fp-s1-posts smaller-nav no-radius">
		<?php

		while ( $wp_query->have_posts() ) : $wp_query->the_post();
 		?>

		  <article <?php post_class('entry tp-post-item tp-item-block rowItem animate animate-moveup animate-fadein'); ?>>
 			<div class="tp-post-thumbnail bfastmag-thumb-small">
			  <figure>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				 
							 <?php
									$thumb_id = get_post_thumbnail_id(get_the_ID() );
 									if ( ! empty( $thumb_id ) ) {
										 
										$thumb = wp_get_attachment_image_src( $thumb_id, 'bfastmag_blk_big_thumb' );
											$url = $thumb['0'];
										 
										echo '<img class="owl-lazy" data-src="' . esc_url( $url ) . '" />';
									} else {
										echo '<img class="owl-lazy" data-src="' . get_template_directory_uri() . '/assets/images/default-image.jpg" />';
									}
							 ?>
				</a>
			  </figure> <!-- End figure -->

			</div> <!-- End .tp-post-thumbnail -->

			<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="tp-post-item-meta">
 				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"> <?php the_author(); ?></a>
 								<span class="tp-post-item-date"> <?php echo get_the_date( ); ?></span>

			  </div> <!-- End .tp-post-item-meta -->
			  <p><?php echo bfastmag_excerpt(8); ?></p>
 
		  </article> <!-- End .tp-post-item -->
		<?php
		  endwhile;
		?>
	</div> <!-- End .bfastmag-fp-s1-posts -->
	</div> <!-- End .bfastmag-fp-s1 -->
<?php
	endif;
	wp_reset_postdata();
?>