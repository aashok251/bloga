<?php
/**
 * Template for displaying bfastmag frontpage section.
 *
 * @package WordPress
 * @subpackage bfastmag
 */

$wp_query = new WP_Query(
	array(
		  'posts_per_page'      => $bfastmag_block_max_posts,
		  'order'               => 'DESC',
		  'post_status'         => 'publish',
		  'ignore_sticky_posts' => true,
		  'no_found_rows'       => true,
		  'category_name' 	    => ( ! empty( $bfastmag_block_category ) && $bfastmag_block_category != 'all' ? $bfastmag_block_category : '' ),
		)
);
 if ( $wp_query->have_posts() ) : ?>
	<div class="post-section bfastmag-fp-s3 ">
	<div class="owl-carousel bfastmag-fp-s3-posts smaller-nav no-radius">
	<?php

	$counter = 0;

	while ( $wp_query->have_posts() ) : $wp_query->the_post();
		$case = $counter % $postperpage;
		$category = get_the_category();
		$postid = get_the_ID();

		switch ( $case ) {

			case 0:
				  ?>
				  <div class="tp-item-block-wrap">
					<div class="row">
					  <div class="col-sm-5half rowItem animate animate-moveup animate-fadein">
						<article <?php post_class('entry tp-post-item tp-item-block '); ?>>
 						  <div class="tp-post-thumbnail bfastmag-big">

							<figure>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php
									$thumb_id = get_post_thumbnail_id( $postid );
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
								<span class="tp-post-item-date">  <?php echo get_the_date(); ?></span>
 								 
							</div> <!-- End .tp-post-item-meta -->
 
						  <p><?php echo bfastmag_excerpt(18); ?></p>
						</article> <!-- End .tp-post-item -->
					  </div> <!-- End .col-md-6 -->
					  <div class="mb20 visible-xs"></div>
						<?php
						if ( $wp_query->current_post + 1 == $wp_query->post_count ) { ?>
							  </div> <!-- End .row -->
							</div><!-- End .tp-item-block-wrap -->
							<?php
						} else {
							$counter++;
						}
		  break;

			case 1:
				 ?>
				  <div class="col-sm-7half  ">
					<article <?php post_class('entry tp-post-item tp-item-block eb-small rowItem animate animate-moveup animate-fadein '); ?>>
					  <div class="tp-post-thumbnail bfastmag-t3-small bfastmag-thumb-small">
 						<figure>
						  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
 							 <?php
									$thumb_id = get_post_thumbnail_id( $postid );
 									if ( ! empty( $thumb_id ) ) {
										 
										$thumb = wp_get_attachment_image_src( $thumb_id, 'bfastmag_blk_small_thumb' );
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
 
					  <div class="entry-meta">

						 <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"><?php the_author(); ?></a>
					<span class="tp-post-item-date"> <?php echo get_the_date(); ?></span>
			 
					 
				 
					  </div> <!-- End .entry-meta -->
 							<p><?php echo bfastmag_excerpt(8); ?></p>
					</article> <!-- End .tp-post-item -->
					<?php
					if ( $wp_query->current_post + 1 == $wp_query->post_count ) { ?>
					  </div><!-- End .col-sm-6 -->
					</div><!-- End .row -->
				  </div><!-- End .tp-item-block-wrap -->
				<?php
					} else {
						$counter++;
					}
		  break;

			case ($postperpage - 1):
				  ?>
				  <article <?php post_class('entry tp-post-item tp-item-block eb-small rowItem animate animate-moveup animate-fadein'); ?> >
					<div class="tp-post-thumbnail bfastmag-t3-small bfastmag-thumb-small">
 					  <figure>
						<a href="<?php the_permalink(); ?>" title="">
				 
							 <?php
									$thumb_id = get_post_thumbnail_id( $postid );
 									if ( ! empty( $thumb_id ) ) {
										 
										$thumb = wp_get_attachment_image_src( $thumb_id, 'bfastmag_blk_small_thumb' );
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
		 
				  <div class="entry-meta">
 						 <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"><?php the_author(); ?></a>
						<span class="tp-post-item-date"> <?php echo get_the_date(); ?></span>
  				 
						</div> <!-- End .entry-meta -->
 							<p><?php echo bfastmag_excerpt(8); ?></p>
				  </article> <!-- End .tp-post-item -->
				</div><!-- End .col-sm-6 -->
			  </div><!-- End .row -->
			</div><!-- End .tp-item-block-wrap -->
			<?php
			if ( $wp_query->current_post + 1 != $wp_query->post_count ) {
				$counter++;
			};
	  break;


			default:
				  ?>
				  <article  <?php post_class('entry tp-post-item tp-item-block eb-small rowItem animate animate-moveup animate-fadein'); ?>>
					<div class="tp-post-thumbnail bfastmag-t3-small bfastmag-thumb-small">
 					  <figure>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					 
							 <?php
									$thumb_id = get_post_thumbnail_id( $postid );
 									if ( ! empty( $thumb_id ) ) {
										 
										$thumb = wp_get_attachment_image_src( $thumb_id, 'bfastmag_blk_small_thumb' );
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
 					  <div class="entry-meta">
 						 <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"><?php the_author(); ?></a>
							<span class="tp-post-item-date"> <?php echo get_the_date(); ?></span>
 				 
					  </div> <!-- End .entry-meta -->
 							<p><?php echo bfastmag_excerpt(8); ?></p>
				  </article> <!-- End .tp-post-item -->
					<?php
					if ( $wp_query->current_post + 1 == $wp_query->post_count ) {  ?>
						  </div><!-- End .col-sm-6 -->
						</div><!-- End .row -->
					  </div><!-- End .tp-item-block-wrap -->
						<?php
					} else {
						$counter++;
					}
			break;
		}// End switch().
	endwhile;
		?>
	</div> <!-- End .bfastmag-fp-s3-posts -->
</div> <!-- End .bfastmag-fp-s3 -->
<?php endif;
wp_reset_postdata(); ?>